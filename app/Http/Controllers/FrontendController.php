<?php

namespace App\Http\Controllers;

use App\Models\AppointmentType;
use App\Models\Page;
use App\Models\PatientBooking;
use App\Models\Services;
use App\Models\Slot;
use App\Models\Team;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    //
    public function home()
    {
$teams=Team::where('type','team')->get();
$sliders=Team::where('type','slider')->get();
$services=Services::all();


        return view('welcome',compact('teams','sliders','services'));
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
        

      
        $data = Slot::with('appointment_type')->find($request->slot_id);
      
      $patient=new PatientBooking();
      $patient->slot_id=$request->slot_id;
      $patient->f_name=$request->f_name;
      $patient->l_name=$request->l_name;
      $patient->email=$request->email;
      $patient->mobile=$request->mobile;
      $patient->age=$request->age;
      $patient->comment=$request->comment;

      $patient->save();
      Toastr::success('Booking Completed :)' ,'Success');
      return redirect()->route('home');
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
}
