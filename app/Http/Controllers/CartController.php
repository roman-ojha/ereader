<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Jackiedo\Cart\Facades\Cart;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $product = Product::find($request->product_id);
        $shoppingCart = Cart::name('shopping');
        $items = $shoppingCart->getDetails()->items;
        // dd($items);
        foreach ($items as $item) {
            $itemSlug = $item->options->slug;
            if ($product->slug == $itemSlug) {
                return back();
            }
        }
        $shoppingCart->addItem([
            'id'       => $product->id,
            'title'    => $product->name,
            'quantity' => (int)$request->quantity,
            'price'    => $product->price / 100,
            'options' => [
                'image_url' => $product->image_url,
                'slug' => $product->slug,
            ]
        ]);
        return back();
    }

    public function show(Request $request)
    {
        $shoppingCart = Cart::name('shopping');
        $items = $shoppingCart->getItems();
        $total = $shoppingCart->getTotal();
        $subTotal = $shoppingCart->getSubTotal();
        return view('cart', ['items' => $items, 'total' => $total, 'subTotal' => $subTotal]);
    }

    public function delete(Request $request)
    {
        $hash = $request->itemHash;
        $shoppingCart = Cart::name('shopping');
        $shoppingCart->removeItem($hash);
        return back();
    }
}
