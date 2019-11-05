<?php

use Illuminate\Support\Facades\Route;

Route::prefix('dashboard/teachers')->middleware('auth')->group(function () {
    Route::get('/', 'Professor\DashboardController@index')->name('professor_dashboard');

    /** COURSES **/
    Route::get('courses', 'Professor\CourseController@index')->name('professor_course_list');
    Route::get('courses/to-moderate', 'Professor\CourseController@waitingForModeration')->name('professor_course_waiting_moderation_list');
    Route::get('courses/new', 'Professor\CourseController@newTutorial')->name('professor_course_new');
    Route::post('courses/create', 'Professor\CourseController@create')->name('professor_course_create');
    Route::get('courses/{course}/edit', 'Professor\CourseController@edit')->name('professor_course_edit');
    Route::put('courses/{course}/update', 'Professor\CourseController@update')->name('professor_course_update');
    Route::get('courses/{course}/delete', 'Professor\CourseController@delete')->name('professor_course_remove');
    Route::post('courses/image/upload', 'Shared\UploadController@uploadFromWysiwyg')->name('upload_from_wysiwyg');
    Route::get('courses/{course}/unpublish', 'Professor\CourseController@unpublish')->name('professor_course_unpublish');


    /** COURSES CONTENTS */
    Route::get('courses/{course}/sessions/{session}/new-content', 'Professor\CourseContentController@newContent')->name('dashboard_tutorial_new_content');
    Route::post('courses/{course}/sessions/{session}/store', 'Professor\CourseContentController@store')->name('dashboard_tutorial_content_store');
    Route::get('courses/{course}/content/{content}/edit', 'Professor\CourseContentController@edit')->name('dashboard_tutorial_edit_content');
    Route::post('courses/{course}/content/{content}/update', 'Professor\CourseContentController@update')->name('dashboard_tutorial_update_content');
    Route::get('courses/{course}/content/{content}/remove', 'Professor\CourseContentController@remove')->name('dashboard_tutorial_remove_content');
    Route::get('courses/{course}/delete/{content}', 'Professor\CourseContentController@deleteContent')->name('professor_course_content_delete');

    /** PROFILE PROFESSOR **/
    Route::get('profile', 'Professor\ProfileController@index')->name('profile_professor');
    Route::put('profile/{professor}/update', 'Professor\ProfileController@update')->name('profile_professor_update');
    Route::post('profile/store', 'Professor\ProfileController@store')->name('profile_professor_store');

    /** STRIPE WEBHOOK PROFESSOR */
    Route::get('stripe/overview', 'Professor\StripeController@overview')->name('stripe_overview');
    Route::get('stripe/profile/registration/success', 'Professor\ProfileController@registrationStripeSuccess');
    Route::get('stripe/account/create/{professor}', 'Professor\ProfileController@createStripePaymentAccount')->name('stripe_create_account');

    /** REVIEWS **/
    Route::get('reviews', 'Professor\ReviewController@index')->name('reviews');
    Route::get('received-reviews', 'Professor\ReviewController@receivedReviews')->name('received_reviews');

    /** COURSES FAVORITES */
    Route::get('courses/favorites', 'Professor\CourseFavoriteController@index')->name('professor_course_favorites');
    Route::get('courses/favorites/remove/{course}', 'Professor\CourseFavoriteController@removeFromFavorites')->name('professor_course_favorites_remove');

    /** TRANSACTIONS */
    Route::get('transactions', 'Professor\TransactionController@index')->name('transactions');
});
