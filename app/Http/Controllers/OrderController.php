<?php

namespace App\Http\Controllers;

use App\Models\ProductType;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function orderHistory()
    {
        $user = auth()->user();
        $orders = $user->orders()->paginate(10);
        $categories = ProductType::all(); // Fetch categories here

        return view('order.history', compact('orders', 'categories'));
    }
}
