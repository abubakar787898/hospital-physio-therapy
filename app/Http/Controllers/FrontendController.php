<?php

namespace App\Http\Controllers;

use App\Models\AppointmentType;
use App\Models\Company;
use App\Models\Contact;
use App\Models\Duration;
use App\Models\Page;
use App\Models\PatientBooking;
use App\Models\Payment;
use App\Models\Services;
use App\Models\Slot;
use App\Models\Team;
use App\Notifications\Admin\NewAppointmentNotification;
use App\Notifications\Admin\NewContactUsNotification;
use App\Notifications\BookingNotification;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Stripe\Charge;
use Stripe\Stripe;

class FrontendController extends Controller
{
    //
    public function home()
    {
        $teams = Team::where('type', 'team')->get();
        $sliders = Team::where('type', 'slider')->get();
        $services = Services::all();
        $home = Page::find(2);
        $about = Page::find(1);
        $companies = Company::get();

        return view('welcome', compact('teams', 'sliders', 'services', 'home', 'about', 'companies'));
    }
    public function about()
    {
        $about = Page::find(1);
        $teams = Team::where('type', 'team')->get();

        return view('about', compact('about', 'teams'));
    }
    public function service()
    {
        $services = Services::get();
        $meta_title = "Hospital Physiotherapy Services: Expert Care for Your Physical Well-being";
        $meta_description = "Explore a comprehensive range of physiotherapy services at Hospital Physiotherapy. Our skilled therapists provide personalized care to enhance your mobility, relieve pain, and improve overall well-being. From manual therapy to specialized treatments, discover the support you need for a healthier and active life. Book an appointment today.";

        return view('services', compact('services', 'meta_title', 'meta_description'));
    }
    public function service_slug($slug)
    {

        $service = Services::where('slug', $slug)->first();
        $services = Services::get();
        return view('servicedetail', compact('service', 'services'));
    }
    public function team_slug($slug)
    {

        $team = Team::where('slug', $slug)->first();
        return view('team_detail', compact('team'));
    }
    public function ourTeam()
    {

        $teams = Team::where('type', 'team')->get();

        return view('teams', compact('teams'));
    }
    // public function booking(Request $request)
    // {

    //     $defaultAppointmentType = AppointmentType::first();
    //     $today = Carbon::now()->toDateString();
    //     $appointment_types = AppointmentType::get();
    //     $data = Slot::with('appointment_type')
    //         ->where('appointment_type_id', $request->appointment_type ? $request->appointment_type : $defaultAppointmentType->id)
    //         ->whereDate('date', '>=', $today)
    //         ->orderBy('date', 'asc') 
    //         ->get();
    //     $appointmenttype = $defaultAppointmentType->name;

    //     // ->paginate(5);
    //     // $data = Slot::with('appointment_type')
    //     // ->where('appointment_type_id', $request->appointment_type ?: $defaultAppointmentType->id)
    //     // ->paginate(5);

    //     return view('booknow', compact('appointment_types', 'data', 'appointmenttype'));
    // }
    public function booking(Request $request)
    {

        $appointment_types = AppointmentType::get();
        $services = Services::get();
        $durations = Duration::get();



        return view('booknow', compact('appointment_types', 'services', 'durations'));
    }
    public function book($id)
    {



        $data = Slot::with('appointment_type')->find($id);




        return view('booknowForm', compact('data'));
    }
    public function patient_booked(Request $request)
    {

        $this->validate($request, [
            'payment_type' => 'required',
            'duration' => 'required',
            'appointment' => 'required',
            'service' => 'required',
            'booking_date' => 'required',
            'booking_time' => 'required',
            'email' => 'required',
            'f_name' => 'required',
            'l_name' => 'required',
            'mobile' => 'required',
            'age' => 'required',
        ]);
        $companyEmail = env('COMPANY_MAIL');
        $durationPrice = Duration::find($request->duration)->amount;
        $durationPrice= intval($durationPrice);
        $payment_data="";
        if ($request->payment_type == PatientBooking::ONLINE) {
            
        $this->validate($request, [
            'stripeToken' => 'required', 
        ]);
            Stripe::setApiKey(env('STRIPE_SECRET'));
    
            try {
                $payment_data = Charge::create([
                    "amount" => $durationPrice*100,
                    "currency" => "EUR",
                    "source" => $request->stripeToken,
                    "description" => "",
                ]);
                // dd( $payment_data);
 
                // Check payment status
                if ($payment_data['status'] !== 'succeeded') {
                    Toastr::error('Payment failed. Please try again.', 'Error');
                    return redirect()->back();
                }
            } catch (Exception $e) {
                // dd( $e);
                Toastr::error('Payment failed. Please try again.', 'Error');
                return redirect()->back();
            }
        }
        $bookingDate = Carbon::createFromFormat('d/m/Y', $request->booking_date)->format('Y-m-d');
        $patient = new PatientBooking();
        $patient->duration_id = $request->duration;
        $patient->appointment_type_id = $request->appointment;
        $patient->booking_time = $request->booking_time;
        $patient->booking_date = $bookingDate;
        $patient->payment_type = $request->payment_type;
        
        $patient->service_id = $request->service;
        $patient->f_name = $request->f_name;
        $patient->l_name = $request->l_name;
        $patient->email = $request->email;
        $patient->mobile = $request->mobile;
        $patient->age = $request->age;
        $patient->comment = $request->comment;
        // $patient->save();

        if ($patient->save()) {


            if (PatientBooking::ONLINE == $request->payment_type) {
            
                $payment = new Payment();
                // Map the fields from the Stripe data to your database columns
                $payment->transaction_id = $payment_data['id'];
                $payment->patient_booking_id = $patient->id; // Set the booking ID as per your system
                $payment->amount = $payment_data['amount'];
                $payment->currency = $payment_data['currency'];
                $payment->status = $payment_data['status'];
                $payment->payment_method = $payment_data['payment_method'];
                $payment->card_last_four = $payment_data['payment_method_details']['card']['last4'];
                $payment->payment_date = now(); // Set the payment date as per your system
                $payment->customer_email = $request->email;
                $payment->metadata = json_encode($payment_data['metadata']); 
                if ($payment->save()) {

                    $patient = PatientBooking::find($patient->id);
                    $patient->payment_id=$payment->id;
                    $patient->save();
                    Toastr::success('Booking Completed Plz Check Your Mail :)', 'Success');
                    return redirect()->back();
                } else {
                    Toastr::error('There is Some Issues in Your Payment Detail Plz Check Detail :)', 'Error');
                    return redirect()->back();

                }
            }
            $patient = PatientBooking::with(['appointment_type','duration','service','payment'])->find($patient->id);
            Notification::send($patient, new BookingNotification($patient));
           
            Notification::route('mail', $companyEmail)->notify(new NewAppointmentNotification($patient));
            Toastr::success('Booking Completed Plz Check Your Mail :)', 'Success');
            return redirect()->route('booking');
        } else {
            Toastr::error('Booking failed. Please try again.', 'Error');
            return redirect()->back();
        }
      
    }
      
    // public function getSlot(Request $request)
    // {


    //     $appointmenttype = AppointmentType::find($request->appointment_type);
    //     $data = Slot::with('appointment_type')
    //         ->where('appointment_type_id', $request->appointment_type)
    //         ->whereDate('date', '>=', $request->date)
    //         ->orderBy('date', 'asc')
    //         ->get();
    //     // ->paginate(5);

    //     // return $request->date;
    //     // Render the HTML for the table content
    //     $tableContent = view('slot-table', compact('data'))->render();
    //     // 'pagination' => $data->links()->toHtml(),
    //     return response()->json([
    //         'table_content' => $tableContent,
    //         'appointment_type' => $appointmenttype->name,

    //     ]);
    // }
    public function contact()
    {
        $contact = Page::find(3);
        return view('contact',compact('contact'));
    }
    public function contact_form(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',

        ]);
        $companyEmail = env('COMPANY_MAIL');
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->comment = $request->comment;
        $contact->save();

        // if ($contact->save()) {
        //     Notification::route('mail', $companyEmail)->notify(new NewContactUsNotification($contact));
        // }


        Toastr::success('Send Successfully :)', 'Success');
        return redirect()->route('contact');
    }
}




// } 
        // else {
        //     Toastr::error('Slot is already booked. Please choose another slot.', 'Error');
        //     return redirect()->back();
        // }

        //     $this->validate($request,[
        //         'slot_id' => 'required',
        //         'email' => 'required',
        //         'f_name' => 'required',
        //         'mobile' => 'required',
        //         'age' => 'required',

        //     ]);

        //     $data = Slot::with('appointment_type')->find($request->slot_id);
        //     if ($data) {
        //         # code...
        //         $data->status="booked";
        //     }
        //     $data->save();
        //   $patient=new PatientBooking();
        //   $patient->slot_id=$request->slot_id;
        //   $patient->f_name=$request->f_name;
        //   $patient->l_name=$request->l_name;
        //   $patient->email=$request->email;
        //   $patient->mobile=$request->mobile;
        //   $patient->age=$request->age;
        //   $patient->comment=$request->comment;

        //   if ($patient->save()) {
        //     $patient= PatientBooking::with('slot.appointment_type')->find($patient->id);
        //     Notification::send($patient, new BookingNotification($patient));
        //     Notification::send(env('COMPANY_MAIL'), new NewAppointmentNotification($patient));
        //     Toastr::success('Booking Completed :)' ,'Success');
        //   return redirect()->route('home');
        //   }



        // return view('booknowForm',compact('data'));