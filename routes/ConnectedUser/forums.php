<?php

use Illuminate\Support\Facades\Route;

Route::prefix('forums')->middleware('auth')->group(function () {
    Route::post('/topics/create/{forumId}', 'ForumController@createTopic', function (int $forumId){})->name('forum_create_topic');
    Route::post('/topics/{slug}/add-answer', 'ForumController@addAnswerToForumTopic', function(string $slug){})->name('forum_topic_add_answer');
    Route::get('/my-threads/delete/answer/{id}', 'ForumController@deleteMyAnswer', function(int $id){})->name('forum_delete_my_thread_answer');
    Route::get('/my-threads/delete/{slug}', 'ForumController@deleteMyThread', function(string $slug){})->name('forum_delete_my_thread');
});
