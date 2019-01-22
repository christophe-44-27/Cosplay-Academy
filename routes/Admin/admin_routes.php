<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'Administration\IndexController@index')->name('admin_homepage');

Route::prefix('tutorials')->group(function() {
    Route::get('/', 'Administration\TutorialController@index')->name('admin_tutorial_list');
    Route::get('/publish/{id}', 'Administration\TutorialController@publish')->name('admin_tutorial_publish');
    Route::get('/unpublish/{id}', 'Administration\TutorialController@unpublish')->name('admin_tutorial_unpublish');
});
