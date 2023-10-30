<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AppointmentType;
use App\Models\PatientBooking;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $patientbookings = PatientBooking::with('slot')->get();
        $appointments = AppointmentType::count();
       

      

        return view('admin.dashboard',compact('patientbookings','appointments'));
    }

}
