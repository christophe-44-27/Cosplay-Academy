<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'courses'], function() {
    Route::get('/', 'CourseController@index')->name('courses');
    Route::get('/{course}', 'CourseController@show')->name('course_details');
    Route::get('/{course}/content/{content}', 'CourseController@showContent')->name('course_show_content');
    Route::get('/category/{filterValue}', 'CourseController@coursesByCategorie')->name('courses_by_category');
});

Route::group(['prefix' => 'tutorials'], function() {
    Route::get('/', 'TutorialController@index')->name('tutorials');
    Route::get('/{tutorial}', 'TutorialController@show')->name('tutorial_details');
    Route::get('/category/{filterValue}', 'TutorialController@tutorialsByCategorie')->name('tutorials_by_category');
});
