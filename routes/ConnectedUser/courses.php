<?php

use Illuminate\Support\Facades\Route;

Route::prefix('reviews')->middleware('auth')->group(function () {
    Route::post('store/{course}', 'Course\ReviewController@store')->name('course_store_review');
});


Route::prefix('courses')->middleware('auth')->group(function () {
    Route::get('free/participate/{course}', 'Customer\CourseController@participateToFreeCourse')->name('course_user_participate');
    Route::get('free/cancel-participation/{course}', 'Customer\CourseController@cancelParticipationCourse')->name('course_user_cancel_participation');
});
