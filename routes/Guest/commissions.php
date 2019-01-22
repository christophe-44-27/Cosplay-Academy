<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'commissions'], function() {
    Route::get('/', 'CommissionController@index')->name('commissions');
    Route::get('/offers/{slug}', 'CommissionController@show')->name('commission_show');
    Route::get('/category/{filterName}', 'CommissionController@searchByCategory')->name('commission_by_category');
    Route::get('/new', 'CommissionController@newCommissionRequest')->name('commission_new');
    Route::get('/report/{id}', 'CommissionController@report', function($id){})->name('commission_report');
});
