<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ProductController::class, 'index'])->name('products.index');
Route::get('/shop', [ProductController::class, 'index'])->name('products.index');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('products.show');
Route::get('language/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);

    return redirect()->back();
});
Route::get('/products/filter/{categoryId}', [ProductController::class, 'filterByCategory'])->name('products.filter');
Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.addToCart');
Route::post('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.removeFromCart');
Route::post('/cart/update/{id}', [CartController::class, 'updateCart'])->name('cart.updateCart');
Route::post('/cart/addQuantity/{id}/{quantity}', [CartController::class, 'addQuantityToCart'])->name('cart.addQuantity');

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view');
    Route::post('/session', 'App\Http\Controllers\StripeController@session')->name('session');
    Route::get('/success', 'App\Http\Controllers\StripeController@success')->name('success');
    Route::post('/order/history', [OrderController::class, 'orderHistory'])->name('order.history');


});


