<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'courses'], function() {
    Route::get('/', 'CourseController@index')->name('courses');
    Route::get('/{course}', 'CourseController@show')->name('course_details');
    Route::get('/category/{filterValue}', 'CourseController@coursesByCategorie')->name('courses_by_category');
});
