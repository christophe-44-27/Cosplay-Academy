<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Support\Facades\Route;

Route::get('/','GuestHomepageController@index')->name('homepage');
Route::get('/tutorials', 'Tutorials\TutorialCategoryController@index')->name('list_tutorials');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('dashboard')->group(function () {
	Route::get('/', 'Dashboard\DashboardHomepageController@index')->name('dashboard_homepage');
	/** TUTORIELS **/
	Route::get('tutorials', 'Dashboard\TutorialController@index')->name('dashboard_tutorials_list');
	Route::get('tutorials/new', 'Dashboard\TutorialController@newTutorial')->name('tutorial_new');
	Route::post('tutorials/create', 'Dashboard\TutorialController@create')->name('tutorial_create');
	Route::get('tutorials/edit/{slug}', 'Dashboard\TutorialController@edit')->name('tutorial_edit');
	Route::post('tutorials/update/{slug}', 'Dashboard\TutorialController@update', function($slug){
	})->name('tutorial_update');
	Route::get('tutorials/delete/{slug}', 'Dashboard\TutorialController@delete', function($slug){
	})->name('tutorial_remove');
	Route::post('/tutorials/image/upload', 'Shared\UploadController@uploadFromWysiwyg')->name('upload_from_wysiwyg');
	/** ADRESSES **/
	Route::get('address/new', 'Dashboard\AddressController@newAddress')->name('my_address');
	Route::post('address/create', 'Dashboard\AddressController@create')->name('my_address_create');
	Route::get('address/edit/{id}', 'Dashboard\AddressController@edit', function($id){
	})->name('my_address_edit');
	Route::post('address/update/{id}', 'Dashboard\AddressController@update', function($id){
	})->name('my_address_update');
	Route::get('address/delete/{id}', 'Dashboard\AddressController@delete', function($id){
	})->name('my_address_delete');
	/** MON COMPTE **/
	Route::get('account', 'Dashboard\AccountController@index')->name('my_account');
	Route::get('account/update', 'Dashboard\AccountController@index')->name('my_account_update');
});

Route::get('/change-password','Auth\ChangePasswordController@showChangePasswordForm')->name('change-password');
Route::post('/change-password','Auth\ChangePasswordController@changePassword')->name('changePassword');
