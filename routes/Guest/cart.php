<?php

use Illuminate\Support\Facades\Route;

Route::prefix('cart')->group(function(){
    Route::get('/', 'Billing\CartController@index')->name('cart');
    Route::get('/payment-cancel', 'Billing\CartController@cartFallbackStripe')->name('cart_fallback_stripe');
    Route::get('/item/remove/{itemHash}', 'Billing\CartController@removeItem')->name('cart_item_remove');
    Route::get('/item/add/{course}', 'Billing\CartController@addItem')->name('cart_item_add');
});
