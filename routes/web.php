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
    return view('profile.show');
});


Route::get('/profiles/list', function () {
    return view('profile.index');
});


Route::get('/profiles/create', function () {
    return view('profile.create');
});



Route::get('/profiles/edit', function () {
    return view('profile.edit');
});
