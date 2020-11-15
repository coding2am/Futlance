<?php

use Illuminate\Support\Facades\Route;

//Frontend Controllers
Route::get('/', 'FrontendController@index')->name('homepage');

//Backend Controllers
Route::get('/admin', 'BackendController@index')->name('dashboard');

<<<<<<< HEAD
Route::resource('user','UserController');
Route::get('/owner','UserController@owner')->name('user.owner');
Route::resource('quarter','QuarterController');
Route::resource('booking','BookingController');
Route::resource('court','CourtController');
Route::resource('city','CityController');
Route::resource('payment_method','PaymentMethodController');

// Filter Route
Route::post('filter', 'CourtController@filterCity')->name('filterCity');
=======
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

Route::resource('quarter', 'QuarterController');
Route::resource('booking', 'BookingController');
Route::resource('court', 'CourtController');
Route::resource('city', 'CityController');
Route::resource('payment_method', 'PaymentMethodController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
>>>>>>> e7e8ba678cbf2135a2e7aea0e0b12b4268046e2e
