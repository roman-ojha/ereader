<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jackiedo\Cart\Facades\Cart;

class CheckoutController extends Controller
{
    public function show()
    {
        $shoppingCart = Cart::name('shopping');
        $items = $shoppingCart->getItems();
        $total = $shoppingCart->getTotal();
        $subTotal = $shoppingCart->getSubTotal();
        return view('checkout', ['items' => $items, 'total' => $total, 'subTotal' => $subTotal]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'country' => 'required',
            'province' => 'required',
            'district' => 'required',
            'address' => 'required',
            'payment_gateway' => 'required',
        ]);
        dd($request->all());
    }
}
