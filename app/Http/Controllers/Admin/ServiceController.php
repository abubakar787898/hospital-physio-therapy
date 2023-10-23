<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AppointmentType;
use App\Models\Services;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Services::with('appointment_type')->get();
       

        return view('admin.service.index',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $appointments = AppointmentType::get();
        return view('admin.service.create',compact('appointments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request,[
            'name' => 'required',
            'image' => 'required',
        ]);
        $image = $request->file('image');
        $slug = Str::slug($request->name);
        if (isset($image)) {

            $destinationPath = 'image/';

            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();

            $image->move($destinationPath, $profileImage);
          
        } else {
            $profileImage = "default.png";
           
        }
        $service = new Services();
        // $service->user_id = Auth::id();
        $service->name = $request->name;
        $service->appointment_type_id = $request->appointment;
        $service->slug = $slug;
        $service->image = $profileImage;
        $service->description = $request->description;
        if(isset($request->status))
        {
            $service->status = true;
        }else {
            $service->status = false;
        }
        // $service->is_approved = true;
        $service->save();

      
        Toastr::success('Service Successfully Saved :)' ,'Success');
        return redirect()->route('admin.services.index');
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
      
        $service=Services::find($id);
        $appointments = AppointmentType::get();
        return view('admin.service.edit',compact('service','appointments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request,[
            'name' => 'required',
            
        ]);
        $image = $request->file('image');
        $service = Services::find($id);
        $slug = Str::slug($request->name);
        $service->appointment_type_id = $request->appointment;

        if (isset($image)) {

            $destinationPath = 'image/';

            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();

            $image->move($destinationPath, $profileImage);
        $service->image = $profileImage;
          
        } 
      
        // $service->user_id = Auth::id();
        $service->name = $request->name;
        $service->slug = $slug;
        $service->description = $request->description;
        if(isset($request->status))
        {
            $service->status = true;
        }else {
            $service->status = false;
        }
        // $service->is_approved = true;
        $service->save();

      
        Toastr::success('Service Updated Successfully :)' ,'Success');
        return redirect()->route('admin.services.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $service=Services::find($id)->delete();
        if (isset($service->image)) {
          unlink(public_path().'/image/'.$service->image);
        }

        // $service->delete();
        Toastr::success('Service Successfully Deleted :)','Success');
        return redirect()->back();
    }
}
