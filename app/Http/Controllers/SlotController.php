<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Helpers\HelperMessage;
use App\Models\AppointmentType;
use App\Models\Slot;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class SlotController extends Controller
{
    public function index()
    {
       $slots = Slot::with('appointment_type')->get();

        return view('admin.slot.index',compact('slots'));
        // return response()->json($slots);
    }

    public function create(Request $request)
    {
        $appointment_types  = AppointmentType::get();
        return view('admin.slot.create',compact('appointment_types'));
    }
    public function store(Request $request)
    {
        foreach ($request->dates as $date) {
            $result = Slot::updateOrCreate(
                [
                    'appointment_type_id' => $request->appointment_type_id,
                    'from_time'           => $request->from_time,
                    'to_time'             => $request->to_time,
                    'date'                => $date,
                ],
                [
                    'appointment_type_id' => $request->appointment_type_id,
                    'from_time'           => $request->from_time,
                    'to_time'             => $request->to_time,
                ]
            );
        }
        

        $slots = Slot::where('appointment_type_id', $request->appointment_type_id)->get();

        return ($slots) ?
            Helper::sendResponse(['slots' => $slots], HelperMessage::update()) :
            Helper::sendError(HelperMessage::error() . "", 400);
    }
    public function edit(string $id)
    {
      
        $slot=Slot::find($id);
        $appointments = AppointmentType::get();
        return view('admin.slot.edit',compact('slot','appointments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request,[
            'appointment' => 'required',
            'date' => 'required',
            'from_time' => 'required',
            'to_time' => 'required',
        ]);
     
        $slot = Slot::find($id);
        $slot->appointment_type_id = $request->appointment;
        $slot->from_time = $request->from_time;
        $slot->to_time = $request->to_time;
        $slot->date = $request->date;
        $slot->save();

      
        Toastr::success('Slot Updated Successfully :)' ,'Success');
        return redirect()->route('admin.slots.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $service=Slot::find($id)->delete();
       

       
        Toastr::success('Slot Successfully Deleted :)','Success');
        return redirect()->back();
    }

    public function getAppointmentSlot(Request $request)
    {
        $slots = Slot::where('appointment_type_id',$request->id)->get();

      
        return ($slots) ?
        Helper::sendResponse(['slots' => $slots], HelperMessage::fetch()) :
        Helper::sendError(HelperMessage::error() . "", 400);
       
    }


    public function book($id)
    {
        $slot = Slot::findOrFail($id);

        if ($slot->status === 'available') {
            $slot->update(['status' => 'booked']);
            return response()->json(['message' => 'Slot booked successfully']);
        } else {
            return response()->json(['message' => 'Slot not available'], 422);
        }
    }
}
