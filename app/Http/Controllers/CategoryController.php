<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function get()
    {
        $categories = Category::select('name', 'slug')->first()->get();
        dd($categories[0]->toArray());
    }
}
