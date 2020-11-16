<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//Frontend Controllers
Route::get('/', 'FrontendController@index')->name('homepage');

//Backend Controllers
Route::get('/admin', 'BackendController@index')->name('dashboard');
Route::get('/owner_dashboard', 'BackendController@owner')->name('owner_dashboard');

//User Controllers
Route::resource('user', 'UserController');
Route::get('/signin', 'UserController@login')->name('user.signin');
Route::get('/owner/register', 'UserController@ownerCreate')->name('user.owner_register');
Route::post('/owner/store', 'UserController@ownerStore')->name('user.owner_store');
Route::get('/owner', 'UserController@owner')->name('user.owner');
Route::get('/member', 'UserController@member')->name('user.member');
Route::get('/role/{id}', 'UserController@role')->name('user.role');
Route::put('/role/{id}', 'UserController@roleUpdate')->name('user.roleUpdate');
Route::post('/on/{id}', 'UserController@on')->name('user.on');
Route::post('/off/{id}', 'UserController@off')->name('user.off');

//Booking Controller route
Route::resource('booking', 'BookingController');
Route::post('storeBooking', 'BookingController@storeBooking')->name('storeBooking');
Route::get('court_booking/{id}', 'BookingController@courtBooking')->name('court_booking');
Route::get('checkout', 'BookingController@checkout')->name('checkout');

Route::resource('quarter', 'QuarterController');
Route::resource('court', 'CourtController');
Route::resource('city', 'CityController');
Route::resource('payment_method', 'PaymentMethodController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Filter Routes
Route::post('filter', 'CourtController@filterCity')->name('filterCity');
Route::post('filterQuarter', 'FrontendController@filterQuarter')->name('filterQuarter');

Route::post('filterTime', 'BookingController@filterTime')->name('filterTime');
Route::post('filterCheckDate', 'BookingController@filterCheckDate')->name('filterCheckDate');
Route::post('filterCheckStartTime', 'BookingController@filterCheckStartTime')->name('filterCheckStartTime');
Route::post('filterCheckEndTime', 'BookingController@filterCheckEndTime')->name('filterCheckEndTime');
