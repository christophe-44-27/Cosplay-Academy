<?php

use Illuminate\Support\Facades\Route;

Route::prefix('community')->group(function(){
    Route::get('/', 'CommunityController@index')->name('community');
    Route::get('/member/{slug}', 'CommunityController@showMember')->name('community_show_member');
    Route::get('/gallery/{slug}', 'CommunityController@showGallery')->name('community_gallery_show');
});
