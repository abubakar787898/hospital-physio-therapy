<?php

namespace App\Http\Controllers;

use App\Models\AppointmentType;
use App\Models\Contact;
use App\Models\Page;
use App\Models\PatientBooking;
use App\Models\Services;
use App\Models\Slot;
use App\Models\Team;
use App\Notifications\Admin\NewAppointmentNotification;
use App\Notifications\BookingNotification;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class FrontendController extends Controller
{
    //
    public function home()
    {
$teams=Team::where('type','team')->get();
$sliders=Team::where('type','slider')->get();
$services=Services::all();
$home=Page::find(2);

        return view('welcome',compact('teams','sliders','services','home'));
    }
    public function about()
    {
        $about=Page::find(1);
        return view('about', compact('about'));
    }
    public function service()
    {
          $services=Services::get();
$meta_title="Hospital Physiotherapy Services: Expert Care for Your Physical Well-being";
$meta_description="Explore a comprehensive range of physiotherapy services at Hospital Physiotherapy. Our skilled therapists provide personalized care to enhance your mobility, relieve pain, and improve overall well-being. From manual therapy to specialized treatments, discover the support you need for a healthier and active life. Book an appointment today.";

        return view('services',compact('services','meta_title','meta_description'));
    }
    public function service_slug($slug)
    {

        $service=Services::where('slug',$slug)->first();
        return view('servicedetail',compact('service'));
    }
    public function team_slug($slug)
    {

        $team=Team::where('slug',$slug)->first();
        return view('team_detail',compact('team'));
    }
    public function booking(Request $request)
    {
        
$defaultAppointmentType = AppointmentType::first();
$today = Carbon::now()->toDateString();
        $appointment_types=AppointmentType::get();
        $data = Slot::with('appointment_type')
        ->where('appointment_type_id', $request->appointment_type ?$request->appointment_type: $defaultAppointmentType->id)
        ->whereDate('date', '>=', $today)
        ->orderBy('date', 'asc') // Order by date in ascending order
        ->get();
        $appointmenttype=$defaultAppointmentType->name;
      
        // ->paginate(5);
        // $data = Slot::with('appointment_type')
        // ->where('appointment_type_id', $request->appointment_type ?: $defaultAppointmentType->id)
        // ->paginate(5);
    
        return view('booknow',compact('appointment_types','data','appointmenttype'));
    }
    public function book($id)
    {
        

      
        $data = Slot::with('appointment_type')->find($id);
      
      
      
    
        return view('booknowForm',compact('data'));
    }
    public function patient_booked(Request $request)
    {
        
        $this->validate($request, [
            'slot_id' => 'required',
            'email' => 'required',
            'f_name' => 'required',
            'l_name' => 'required',
            'mobile' => 'required',
            'age' => 'required',
        ]);
        $companyEmail = env('COMPANY_MAIL');
        $slot = Slot::find($request->slot_id);
        
        if ($slot && $slot->status =='available') {
            $slot->status = 'booked';
        
            $patient = new PatientBooking();
            $patient->slot_id = $request->slot_id;
            $patient->f_name = $request->f_name;
            $patient->l_name = $request->l_name;
            $patient->email = $request->email;
            $patient->mobile = $request->mobile;
            $patient->age = $request->age;
            $patient->comment = $request->comment;
            $slot->save();
        
            if ($patient->save()) {
                $patient = PatientBooking::with('slot.appointment_type')->find($patient->id);
                Notification::send($patient, new BookingNotification($patient));
                Notification::route('mail', $companyEmail)->notify(new NewAppointmentNotification($patient));
                // Notification::send(env('COMPANY_MAIL'), new NewAppointmentNotification($patient));
                
                Toastr::success('Booking Completed :)', 'Success');
                return redirect()->route('home');
            } else {
                Toastr::error('Booking failed. Please try again.', 'Error');
                return redirect()->back();
            }
        } else {
            Toastr::error('Slot is already booked. Please choose another slot.', 'Error');
            return redirect()->back();
        }
        
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
    }
    public function getSlot(Request $request)
    {
        

        $appointmenttype=AppointmentType::find($request->appointment_type);
        $data = Slot::with('appointment_type')
        ->where('appointment_type_id', $request->appointment_type)
        ->whereDate('date', '>=', $request->date)
        ->orderBy('date', 'asc')
        ->get();
        // ->paginate(5);
        
// return $request->date;
    // Render the HTML for the table content
    $tableContent = view('slot-table', compact('data'))->render();
    // 'pagination' => $data->links()->toHtml(),
    return response()->json([
        'table_content' => $tableContent,
        'appointment_type' => $appointmenttype->name,
       
    ]);
    }
    public function contact()
    {
        return view('contact');
    }
    public function contact_form(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            
        ]);
        $contact=new Contact();
        $contact->name=$request->name;
        $contact->email=$request->email;
        $contact->comment=$request->comment;
        $contact->save();
        
        Toastr::success('Send Successfully :)' ,'Success');
      return redirect()->route('home');
    }
}
