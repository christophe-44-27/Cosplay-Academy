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
use Illuminate\Support\Facades\Auth;

Route::get('/', 'GuestHomepageController@index')->name('homepage');

Auth::routes();

/** Routes for Login / Logout */
Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('login/facebook', 'Auth\LoginFacebookController@redirectToProvider')->name('facebook_login');
Route::get('login/facebook/callback', 'Auth\LoginFacebookController@handleProviderCallback');
Route::get('search', 'GuestHomepageController@search')->name('search_courses_homepage');
Route::get('contact', 'Contact\ContactController@index')->name('contact');
Route::post('contact/send', 'Contact\ContactController@contact')->name('contact_post');
Route::post('/stripe/charge', 'Billing\OrderController@charge')->name('stripe_charge');

Route::prefix('admin3744')->middleware('auth', 'verify_admin')->group(function () {
//    include('Admin/admin_routes.php');
});

/*** GUEST Section ***/
include ('Guest/tutorials.php');
include ('Guest/cart.php');
include ('Guest/users.php');
include ('Guest/stripe_webhooks.php');
/*** /GUEST Section ***/

/*** Connected User Section ***/
include ('ConnectedUser/dashboard_routes.php');
include ('ConnectedUser/courses.php');
include ('Professor/dashboard.php');
include ('ConnectedUser/cart.php');
include ('ConnectedUser/messagerie.php');


Route::get('/home', 'HomeController@index')->name('home');
