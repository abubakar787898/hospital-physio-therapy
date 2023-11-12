<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\BookingConfirmationMail;
use App\Models\AppointmentType;
use App\Models\PatientBooking;
use App\Notifications\BookingConfirmationNotification;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        // $patientbookings = PatientBooking::with('slot')->get();
        $todayBookings = PatientBooking::whereHas('slot', function ($query) {
            $query->whereDate('date', '=', now()->toDateString())
            ->where('status', '=', 'booked');
        })->with('slot')->get();
        $tomorrowBookings = PatientBooking::whereHas('slot', function ($query) {
            $query->whereDate('date', '=', now()->addDay()->toDateString())
            ->where('status', '=', 'booked');
        })->with('slot')->get();
        $appointments = AppointmentType::count();
       

      

        return view('admin.dashboard',compact('todayBookings','appointments','tomorrowBookings'));
    }



    public function appointmentReminderMail($id){
        $patient= PatientBooking::with('slot.appointment_type')->find($id);
        
        if ($patient) {
            try {
                // $patient->notify(new BookingConfirmationNotification($patient));
                Notification::send($patient, new BookingConfirmationNotification($patient));
                // Mail::to($patient->email)->send(new BookingConfirmationMail($patient));
                $patient->mail_status='send';
                $patient->save();
                //  Toastr::success("Email Sent Successfully");
                Toastr::success('Appointment Reminder Email Sent Successfully :)', 'Success');
            } catch (\Exception $e) {
                Toastr::error('Error sending appointment reminder: ' . $e->getMessage(), 'Error');
            }
         return redirect()->back();
        }
    }
}
