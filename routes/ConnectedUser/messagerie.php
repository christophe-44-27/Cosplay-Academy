<?php

use Illuminate\Support\Facades\Route;

Route::prefix('inbox')->middleware('auth')->group(function(){
    Route::get('/', 'Inbox\InboxController@index')->name('inbox');
    Route::get('/sent', 'Inbox\InboxController@messageSended')->name('sended_messages');
});
