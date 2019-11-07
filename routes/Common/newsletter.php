<?php

use Illuminate\Support\Facades\Route;

Route::prefix('newsletter')->group(function(){
    Route::post('/subscribe', 'Guest\NewsletterController@subscribe')->name('newsletter_subscribe');
    Route::get('/unsubscribe', 'Guest\NewsletterController@unsubscribe')->name('newsletter_unsubscribe');
});
