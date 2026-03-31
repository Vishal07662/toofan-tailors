<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function index()
    {
        // $orders = Order::latest()->get();
        // if ($orderStates = OrderState::all()->toArray()) {
        //     $orderStates = array_column($orderStates, null, 'id');
        // }

        // return view('admin.orders.index', [
        //     'pageTitle' => 'Orders',
        //     'orders' => $orders,
        //     'orderStates' => $orderStates,
        // ]);
    }

}
