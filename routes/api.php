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

/*
|--------------------------------------------------------------------------
| Route pour les tutoriels
|--------------------------------------------------------------------------
|
| Routes pour la config initales des champs de recherche du bottin.
|
*/
Route::get('tutorials', 'Api\TutorialController@index');
Route::get('tutorials/search', 'Api\TutorialController@search');
