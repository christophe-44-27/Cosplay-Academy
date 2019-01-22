<?php

use Illuminate\Support\Facades\Route;

Route::prefix('teachers')->group(function(){
    Route::get('/', 'TeacherController@index')->name('teachers');
    Route::get('/{id}', 'TeacherController@show')->name('teacher_profile');
});
