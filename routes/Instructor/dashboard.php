<?php

use Illuminate\Support\Facades\Route;

Route::prefix('instructors')->middleware('auth')->group(function () {
    Route::get('/', 'Instructor\DashboardController@index')->name('instructor_dashboard');

    /** PROFILE PROFESSOR **/
    Route::get('profile', 'Instructor\ProfileController@index')->name('profile_professor');
    Route::put('profile/{professor}/update', 'Instructor\ProfileController@update')->name('profile_professor_update');
    Route::post('profile/store', 'Instructor\ProfileController@store')->name('profile_professor_store');

    /** STRIPE WEBHOOK PROFESSOR */
    Route::get('stripe/profile/registration/success', 'Instructor\ProfileController@registrationStripeSuccess');
    Route::get('stripe/account/create/{professor}', 'Instructor\ProfileController@createStripePaymentAccount')->name('stripe_create_account');

    /** REVIEWS **/
    Route::get('reviews', 'Instructor\ReviewController@index')->name('reviews');
    Route::get('received-reviews', 'Instructor\ReviewController@receivedReviews')->name('received_reviews');


    /** TRANSACTIONS */
    Route::get('payments', 'Instructor\PaymentController@index')->name('payments');
});
