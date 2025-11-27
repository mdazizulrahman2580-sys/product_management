<?php

namespace App\Http\Controllers;
use App\Models\Product;


class IndexController extends Controller
{
    public function index()
    {
     $products = Product::latest()->take(12)->get();

    //  dd($products);
     return view('frontend.index', compact('products'));


    }
}
