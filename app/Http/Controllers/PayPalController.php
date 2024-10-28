<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
class PayPalController extends Controller
{
    public function payment()
    {
        // Initialize the PayPal client
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
    
        // Set up the order data
        $orderData = [
            "intent" => "CAPTURE",
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => "400.00"
                    ],
                    "description" => "Product 1 Purchase"
                ]
            ],
            "application_context" => [
                "return_url" => route('payment.success'),
                "cancel_url" => route('payment.cancel')
            ]
        ];
    
        // Create the order
        $response = $provider->createOrder($orderData);
    
        // Redirect the user to PayPal if the order is created successfully
        if (isset($response['links'][1]['href'])) {
            return redirect($response['links'][1]['href']);
        }
    
        // Handle error if any
        return redirect()->back()->with('error', 'Something went wrong.');
    }
    
    public function cancel()
    {
        // Handle cancellation
    }
    
    public function success(Request $request)
    {
        // Handle successful transaction
    }
}
