<?php

use Illuminate\Support\Facades\Route;

Route::prefix('forums')->group(function(){
    Route::get('/', 'ForumController@index')->name('forums');
    Route::get('/{forum}', 'ForumController@show', function (\App\Models\Forum $forum){})->name('show_forum');
    Route::get('/topic/{slug}', 'ForumController@showThread', function ($slug){})->name('show_forum_thread');
});
