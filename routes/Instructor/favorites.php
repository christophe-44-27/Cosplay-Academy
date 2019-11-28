<?php

use Illuminate\Support\Facades\Route;

Route::prefix('instructors/favorites')->middleware('auth')->group(function () {
    /** COURSES FAVORITES */
    Route::get('/', 'Instructor\CourseFavoriteController@index')->name('professor_course_favorites');
    Route::get('remove/{course}', 'Instructor\CourseFavoriteController@removeFromFavorites')->name('professor_course_favorites_remove');
});
