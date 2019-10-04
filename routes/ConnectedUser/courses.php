<?php

use Illuminate\Support\Facades\Route;

Route::prefix('reviews')->middleware('auth')->group(function () {
    Route::post('store/{course}', 'Course\ReviewController@store')->name('course_store_review');
});
