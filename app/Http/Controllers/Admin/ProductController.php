<?php
namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Http\Controllers\Controller;


class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all(); // Data fetch করুন

        return view('admin.adminProduct.product', compact('products'));
    }
}
