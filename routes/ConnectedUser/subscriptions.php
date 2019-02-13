<?php

use Illuminate\Support\Facades\Route;

Route::prefix('premium')->middleware('auth')->group(function () {
    Route::get('/checkout/monthly', 'SubscriptionController@checkoutMonthly')->name('subscription_checkout_monthly');
    Route::post('/checkout/monthly', 'SubscriptionController@checkoutMonthly')->name('subscription_checkout_monthly');
    Route::get('/checkout/yearly', 'SubscriptionController@checkoutYearly')->name('subscription_checkout_yearly');
    Route::post('/checkout/yearly', 'SubscriptionController@checkoutYearly')->name('subscription_checkout_yearly');
});
