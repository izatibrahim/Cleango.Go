<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    //
    public function index()
{
    $orders = Order::with('user','items.paket')->latest()->get();
    return view('admin.orders', compact('orders'));
}

}
