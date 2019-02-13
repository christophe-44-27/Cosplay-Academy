<?php

use Illuminate\Support\Facades\Route;

Route::prefix('')->group(function (){
    Route::get('/about', 'PageController@about')->name('page_about');
    Route::get('/policy', 'PageController@policy')->name('page_policy');
    Route::get('/cgu', 'PageController@cgu')->name('page_cgu');
    Route::get('/program/author', 'PageController@authorProgram')->name('page_program_author');
    Route::get('/program/printing', 'PageController@printingProgram')->name('page_program_printing');
    Route::get('/premium', 'SubscriptionController@index')->name('premium_index');
    Route::get('/contact', 'PageController@contact')->name('page_contact');
    Route::post('/contact/send', 'Contact\ContactController@contact')->name('send_mail');
});
