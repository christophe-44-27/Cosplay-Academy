<?php

use Illuminate\Support\Facades\Route;

Route::prefix('cart')->group(function(){
    Route::get('/', 'Billing\CartController@index')->name('cart');
    Route::get('/item/remove/{itemHash}', 'Billing\CartController@removeItem')->name('cart_item_remove');
});
