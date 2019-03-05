<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'Administration\IndexController@index')->name('admin_homepage');

Route::prefix('tutorials')->group(function() {
    Route::get('/', 'Administration\TutorialController@index')->name('admin_tutorial_list');
    Route::get('/categories', 'Administration\CategoryController@index')->name('admin_tutorial_categories_list');
    Route::get('/publish/{id}', 'Administration\TutorialController@publish')->name('admin_tutorial_publish');
    Route::get('/unpublish/{id}', 'Administration\TutorialController@unpublish')->name('admin_tutorial_unpublish');
});


Route::prefix('forums')->group(function() {
    Route::get('/channels', 'Administration\ChannelController@index')->name('admin_channel_list');
    Route::get('/forums-list', 'Administration\ThreadController@index')->name('admin_forums_list');
    Route::get('/to-moderate', 'Administration\ThreadController@toModerate')->name('admin_forums_to_moderate');
});

Route::prefix('users')->group(function() {
    Route::get('/', 'Administration\UserController@index')->name('admin_users_list');
});
