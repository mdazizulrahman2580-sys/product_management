<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {

        $oder = Order::all();
        return view('admin.adminorder.order', compact('oder'));
    }
}
