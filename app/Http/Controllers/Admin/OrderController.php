<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderState;
use App\Models\User;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::latest()->get();
        if ($orderStates = OrderState::all()->toArray()) {
            $orderStates = array_column($orderStates, null, 'id');
        }

        return view('admin.orders.index', [
            'pageTitle' => 'Orders',
            'orders' => $orders,
            'orderStates' => $orderStates,
        ]);
    }

    public function create()
    {
        $customer = User::all()->toArray();
        if ($orderStates = OrderState::all()->toArray()) {
            $orderStates = array_column($orderStates, 'name', 'id');
        }

        return view('admin.orders.create', [
            'pageTitle' => 'Add new order',
            'orderStates' => $orderStates,
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'reference' => 'string',
            'total_paid' => 'sometimes|Nullable|Decimal:0,2',
            'order_amount' => 'sometimes|Nullable|Decimal:0,2',
            'notes' => 'sometimes|Nullable|string',
            'phone' => ['string', 'regex:/^\+?[0-9]{7,15}$/'],
        ]);

        // Create the Order
        $orderRequest = [
            'reference' => $request->reference,
            'created_by' => auth()->user()->id,
            'order_state_id' => $request->order_state_id,
            'phone' => $request->phone,
            'order_amount' => 0,
            'total_paid' => 0,
        ];

        if ($request->has('notes') && $request->notes) {
            $orderRequest['notes'] = $request->notes;
        }

        if ($request->has('order_amount') && $request->order_amount) {
            $orderRequest['order_amount'] = $request->order_amount;
        }
        if ($request->has('total_paid') && $request->total_paid) {
            $orderRequest['total_paid'] = $request->total_paid;
        }

        $order = Order::create($orderRequest);

        return redirect()->route('admin.orders.index')
            ->with('success', 'Order created successfully!!');
    }

    public function edit(Order $order)
    {
        if ($orderStates = OrderState::all()->toArray()) {
            $orderStates = array_column($orderStates, 'name', 'id');
        }
        
        return view('admin.orders.show', [
            'pageTitle' => 'Edit Order',
            'order' => $order,
            'orderStates' => $orderStates,
        ]); 
    }
}
