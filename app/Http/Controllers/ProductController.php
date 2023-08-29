<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $filterCategorySlug = $request->get('genre');
        $categories = Category::where('slug', $filterCategorySlug)->first();
        if ($categories) {
            $products = $categories->products()->get();
            $categories = Category::limit(11)->get();
            return view('products.list', ['categories' => $categories, 'products' => $products]);
        } else {
            // dd($products);
            $categories = Category::limit(11)->get();
            $products = Product::all();
            return view('products.list', ['categories' => $categories, 'products' => $products]);
        }
    }

    public function show($slug)
    {
        $product = Product::where('slug', $slug)->first();
        // dd($product->categories->toArray());
        return view('products.show', ['product' => $product]);
    }
}
