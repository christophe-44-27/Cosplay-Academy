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

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('dashboard')->middleware('auth')->group(function () {
    Route::get('/', 'Dashboard\DashboardHomepageController@index')->name('dashboard_homepage');
    /** TUTORIELS **/
    Route::get('tutorials', 'Dashboard\TutorialController@index')->name('dashboard_tutorials_list');
    Route::get('tutorials/new', 'Dashboard\TutorialController@newTutorial')->name('tutorial_new');
    Route::post('tutorials/create', 'Dashboard\TutorialController@create')->name('tutorial_create');
    Route::get('tutorials/edit/{slug}', 'Dashboard\TutorialController@edit')->name('tutorial_edit');
    Route::post('tutorials/update/{slug}', 'Dashboard\TutorialController@update', function ($slug) {
    })->name('tutorial_update');
    Route::get('tutorials/delete/{slug}', 'Dashboard\TutorialController@delete', function ($slug) {
    })->name('tutorial_remove');
    Route::post('/tutorials/image/upload', 'Shared\UploadController@uploadFromWysiwyg')->name('upload_from_wysiwyg');
    /** ADRESSES **/
    Route::get('address/new', 'Dashboard\AddressController@newAddress')->name('my_address');
    Route::post('address/create', 'Dashboard\AddressController@create')->name('my_address_create');
    Route::get('address/edit/{id}', 'Dashboard\AddressController@edit', function ($id) {
    })->name('my_address_edit');
    Route::post('address/update/{id}', 'Dashboard\AddressController@update', function ($id) {
    })->name('my_address_update');
    Route::get('address/delete/{id}', 'Dashboard\AddressController@delete', function ($id) {
    })->name('my_address_delete');
    /** MON COMPTE **/
    Route::get('account', 'Dashboard\AccountController@index')->name('my_account');
    Route::post('account/update', 'Dashboard\AccountController@update')->name('my_account_update');
    /** MON ABONNEMENT **/
    Route::get('subscriptions', 'Dashboard\SubscriptionController@index')->name('my_subscriptions');
});

Route::prefix('admin3744')->middleware('auth', 'verify_admin')->group(function () {
	Route::get('/', 'Administration\IndexController@index')->name('admin_homepage');
	Route::get('/tutorials', 'Administration\TutorialController@index')->name('admin_tutorial_list');
	Route::get('/tutorials/publish/{id}', 'Administration\TutorialController@publish', function($id){
	})->name('admin_tutorial_publish');
	Route::get('/tutorials/unpublish/{id}', 'Administration\TutorialController@unpublish', function($id){
	})->name('admin_tutorial_unpublish');
});

Route::get('/subscriptions', 'SubscriptionController@index')->name('subscriptions');

Route::get('/teachers', 'TeacherController@index')->name('teachers');
Route::get('/teachers/{id}', 'TeacherController@show', function($id){})->name('teacher_profile');

Route::get('/about', 'PageController@about')->name('page_about');
Route::get('/policy', 'PageController@policy')->name('page_policy');
Route::get('/cgu', 'PageController@cgu')->name('page_cgu');
Route::get('/program/author', 'PageController@authorProgram')->name('page_program_author');
Route::get('/contact', 'PageController@contact')->name('page_contact');
Route::post('/contact/send', 'Contact\ContactController@contact')->name('send_mail');


Route::get('/tutorials', 'TutorialController@index')->name('tutorials');
Route::get('/tutorials/{slug}', 'TutorialController@show', function($slug) {})->name('tutorial_show');
Route::get('/tutorials/category/{filterValue}', 'TutorialController@tutorialByCategorie', function($filterValue){
})->name('tutorials_by_category');

Route::get('/change-password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('change-password');
Route::post('/change-password', 'Auth\ChangePasswordController@changePassword')->name('changePassword');
