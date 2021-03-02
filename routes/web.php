<?php

Route::get('/', function () {
    return view('home');
});

Route::get('/réservation', 'App\Http\Controllers\BookingController@view');

Route::get('/réservation/annulation/{token}', 'App\Http\Controllers\BookingController@cancel');

Route::post('/réservation', 'App\Http\Controllers\BookingController@create');

Route::post('/réservation/annulation/{token}', 'App\Http\Controllers\BookingController@delete');
