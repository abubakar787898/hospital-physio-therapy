<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceName;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ServiceNameController extends Controller
{
    public function index()
    {
        $service_names = ServiceName::get();

        return view('admin.service_name.index',compact('service_names'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.service_name.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      
        $this->validate($request,[
            'name' => 'required|unique:service_names',
        ]);
        $service_name = new ServiceName();
        if (isset($request->name)) $service_name->name = $request->name;
        $service_name->save();
        Toastr::success('Service Name Successfully Saved :)' ,'Success');
        return redirect()->route('admin.service-names.index');
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
        $service_name = ServiceName::find($id);
        return view('admin.service_name.edit',compact('service_name'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request,[
            'name' => 'required',
        ]);
        $service_name = ServiceName::find($id);
        if (isset($request->name)) $service_name->name = $request->name;

        $service_name->save();
        Toastr::success('Service Name Successfully Updated :)' ,'Success');
        return redirect()->route('admin.service-names.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $service_name = ServiceName::find($id)->delete();
        Toastr::success('ServiceName Successfully Deleted :)','Success');
        return redirect()->back();
    }
}
