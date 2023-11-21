<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Stripe\Charge;
use Stripe\Stripe;

class PatientBookingController extends Controller
{
    //


    public function stripe()
    {
        return view('stripe');
    }
    public function stripePost(Request $request)
    {

       Stripe::setApiKey(env('STRIPE_SECRET'));
    
       Charge::create ([
                "amount" => 100 * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment sdfsdf." 
        ]);
      
        Session::flash('success', 'Payment successful!');
        return back();
        // $merchantId = config('app.AIB_MERCHANT_ID');
        // $secretKey = config('app.AIB_SECRET_KEY');

        // // Implement logic to construct payment request data

        // $client = new Client();
        // $response = $client->post('AIB_PAYMENT_GATEWAY_API_URL', [
        //     'form_params' => [
        //         // Add necessary parameters for payment request
        //     ],
        // ]);

        // // Process the response and redirect to AIB payment page

        // return redirect($response->getBody());
    }

    public function handlePaymentResponse(Request $request)
    {
        // Handle AIB payment response and update your database accordingly

        return view('payment.success'); // or 'payment.failure' based on the response
    }
    
}
