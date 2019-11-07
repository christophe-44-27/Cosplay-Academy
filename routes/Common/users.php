<?php

use Illuminate\Support\Facades\Route;

Route::prefix('users')->group(function(){
    Route::get('/{user}', 'Member\UserController@show')->name('user_profile');
});
