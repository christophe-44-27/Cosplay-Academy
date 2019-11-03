<?php

use Illuminate\Support\Facades\Route;

Route::prefix('cart')->middleware('auth')->group(function(){
    Route::get('/checkout', 'Billing\OrderController@checkout')->name('cart_checkout');
    Route::get('/charge', 'Billing\OrderController@charge')->name('stripe_charge');
    Route::get('/success?session_id={CHECKOUT_SESSION_ID}', 'Billing\OrderController@orderSuccess')->name('stripe_order_success');
});
