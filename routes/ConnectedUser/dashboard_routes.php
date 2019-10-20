<?php

use Illuminate\Support\Facades\Route;

//Route::prefix('dashboard')->middleware('auth')->group(function () {
Route::prefix('dashboard')->middleware('auth')->group(function () {
    Route::get('/change-password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('change-password');
    Route::post('/change-password', 'Auth\ChangePasswordController@changePassword')->name('changePassword');

    /** ORDERS */
    Route::get('purchased-history', 'Customer\PaymentController@index')->name('payment_history');
    /** TUTORIELS SESSIONS */
    Route::get('courses/{course}/sessions/new', 'Professor\CourseSessionController@newSession')->name('course_session_new');
    Route::get('courses/{course}/sessions/{session}/edit', 'Professor\CourseSessionController@edit')->name('course_session_edit');
    Route::post('courses/{course}/sessions/store', 'Professor\CourseSessionController@store')->name('course_session_store');
    Route::put('courses/{course}/sessions/update/{session}', 'Professor\CourseSessionController@update')->name('course_session_update');
    Route::get('courses/{course}/sessions/{session}/remove', 'Professor\CourseSessionController@remove')->name('dashboard_course_remove_session');
    /** REVIEWS **/
    Route::get('reviews', 'Dashboard\ReviewController@index')->name('reviews');
    /** TUTORIELS CONTENUS **/
    Route::get('courses/{course}/sessions/{session}/new-content', 'Dashboard\CourseContentController@newContent')->name('dashboard_tutorial_new_content');
    Route::post('courses/{course}/sessions/{session}/store', 'Dashboard\CourseContentController@store')->name('dashboard_tutorial_content_store');
    Route::get('courses/{course}/content/{content}/edit', 'Dashboard\CourseContentController@edit')->name('dashboard_tutorial_edit_content');
    Route::post('courses/{course}/content/{content}/update', 'Dashboard\CourseContentController@update')->name('dashboard_tutorial_update_content');
    Route::get('courses/{course}/content/{content}/remove', 'Dashboard\CourseContentController@remove')->name('dashboard_tutorial_remove_content');
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
});
