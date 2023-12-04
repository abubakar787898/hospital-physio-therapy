<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class AdminPaymentController extends Controller
{
    //

 public function index()
    {
          //
          $payments = Payment::with('booking')->get();
    
// dd( $payments);
          return view('admin.payment.index',compact('payments'));
    }
}
