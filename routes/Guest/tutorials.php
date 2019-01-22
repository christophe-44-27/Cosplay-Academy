<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'tutorials'], function() {
    Route::get('/', 'TutorialController@index')->name('tutorials');
    Route::get('/{slug}', 'TutorialController@show')->name('tutorial_show');
    Route::get('/category/{filterValue}', 'TutorialController@tutorialByCategorie')->name('tutorials_by_category');
    Route::get('/report/{id}', 'TutorialController@reportTutorial')->name('tutoriel_report');
});
