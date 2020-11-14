<?php

use Illuminate\Support\Facades\Route;


//Backend Routes
Route::get('/admin','BackendController@index')->name('dashboard');

Route::resource('user','UserController');
Route::get('/owner','UserController@owner')->name('user.owner');
Route::resource('quarter','QuarterController');
Route::resource('booking','BookingController');
Route::resource('court','CourtController');
Route::resource('city','CityController');
Route::resource('payment_method','PaymentMethodController');
