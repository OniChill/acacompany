<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use App\Models\Payment;

class PaypalController extends Controller
{
    public function paypal(Request $request)
    {
        //dd($request->all());
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('success'),
                "cancel_url" => route('cancel')
            ],
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $request->price
                    ]
                ]
            ]
        ]);
        //dd($response);
        if(isset($response['id']) && $response['id'] != null) {
            foreach($response['links'] as $link) {
                if($link['rel'] == 'approve') {
                    session()->put('product_name', $request->product_name);
                    session()->put('quantity', $request->quantity);
                    session()->put('first_name', $request->first_name);
                    session()->put('last_name', $request->last_name);
                    session()->put('country', $request->country);
                    session()->put('street_address', $request->street_address);
                    session()->put('postcode', $request->postcode);
                    session()->put('city', $request->city);
                    session()->put('state', $request->state);
                    session()->put('phone_number', $request->phone_number);
                    session()->put('email_address', $request->email_address);
                    return redirect()->away($link['href']);
                }
            }
        } else {
            return redirect()->route('cancel');
        }
    }

    public function success(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request->token);
        //dd($response);

        if(isset($response['status']) && $response['status'] == 'COMPLETED') {
            
            // Insert data into database
            $id = $response['id'];
            $where = array('payment_id' => $id);
            $payment = Payment::where($where)->first();
            $payment->payment_id = $response['id'];
            $payment->product_name = session()->get('product_name');
            $payment->quantity = session()->get('quantity');
            $payment->first_name = session()->get('first_name');
            $payment->last_name = session()->get('last_name');
            $payment->country = session()->get('country');
            $payment->street_address = session()->get('street_address');
            $payment->postcode = session()->get('postcode');
            $payment->city = session()->get('city');
            $payment->state = session()->get('state');
            $payment->phone_number = session()->get('phone_number');
            $payment->email_address = session()->get('email_address');
            $payment->amount = $response['purchase_units'][0]['payments']['captures'][0]['amount']['value'];
            $payment->currency = $response['purchase_units'][0]['payments']['captures'][0]['amount']['currency_code'];
            $payment->payer_name = $response['payer']['name']['given_name'];
            $payment->payer_email = $response['payer']['email_address'];
            $payment->payment_status = $response['status'];
            $payment->payment_method = "PayPal";
            $payment->save();

            $this->data['invoice'] = $response['id'];
            $this->data['email'] = $payment->email_address;

            unset($_SESSION['product_name']);
            unset($_SESSION['quantity']);
            unset($_SESSION['first_name']);
            unset($_SESSION['last_name']);
            unset($_SESSION['country']);
            unset($_SESSION['street_address']);
            unset($_SESSION['postcode']);
            unset($_SESSION['city']);
            unset($_SESSION['state']);
            unset($_SESSION['phone_number']);
            unset($_SESSION['email_address']);
            return view('success', $this->data, ['tittle' => '| | Success']);

        } else {
            return redirect()->route('cancel');
        }

    }

    public function cancel()
    {
        return "Payment is cancelled.";
    }
}
