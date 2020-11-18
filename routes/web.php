<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//Frontend Controllers
Route::get('/', 'FrontendController@index')->name('homepage');
Route::get('/profile', 'FrontendController@profile')->name('profile');

//Owner Route
Route::group(['middleware'=>['owner']],function(){
    Route::get('/owner_dashboard', 'OwnerController@index')->name('owner_dashboard');
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
    //Court Controller
    Route::resource('court', 'CourtController');
    //City Controller
    Route::resource('city', 'CityController');
    //Payment Controller
    Route::resource('payment_method', 'PaymentMethodController');
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



