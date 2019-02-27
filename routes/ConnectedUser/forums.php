<?php

use Illuminate\Support\Facades\Route;

Route::prefix('forums')->middleware('auth')->group(function () {
    Route::post('/topics/create/{forumId}', 'ForumController@createTopic')->name('forum_create_topic');
    Route::post('/{forumId}/topics/{forumTopicId}/answer', 'ForumController@addAnswerToForumTopic')->name('forum_topic_add_answer');
});
