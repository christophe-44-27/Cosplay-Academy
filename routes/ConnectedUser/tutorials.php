<?php

use Illuminate\Support\Facades\Route;

Route::prefix('tutorials')->middleware('auth')->group(function () {
    Route::get('/report/{tutorial}', 'TutorialController@reportTutorial', function (\App\Models\Course $tutorial){})->name('tutoriel_report');
});
