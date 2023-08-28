<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
    public function show($paymentGateway)
    {
        if (!session()->has('orderId')) {
            return redirect('/home');
        }
        $order = Order::where('tracking_id', session('orderId'))->first();
        if ($paymentGateway == 'cod') {
            return view('payments.cod');
        }
        if ($paymentGateway == "khalti") {
            $parameters = [
                "return_url" => route('thankyou'),
                "website_url" => config('app.url'),
                "amount" => 30002,
                "purchase_order_id" => $order->tracking_id,
                "purchase_order_name" => "ORDER" . $order->tracking_id,

            ];
            // dd($parameters, config("khalti.live_secret_key"), config("khalti.base_url"));
            $response = Http::withHeaders(["Authorization" => config("khalti.live_secret_key")])->post(config("khalti.base_url") . "/epayment/initiate/", $parameters);
            if ($response->failed()) {
                dd("Khalti payment failed");
            }
            $data = $response->json();
            return redirect($data['payment_url']);
        }
    }

    public function thankyou(Request $request)
    {
        $data = $request->all();

        $order = Order::where('tracking_id', $data['purchase_order_id'])->firstOrFail();
        $orderPayment = $order->payment()->update([
            'payment_status' => 'PAID',
            'price_paid' => $data['amount'],
            'transaction_id' => $data['transaction_id'],
        ]);
        // dd($orderPayment);
        return redirect('/');
    }
}
