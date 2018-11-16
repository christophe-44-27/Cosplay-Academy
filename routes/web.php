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

Route::get('/{locale}','GuestHomepageController@index', function($locale) {
	App::set($locale);
});


Route::get('/{locale}/tutorials', 'TutorialCategoryController@index', function($locale) {
	App::set($locale);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
