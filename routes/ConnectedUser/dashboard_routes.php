<?php

use Illuminate\Support\Facades\Route;

Route::prefix('dashboard')->middleware('auth')->group(function () {
    Route::get('/', 'Dashboard\DashboardHomepageController@index')->name('dashboard_homepage');

    Route::post('/commissions/create', 'CommissionController@create')->name('commission_create');
    Route::post('/commissions/quotation/create', 'CommissionQuotationController@submitQuotation')->name('commission_quotation_submit');
    Route::get('/change-password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('change-password');
    Route::post('/change-password', 'Auth\ChangePasswordController@changePassword')->name('changePassword');

    /** TUTORIELS **/
    Route::get('tutorials', 'Dashboard\TutorialController@index')->name('dashboard_tutorials_list');
    Route::get('tutorials/new', 'Dashboard\TutorialController@newTutorial')->name('tutorial_new');
    Route::post('tutorials/create', 'Dashboard\TutorialController@create')->name('tutorial_create');
    Route::get('tutorials/edit/{slug}', 'Dashboard\TutorialController@edit')->name('tutorial_edit');
    Route::post('tutorials/update/{slug}', 'Dashboard\TutorialController@update')->name('tutorial_update');
    Route::get('tutorials/delete/{slug}', 'Dashboard\TutorialController@delete')->name('tutorial_remove');
    Route::post('/tutorials/image/upload', 'Shared\UploadController@uploadFromWysiwyg')->name('upload_from_wysiwyg');
    Route::get('tutorials/publish/{id}', 'Dashboard\TutorialController@publish')->name('tutorial_publish');
    Route::get('tutorials/unpublish/{id}', 'Dashboard\TutorialController@unpublish')->name('tutorial_unpublish');
    /** ADRESSES **/
    Route::get('address/new', 'Dashboard\AddressController@newAddress')->name('my_address');
    Route::post('address/create', 'Dashboard\AddressController@create')->name('my_address_create');
    Route::get('address/edit/{id}', 'Dashboard\AddressController@edit')->name('my_address_edit');
    Route::post('address/update/{id}', 'Dashboard\AddressController@update')->name('my_address_update');
    Route::get('address/delete/{id}', 'Dashboard\AddressController@delete')->name('my_address_delete');
    /** MON COMPTE **/
    Route::get('account', 'Dashboard\AccountController@index')->name('my_account');
    Route::post('account/update', 'Dashboard\AccountController@update')->name('my_account_update');
    /** MON ABONNEMENT **/
//    Route::get('subscriptions', 'Dashboard\SubscriptionController@index')->name('my_subscriptions');
    /** GALERIE PHOTOS */
    Route::get('gallery', 'Dashboard\GalleryController@index')->name('gallery');
    Route::get('gallery/new', 'Dashboard\GalleryController@newGallery')->name('gallery_new');
    Route::post('gallery/create', 'Dashboard\GalleryController@create')->name('gallery_create');
    Route::get('gallery/edit/{slug}', 'Dashboard\GalleryController@edit')->name('gallery_edit');
    Route::post('gallery/update/{slug}', 'Dashboard\GalleryController@update')->name('gallery_update');
    Route::get('gallery/delete/{slug}', 'Dashboard\GalleryController@delete')->name('gallery_delete');
    Route::get('gallery/{slug}/photos', 'Dashboard\GalleryController@displayGalleryContent')->name('gallery_display_photos');
    Route::post('gallery/{slug}/photos/add', 'Dashboard\GalleryController@addPhotoToGallery')->name('gallery_add_photo');
    Route::get('gallery/{slug}/photo/delete/{id}', 'Dashboard\GalleryController@deletePhotoFromGallery')
        ->name('community_gallery_delete_photo');
    /** Commissions */
    Route::get('/commissions/received', 'Dashboard\CommissionController@index')->name('commission_received');
    Route::get('/commissions/sended', 'Dashboard\CommissionQuotationController@index')->name('commission_sended');
    Route::get('/commission/new', 'Dashboard\CommissionController@newRequest')->name('commission_request_new');
    Route::post('/commission/create', 'Dashboard\CommissionController@create')->name('commission_request_create');
    Route::get('/commission/edit/{commission}', 'Dashboard\CommissionController@edit', function(\App\Models\Commission $commission){})
        ->name('commission_request_edit');
    Route::post('/commission/update/{commission}', 'Dashboard\CommissionController@update', function(\App\Models\Commission $commission){})
        ->name('commission_request_update');
    Route::get('/commission/offers', 'Dashboard\CommissionController@offerList')->name('dashboard_commissions_offer');
    Route::get('/commissions/quotations/{id}', 'Dashboard\CommissionController@displayQuotations')->name('commission_quotations');
    Route::post('/commissions/quotations/accept', 'Dashboard\CommissionController@accept')->name('commission_quotation_accept');
    Route::get('/commissions/quotations/{id}/decline', 'Dashboard\CommissionController@decline')->name('commission_quotation_decline');
});
