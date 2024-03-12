<?php

namespace App\Http\Controllers;

use App\Models\ProductType;
use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
    public function index() {
        $products = Product::paginate(12);
        $categories = ProductType::all();
        return view('products.index',  compact('products', 'categories'));
    }

    public function filterByCategory($categoryId)
    {
        $products = Product::where('category_id', $categoryId)->paginate(12);
        $selectedCategory = ProductType::find($categoryId);
        $categories = ProductType::all();
        return view('products.index', compact('products', 'categories', 'selectedCategory'));
    }


    public function show($id) {
        $product = Product::find($id);
        $categories = ProductType::all();
        return view('products.show', compact('product', 'categories'));
    }



}
