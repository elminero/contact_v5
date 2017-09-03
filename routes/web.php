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
    return view('welcome');
});


Route::get('/profile/{name}', 'NamesController@show');


Route::get('/names/list', 'NamesController@index');


Route::get('/names/{name}/destroy', 'NamesController@destroy');



Route::get('/names/create', 'NamesController@create');

Route::post('/names/create', 'NamesController@store');





Route::get('/names/edit/{name}', 'NamesController@edit');


Route::patch('/names/edit/{name}', 'NamesController@update');


Route::get('/names/edit/{name}', 'NamesController@edit');


Route::get('/names/{name}/destroy', 'NamesController@destroy');


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











