<?php

use Illuminate\Support\Facades\Route;

//Route::prefix('dashboard')->middleware('auth')->group(function () {
Route::prefix('dashboard')->group(function () {
    Route::get('/', 'Dashboard\DashboardHomepageController@index')->name('dashboard_homepage');

    Route::get('/change-password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('change-password');
    Route::post('/change-password', 'Auth\ChangePasswordController@changePassword')->name('changePassword');

    /** TUTORIELS **/
    Route::get('tutorials', 'Dashboard\CourseController@index')->name('dashboard_tutorials_list');
    Route::get('tutorials/unpublished', 'Dashboard\CourseController@unpublishedTutorials')->name('dashboard_tutorials_unpublished_list');
    Route::get('tutorials/new', 'Dashboard\CourseController@newTutorial')->name('tutorial_new');
    Route::post('tutorials/create', 'Dashboard\CourseController@create')->name('tutorial_create');
    Route::get('tutorials/{tutorial}/edit', 'Dashboard\CourseController@edit')->name('tutorial_edit');
    Route::put('tutorials/{tutorial}/update', 'Dashboard\CourseController@update')->name('tutorial_update');
    Route::get('tutorials/{tutorial}/delete', 'Dashboard\CourseController@delete')->name('tutorial_remove');
    Route::post('tutorials/image/upload', 'Shared\UploadController@uploadFromWysiwyg')->name('upload_from_wysiwyg');
    Route::get('tutorials/{tutorial}/unpublish', 'Dashboard\CourseController@unpublish')->name('tutorial_unpublish');
    /** TUTORIELS SESSIONS */
    Route::get('tutorials/{tutorial}/sessions/new', 'Dashboard\TutorialSessionController@newSession')->name('tutorial_session_new');
    Route::get('tutorials/{tutorial}/sessions/{session}/edit', 'Dashboard\TutorialSessionController@edit')->name('tutorial_session_edit');
    Route::post('tutorials/{tutorial}/sessions/store', 'Dashboard\TutorialSessionController@store')->name('tutorial_session_store');
    Route::put('tutorials/{tutorial}/sessions/update/{session}', 'Dashboard\TutorialSessionController@update')->name('tutorial_session_update');
    Route::get('tutorials/{tutorial}/sessions/{session}/remove', 'Dashboard\TutorialSessionController@remove')->name('dashboard_tutorial_remove_session');
    /** REVIEWS **/
    Route::get('reviews', 'Dashboard\ReviewController@index')->name('reviews');
    /** TUTORIELS CONTENUS **/
    Route::get('tutorials/{tutorial}/sessions/{session}/new-content', 'Dashboard\TutorialContentController@newContent')->name('dashboard_tutorial_new_content');
    Route::post('tutorials/{tutorial}/sessions/{session}/store', 'Dashboard\TutorialContentController@store')->name('dashboard_tutorial_content_store');
    Route::get('tutorials/{tutorial}/content/{content}/edit', 'Dashboard\TutorialContentController@edit')->name('dashboard_tutorial_edit_content');
    Route::post('tutorials/{tutorial}/content/{content}/update', 'Dashboard\TutorialContentController@update')->name('dashboard_tutorial_update_content');
    Route::get('tutorials/{tutorial}/content/{content}/remove', 'Dashboard\TutorialContentController@remove')->name('dashboard_tutorial_remove_content');
    /** ADRESSES **/
    Route::get('address/new', 'Dashboard\AddressController@newAddress')->name('my_address');
    Route::post('address/create', 'Dashboard\AddressController@create')->name('my_address_create');
    Route::get('address/edit/{id}', 'Dashboard\AddressController@edit')->name('my_address_edit');
    Route::post('address/update/{id}', 'Dashboard\AddressController@update')->name('my_address_update');
    Route::get('address/delete/{id}', 'Dashboard\AddressController@delete')->name('my_address_delete');
    /** MON COMPTE **/
    Route::get('account', 'Dashboard\AccountController@index')->name('my_account');
    Route::post('account/update', 'Dashboard\AccountController@update')->name('my_account_update');
    /** WALLET **/
    Route::get('wallet', 'Dashboard\WalletController@index')->name('wallet');
    Route::get('dynamic-field', 'Dashboard\DynamicFieldController@index');

    Route::post('dynamic-field/insert/{tutorial}', 'Dashboard\DynamicFieldController@insert')->name('dynamic-field.insert');
});
