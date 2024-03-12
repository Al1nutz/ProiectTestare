<?php

namespace App\Http\Controllers;

use App\Models\ProductType;
use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::paginate(12);
        $categories = ProductType::all();
        return view('products.index', compact('products', 'categories'));
    }

    public function viewCart()
    {
        $cartItems = session()->get('cart', []);
        $categories = ProductType::all();
        return view('cart', compact('cartItems', 'categories'));
    }

    public function addToCart($id)
    {
        $product = Product::findOrFail($id);

        if (!$product) {
            abort(404);
        }

        $cartItems = session()->get('cart');

        if (isset($cartItems[$id])) {
            $cartItems[$id]['quantity'] = isset($cartItems[$id]['quantity']) ? $cartItems[$id]['quantity'] + 1 : 1;
        } else {
            $cartItems[$id] = [
                'name' => $product->name,
                'description' => $product->description,
                'price' => $product->price,
                'quantity' => 1,
            ];
        }

        session()->put('cart', $cartItems);

        return redirect()->back()->with('success', 'Product added in cart!');
    }

    public function addQuantityToCart($id, $quantity)
    {
        $product = Product::findOrFail($id);

        if (!$product) {
            abort(404);
        }

        $cartItems = session()->get('cart');

        if (isset($cartItems[$id])) {
            $cartItems[$id]['quantity'] = isset($cartItems[$id]['quantity']) ? $cartItems[$id]['quantity'] + intval($quantity) : intval($quantity);
        } else {
            $cartItems[$id] = [
                'name' => $product->name,
                'description' => $product->description,
                'price' => $product->price,
                'quantity' => intval($quantity),
            ];
        }

        session()->put('cart', $cartItems);

        return redirect()->back()->with('success', 'Product added in cart!');
    }



    public function removeFromCart(Request $request)
    {
        if ($request->id) {
            $cartItems = session()->get('cart');
            if (isset($cartItems[$request->id])) {
                unset($cartItems[$request->id]);
                session()->put('cart', $cartItems);
            }
            return redirect()->back()->with('success', 'Product removed from cart!');
        }
    }

    public function updateCart(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cartItems = session()->get('cart');
            $cartItems[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cartItems);
        }
        return redirect()->back()->with('success', 'Product quantity updated!');
    }
}
