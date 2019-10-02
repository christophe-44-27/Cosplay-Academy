<?php

use Illuminate\Support\Facades\Route;

Route::prefix('dashboard')->middleware('auth')->group(function () {
    Route::get('/', 'Professor\DashboardController@index')->name('professor_dashboard');

    /** TUTORIELS **/
    Route::get('courses', 'Professor\CourseController@index')->name('professor_course_list');
    Route::get('courses/new', 'Professor\CourseController@newTutorial')->name('professor_course_new');
    Route::post('courses/create', 'Professor\CourseController@create')->name('professor_course_create');
    Route::get('courses/{course}/edit', 'Professor\CourseController@edit')->name('professor_course_edit');
    Route::put('courses/{course}/update', 'Professor\CourseController@update')->name('professor_course_update');
    Route::get('courses/{course}/delete', 'Professor\CourseController@delete')->name('professor_course_remove');

    Route::post('courses/image/upload', 'Shared\UploadController@uploadFromWysiwyg')->name('upload_from_wysiwyg');
    Route::get('courses/{course}/unpublish', 'Professor\CourseController@unpublish')->name('professor_course_unpublish');
});
