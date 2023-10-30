<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PatientBooking;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $patientbookings = PatientBooking::with('slot')->get();
       

        return view('admin.patientbooking.index',compact('patientbookings'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $patientbooking = PatientBooking::with('slot')->find($id);
       

        return view('admin.patientbooking.show',compact('patientbooking'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $patient=PatientBooking::find($id)->delete();


        // $patient->delete();
        Toastr::success('Patient Record Successfully Deleted :)','Success');
        return redirect()->back();
    }
}
