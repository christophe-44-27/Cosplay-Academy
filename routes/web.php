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

Route::get('/', 'GuestHomepageController@index')->name('homepage');
Route::get('/tutorials', 'Tutorials\TutorialCategoryController@index')->name('list_tutorials');

/** Routes for Login / Logout */
Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('login/facebook', 'Auth\LoginFacebookController@redirectToProvider')->name('facebook_login');
Route::get('login/facebook/callback', 'Auth\LoginFacebookController@handleProviderCallback');

Route::prefix('admin3744')->middleware('auth', 'verify_admin')->group(function () {
    include('Admin/admin_routes.php');
});

/*** GUEST Section ***/
include ('Guest/tutorials.php');
include ('Guest/commissions.php');
include ('Guest/community.php');
include ('Guest/pages.php');
include ('Guest/teachers.php');
include ('Guest/forum.php');
/*** /GUEST Section ***/

/*** Connected User Section ***/
include ('ConnectedUser/dashboard_routes.php');
include ('ConnectedUser/subscriptions.php');
include ('ConnectedUser/forums.php');
include ('ConnectedUser/tutorials.php');
