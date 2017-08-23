<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('layouts.master');
});


Route::get('/profiles', function () {
    return view('profiles.show');
});


Route::get('/profiles/list', function () {
    return view('profiles.index');
});


Route::get('/profiles/create', function () {
    return view('profiles.create');
});


Route::get('/profiles/edit', function () {
    return view('profiles.edit');
});


Route::get('/phones/create', function () {
    return view('phones.create');
});



Route::get('/phones/edit', function () {
    return view('phones.edit');
});


Route::get('/emails/create', function () {
    return view('emails.create');
});


Route::get('/emails/edit', function () {
    return view('emails.edit');
});


Route::get('/addresses/create', function () {
    return view('addresses.create');
});


Route::get('/addresses/edit', function () {
    return view('addresses.edit');
});











