<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//Frontend Controllers
Route::get('/', 'FrontendController@index')->name('homepage');
Route::get('/profile', 'FrontendController@profile')->name('profile');
Route::get('/booking_history', 'FrontendController@bookingHistory')->name('booking_history');
Route::get('/courts', 'FrontendController@court')->name('court_page');
Route::get('/court_detail/{id}', 'FrontendController@courtDetail')->name('court_detail');
Route::get('/blog', 'FrontendController@blog')->name('blog');
Route::get('/about', 'FrontendController@about')->name('about');

//Owner Route
Route::group(['middleware'=>['owner']],function(){
    Route::get('/owner_dashboard', 'OwnerController@index')->name('owner_dashboard');
    Route::get('/owner_profile', 'OwnerController@profile')->name('owner_profile');
    Route::get('/owner_booking', 'OwnerController@booking')->name('owner.booking');
    Route::get('/owner_booking_detail/{id}', 'OwnerController@bookingDetail')->name('owner.booking_detail');
    Route::put('/owner_booking_confirm/{id}', 'OwnerController@bookingConfirm')->name('owner.booking_confirm');
    Route::put('/owner_booking_cancel/{id}', 'OwnerController@bookingCancel')->name('owner.booking_cancel');

    Route::get('/owner_court', 'OwnerController@court')->name('owner.court');
    Route::get('/owner_court_edit/{id}', 'OwnerController@courtEdit')->name('owner.court.edit');
    Route::get('/owner_court_create', 'OwnerController@courtCreate')->name('owner.court.create');
    Route::post('/owner_court_create', 'OwnerController@courtStore')->name('owner.court.store');
    Route::put('/owner_court_edit/{id}', 'OwnerController@courtUpdate')->name('owner.court.update');
});

//Admin Route
Route::group(['middleware'=>['admin']],function(){
    //Backend Controller
    Route::get('/admin', 'BackendController@index')->name('dashboard');
    //User Controller
    Route::get('/owner', 'UserController@owner')->name('user.owner');
    Route::get('/member', 'UserController@member')->name('user.member');
    Route::get('/role/{id}', 'UserController@role')->name('user.role');
    Route::put('/role/{id}', 'UserController@roleUpdate')->name('user.roleUpdate');
    Route::post('/on/{id}', 'UserController@on')->name('user.on');
    Route::post('/off/{id}', 'UserController@off')->name('user.off');
    //Quarter Controller
    Route::resource('quarter', 'QuarterController');
    //City Controller
    Route::resource('city', 'CityController');
    //Payment Controller
    Route::resource('payment_method', 'PaymentMethodController');
    //Court Controller
    Route::resource('court', 'CourtController');
});

//User Controllers Route
Route::resource('user', 'UserController');
Route::get('/signin', 'UserController@login')->name('user.signin');
Route::get('/owner/register', 'UserController@ownerCreate')->name('user.owner_register');
Route::post('/owner/store', 'UserController@ownerStore')->name('user.owner_store');

//Booking Controller Route
Route::resource('booking', 'BookingController');
Route::post('storeBooking', 'BookingController@storeBooking')->name('storeBooking');
Route::get('court_booking/{id}', 'BookingController@courtBooking')->name('court_booking');
Route::get('checkout', 'BookingController@checkout')->name('checkout');
Route::get('booking_success', 'BookingController@success')->name('booking.success');
Route::get('booking_invoice/{id}', 'BookingController@viewInvoice')->name('booking.invoice');

// laravel UI Package
Auth::routes();

// Filter Routes
Route::post('filter', 'CourtController@filterCity')->name('filterCity');
Route::post('filterQuarter', 'FrontendController@filterQuarter')->name('filterQuarter');
Route::post('filterTime', 'BookingController@filterTime')->name('filterTime');
Route::post('filterCheckDate', 'BookingController@filterCheckDate')->name('filterCheckDate');
Route::post('filterCheckStartTime', 'BookingController@filterCheckStartTime')->name('filterCheckStartTime');
Route::post('filterCheckEndTime', 'BookingController@filterCheckEndTime')->name('filterCheckEndTime');



