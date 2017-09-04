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


Route::get('/names/list', 'NamesController@index');
Route::get('/profile/{name}', 'NamesController@show');
Route::get('/names/create', 'NamesController@create');
Route::post('/names/create', 'NamesController@store');
Route::get('/names/{name}/destroy', 'NamesController@destroy');
Route::get('/names/edit/{name}', 'NamesController@edit');
Route::patch('/names/edit/{name}', 'NamesController@update');
Route::get('/names/{name}/destroy', 'NamesController@destroy');


Route::get('/phones/create/{name}', 'PhonesController@create');
Route::post('/phones/create/{name}', 'PhonesController@store');


Route::get('/phones/edit/{phone}', 'PhonesController@edit');
Route::post('/phones/edit/{phone}', 'PhonesController@update');
Route::get('/phones/{phone}/destroy', 'PhonesController@destroy');




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











