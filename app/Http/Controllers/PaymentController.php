<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
    public function show($paymentGateway)
    {
        if (!session()->has('orderId')) {
            return redirect('/home');
        }
        if ($paymentGateway == 'cod') {
            return view('payments.cod');
        }
        if ($paymentGateway == "khalti") {
            Http::withHeaders(["Authorization" => config("khalti.live_secret_key")])->post(config("khalti.base_url") . "/epayment/initiate/");
        }
    }
}
