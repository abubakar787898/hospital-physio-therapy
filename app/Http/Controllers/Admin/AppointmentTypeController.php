<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AppointmentType;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class AppointmentTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $appointmenttypes = AppointmentType::get();

        return view('admin.appointmenttype.index',compact('appointmenttypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.appointmenttype.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      
        $this->validate($request,[
            'name' => 'required|unique:appointment_types',
        ]);
        $appointmenttype = new AppointmentType();
        if (isset($request->name)) $appointmenttype->name = $request->name;
        $appointmenttype->save();
        Toastr::success('Appointment Type Successfully Saved :)' ,'Success');
        return redirect()->route('admin.appointment-types.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $appointment_type = AppointmentType::find($id);
        return view('admin.appointmenttype.edit',compact('appointment_type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request,[
            'name' => 'required',
        ]);
        $appointmenttype = AppointmentType::find($id);
        if (isset($request->name)) $appointmenttype->name = $request->name;

        $appointmenttype->save();
        Toastr::success('Appointment Type Successfully Updated :)' ,'Success');
        return redirect()->route('admin.appointment-types.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $appointment_type = AppointmentType::find($id)->delete();
        Toastr::success('AppointmentType Successfully Deleted :)','Success');
        return redirect()->back();
    }
}
