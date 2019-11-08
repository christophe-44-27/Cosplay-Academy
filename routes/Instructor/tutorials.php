<?php

use Illuminate\Support\Facades\Route;

Route::prefix('instructors/tutorials')->middleware('auth')->group(function () {
    /** COURSES **/
    Route::get('/', 'Instructor\TutorialController@index')->name('instructor_tutorials_list');
    Route::get('/new', 'Instructor\TutorialController@newTutorial')->name('instructor_tutorial_new');
    Route::post('/create', 'Instructor\TutorialController@create')->name('instructor_tutorial_create');
    Route::get('/{tutorial}/edit', 'Instructor\TutorialController@edit')->name('instructor_tutorial_edit');
    Route::put('/{tutorial}/update', 'Instructor\TutorialController@update')->name('instructor_tutorial_update');
    Route::get('/{tutorial}/delete', 'Instructor\TutorialController@delete')->name('instructor_tutorial_remove');
    Route::get('/{course}/unpublish', 'Instructor\TutorialController@unpublish')->name('instructor_tutorial_unpublish');


    /** COURSES FAVORITES */
});
