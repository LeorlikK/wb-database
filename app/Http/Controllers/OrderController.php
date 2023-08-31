<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function index(?string $page=null): View
    {
        $perPage = 100;
        $page = (int) $page ?? 1;

        $orders = Order::query()->paginate($perPage, '*', 'page', $page);

        return view('order.index', compact('orders'));
    }

    public function show(Order $order, ?string $page=null): View
    {
        $page = (int) $page ?? 1;

        return view('order.show', compact('order', 'page'));
    }
}
