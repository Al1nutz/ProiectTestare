<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StripeController extends Controller
{
    public function session(Request $request) {
        \Stripe\Stripe::setApiKey(config('stripe.sk'));

        $items = $request->get('items');


        if (empty($items)) {

            return redirect()->back()->with('message', 'Your cart is empty.');
        }

        $lineItems = [];
        $totalPrice = 0;

        foreach ($items as $itemId => $item) {
            $productName = $item['productname'];
            $price = $item['price'];
            $quantity = $item['quantity'];

            $lineItems[] = [
                'price_data' => [
                    'currency' => 'RON',
                    'product_data' => [
                        'name' => $productName,
                    ],
                    'unit_amount' => $price * 100,
                ],
                'quantity' => $quantity,
            ];

            $totalPrice += ($price * $quantity);
        }

        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => route('success'),
            'cancel_url' => route('cart.view'),
        ]);

        return redirect()->away($session->url);
    }

    public function success()
    {

        $cartItems = session()->get('cart', []);
        $userId = Auth::id();
        $totalPrice = 0;

        foreach($cartItems as $itemId => $item) {

            $price = $item['price'];
            $quantity = $item['quantity'];

            $totalPrice += ($price * $quantity);

        }

         $orderID = DB::table('orders')->insertGetId([
            'user_id' => $userId,
            'total_amount' => $totalPrice,
            "status" => "completed",
        ]);

        foreach($cartItems as $itemId => $item) {

            $price = $item['price'];
            $quantity = $item['quantity'];

            DB::table('order_items')->insert([
                'order_id' => $orderID,
                'product_id' => $itemId,
                "quantity" => $quantity,
                "unit_price" => $price,
            ]);

        }

        session()->forget('cart');
        return redirect()->back()->with('success', 'Success');

    }

}
