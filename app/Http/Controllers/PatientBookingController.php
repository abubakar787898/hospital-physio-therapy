<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class PatientBookingController extends Controller
{
    //
    public function initiatePayment(Request $request)
    {
        $merchantId = config('app.AIB_MERCHANT_ID');
        $secretKey = config('app.AIB_SECRET_KEY');

        // Implement logic to construct payment request data

        $client = new Client();
        $response = $client->post('AIB_PAYMENT_GATEWAY_API_URL', [
            'form_params' => [
                // Add necessary parameters for payment request
            ],
        ]);

        // Process the response and redirect to AIB payment page

        return redirect($response->getBody());
    }

    public function handlePaymentResponse(Request $request)
    {
        // Handle AIB payment response and update your database accordingly

        return view('payment.success'); // or 'payment.failure' based on the response
    }
    
}
