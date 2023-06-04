<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('products.list');
    }

    public function show()
    {
        return view('products.show');
    }
}
