<?php

use Illuminate\Support\Facades\Route;

Route::prefix('instructors')->middleware('auth')->group(function () {
    /** COURSES **/
    Route::get('courses', 'Instructor\CourseController@index')->name('professor_course_list');
    Route::get('courses/to-moderate', 'Instructor\CourseController@waitingForModeration')->name('professor_course_waiting_moderation_list');
    Route::get('courses/new', 'Instructor\CourseController@newTutorial')->name('professor_course_new');
    Route::post('courses/create', 'Instructor\CourseController@create')->name('professor_course_create');
    Route::get('courses/{course}/edit', 'Instructor\CourseController@edit')->name('professor_course_edit');
    Route::put('courses/{course}/update', 'Instructor\CourseController@update')->name('professor_course_update');
    Route::get('courses/{course}/delete', 'Instructor\CourseController@delete')->name('professor_course_remove');
    Route::post('courses/image/upload', 'Shared\UploadController@uploadFromWysiwyg')->name('upload_from_wysiwyg');
    Route::get('courses/{course}/unpublish', 'Instructor\CourseController@unpublish')->name('professor_course_unpublish');

    /** COURSES SESSIONS */
    Route::get('courses/{course}/sessions/new', 'Instructor\CourseSessionController@newSession')->name('course_session_new');
    Route::get('courses/{course}/sessions/{session}/edit', 'Instructor\CourseSessionController@edit')->name('course_session_edit');
    Route::post('courses/{course}/sessions/store', 'Instructor\CourseSessionController@store')->name('course_session_store');
    Route::put('courses/{course}/sessions/update/{session}', 'Instructor\CourseSessionController@update')->name('course_session_update');
    Route::get('courses/{course}/sessions/{session}/remove', 'Instructor\CourseSessionController@remove')->name('dashboard_course_remove_session');


    /** COURSES FAVORITES */
    Route::get('courses/favorites', 'Instructor\CourseFavoriteController@index')->name('professor_course_favorites');
    Route::get('courses/favorites/remove/{course}', 'Instructor\CourseFavoriteController@removeFromFavorites')->name('professor_course_favorites_remove');


    /** COURSES CONTENTS */
    Route::get('courses/{course}/sessions/{session}/new-content', 'Instructor\CourseContentController@newContent')->name('dashboard_tutorial_new_content');
    Route::post('courses/{course}/sessions/{session}/store', 'Instructor\CourseContentController@store')->name('dashboard_tutorial_content_store');
    Route::get('courses/{course}/content/{content}/edit', 'Instructor\CourseContentController@edit')->name('dashboard_tutorial_edit_content');
    Route::post('courses/{course}/content/{content}/update', 'Instructor\CourseContentController@update')->name('dashboard_tutorial_update_content');
    Route::get('courses/{course}/content/{content}/remove', 'Instructor\CourseContentController@remove')->name('dashboard_tutorial_remove_content');
    Route::get('courses/{course}/delete/{content}', 'Instructor\CourseContentController@deleteContent')->name('professor_course_content_delete');
});
