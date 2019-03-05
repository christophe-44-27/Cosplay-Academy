<?php

use Illuminate\Support\Facades\Route;

Route::prefix('forums')->group(function(){
    Route::get('/', 'ForumController@index')->name('forums');
    Route::get('/topics/{slug}', 'ForumController@show', function ($slug){})->name('show_forum');
    Route::get('/threads/{slug}', 'ForumController@showThread', function ($slug){})->name('show_forum_thread');
});
