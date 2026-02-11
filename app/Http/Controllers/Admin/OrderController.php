<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
       $orders = Order::latest()->get();

        return view('admin.orders.index', [
            'pageTitle' => 'Orders',
            'orders' => $orders,
        ]);
    }

    public function create()
    {
        return view('admin.form', [
            'pageTitle' => 'Add new order',
        ]);
    }
}
