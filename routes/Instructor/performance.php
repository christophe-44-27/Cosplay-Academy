<?php

use Illuminate\Support\Facades\Route;

Route::prefix('instructor')->middleware('auth')->group(function () {
    /** DASHBOARD PERFORMANCE */
    Route::get('performance/overview', 'Instructor\PerformanceController@index')->name('performance_overview');
});
