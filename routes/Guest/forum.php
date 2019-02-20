<?php

use Illuminate\Support\Facades\Route;

Route::prefix('forums')->group(function(){
    Route::get('/', 'ForumController@index')->name('forums');
});
