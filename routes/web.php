<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'site.pages.homepage');
Route::get('/category/{slug}', 'Site\CategoryController@show')->name('category.show');
Route::get('/product/{slug}', 'Site\ProductController@show')->name('product.show');
Route::get('/products', 'Site\ProductController@index')->name('products.index');
Route::post('/products', 'Site\ProductController@search')->name('products.search');

Route::post('/product/add/cart', 'Site\ProductController@addToCart')->name('product.add.cart');
Route::get('/cart', 'Site\CartController@getCart')->name('checkout.cart');
Route::get('/cart/item/{id}/remove', 'Site\CartController@removeItem')->name('checkout.cart.remove');
Route::get('/cart/clear', 'Site\CartController@clearCart')->name('checkout.cart.clear');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/checkout', 'Site\CheckoutController@getCheckout')->name('checkout.index');
    Route::post('/checkout/order', 'Site\CheckoutController@placeOrder')->name('checkout.place.order');

    Route::get('account/orders', 'Site\AccountController@getOrders')->name('account.orders');
    
});
Route::get('about/history', 'Site\AboutController@history')->name('about.history');
Route::get('about/buy', 'Site\AboutController@buy')->name('about.buy');
Route::get('about/delivery', 'Site\AboutController@delivery')->name('about.delivery');
Route::get('custumer/help', 'Site\AboutController@help')->name('custumer.help');
Route::get('custumer/money', 'Site\AboutController@money')->name('custumer.money');
Route::get('custumer/terms', 'Site\AboutController@terms')->name('custumer.terms'); 


    

Auth::routes();
require 'admin.php';
