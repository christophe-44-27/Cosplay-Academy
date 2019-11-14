<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('categories', 'Api\CategoriesController@getCategories');
Route::get('courses', 'Api\CourseController@get');
Route::get('courses/search', 'Api\CourseController@search');
