<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'courses'], function() {
    Route::get('/', 'CourseController@index')->name('courses');
    Route::get('/{course}', 'CourseController@show')->name('course_details');
    Route::get('/category/{filterValue}', 'CourseController@tutorialByCategorie')->name('tutorials_by_category');
});
