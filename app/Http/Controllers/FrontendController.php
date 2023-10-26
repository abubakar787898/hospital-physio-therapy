<?php

namespace App\Http\Controllers;

use App\Models\Services;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    //
    public function about()
    {
        return view('about');
    }
    public function service()
    {
          $services=Services::get();
$meta_title="Hospital Physiotherapy Services: Expert Care for Your Physical Well-being";
$meta_description="Explore a comprehensive range of physiotherapy services at Hospital Physiotherapy. Our skilled therapists provide personalized care to enhance your mobility, relieve pain, and improve overall well-being. From manual therapy to specialized treatments, discover the support you need for a healthier and active life. Book an appointment today.";

        return view('services',compact('services','meta_title','meta_description'));
    }
    public function booking()
    {
        return view('booknow');
    }
    public function contact()
    {
        return view('contact');
    }
}
