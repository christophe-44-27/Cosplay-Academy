<?php

use Illuminate\Support\Facades\Route;

Route::prefix('inbox')->middleware('auth')->group(function(){
    Route::get('/', 'Inbox\InboxController@index')->name('inbox');
    Route::get('/{thread}', 'Inbox\InboxController@showThread')->name('show_thread_messages');
    Route::post('/store/{threadId}/to/{userId}', 'Inbox\InboxController@store')->name('store_message');
    Route::get('/{thread}/conversation/delete', 'Inbox\InboxController@deleteConversation')->name('delete_conversation');
    Route::get('/sent', 'Inbox\InboxController@messageSended')->name('sended_messages');
});
