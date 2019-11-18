<?php

use Illuminate\Support\Facades\Route;

//Route::prefix('dashboard')->middleware('auth')->group(function () {
Route::prefix('dashboard')->middleware('auth')->group(function () {
    Route::get('/change-password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('change-password');
    Route::post('/change-password', 'Auth\ChangePasswordController@changePassword')->name('changePassword');

    /** ORDERS */
    Route::get('purchased-history', 'Customer\PaymentController@index')->name('payment_history');
    /** TUTORIELS SESSIONS */
    /** TUTORIELS CONTENUS **/
    /** ADRESSES **/
    Route::get('address/new', 'Dashboard\AddressController@newAddress')->name('my_address');
    Route::post('address/create', 'Dashboard\AddressController@create')->name('my_address_create');
    Route::get('address/edit/{id}', 'Dashboard\AddressController@edit')->name('my_address_edit');
    Route::post('address/update/{id}', 'Dashboard\AddressController@update')->name('my_address_update');
    Route::get('address/delete/{id}', 'Dashboard\AddressController@delete')->name('my_address_delete');
    /** MON COMPTE **/
    Route::get('profile/edit', 'Dashboard\ProfileController@edit')->name('profile');
    Route::put('profile/update', 'Dashboard\ProfileController@update')->name('edit_profile');
    /** WALLET **/
    Route::get('wallet', 'Dashboard\WalletController@index')->name('wallet');
    Route::get('dynamic-field', 'Dashboard\DynamicFieldController@index');

    Route::post('dynamic-field/insert/{tutorial}', 'Dashboard\DynamicFieldController@insert')->name('dynamic-field.insert');
    /** FAVORITES */
    Route::get('courses/favorites', 'Course\FavoriteController@getCourseFavorites')->name('course_favorite');
    Route::get('courses/favorites/add/{course}', 'Course\FavoriteController@addToFavorite')->name('course_add_to_favorites');
    Route::get('courses/favorites/remove/{course}', 'Course\FavoriteController@removeFromFavorites')->name('course_favorite_remove');
    Route::get('registered', 'Customer\CourseController@myCourses')->name('course_users_registered');
    Route::get('tutorials/favorites', 'Tutorial\FavoriteController@getTutorialFavorites')->name('tutorial_favorite');
    Route::get('tutorials/favorites/add/{tutorial}', 'Tutorial\FavoriteController@addToFavorite')->name('tutorial_add_to_favorites');
    Route::get('tutorials/favorites/remove/{tutorial}', 'Tutorial\FavoriteController@removeFromFavorites')->name('tutorial_favorite_remove');
});
