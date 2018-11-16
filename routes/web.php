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
Route::get('/tutorials', 'TutorialCategoryController@index')->name('list_tutorials');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', 'Dashboard\DashboardHomepageController@index')->name('dashboard_homepage');

Route::get('/change-password','Auth\ChangePasswordController@showChangePasswordForm')->name('change-password');
Route::post('/change-password','Auth\ChangePasswordController@changePassword')->name('changePassword');
