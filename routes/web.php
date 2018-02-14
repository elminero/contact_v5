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


Route::get('/names/list', 'NamesController@index')->name('home');
Route::get('/profile/{name}', 'NamesController@show');
Route::get('/names/create', 'NamesController@create');
Route::post('/names/create', 'NamesController@store');
Route::get('/names/edit/{name}', 'NamesController@edit');
Route::patch('/names/edit/{name}', 'NamesController@update');
Route::get('/names/{name}/destroy', 'NamesController@destroy');

Route::get('/names/autocomplete', 'NamesController@autocomplete');
Route::post('/names/find', 'NamesController@find');
Route::get('search', ['as'=>'search', 'uses'=>'NamesController@search']);
Route::get('autocomplete', ['as'=>'autocomplete','uses'=>'NamesController@autocomplete'] );

Route::get('/phones/create/{name}', 'PhonesController@create');
Route::post('/phones/create/{name}', 'PhonesController@store');
Route::get('/phones/edit/{phone}', 'PhonesController@edit');
Route::patch('/phones/edit/{phone}', 'PhonesController@update');
Route::get('/phones/{phone}/destroy', 'PhonesController@destroy');

Route::get('/emails/create/{name}', 'EmailsController@create');
Route::post('/emails/create/{name}', 'EmailsController@store');
Route::get('/emails/edit/{email}', 'EmailsController@edit');
Route::patch('/emails/edit/{email}', 'EmailsController@update');
Route::get('/emails/{email}/destroy', 'EmailsController@destroy');

Route::get('/subdivisions/{country_code}', 'SubdivisionsController@getSubdivisionsByCountryCode');

Route::get('/addresses/create/{name}', 'AddressesController@create');
Route::post('/addresses/create/{name}', 'AddressesController@store');
Route::get('/addresses/edit/{address}', 'AddressesController@edit');
Route::patch('/addresses/edit/{address}', 'AddressesController@update');
Route::get('/addresses/{address}/destroy', 'AddressesController@destroy');

Route::get('/pictures/create/{name}', 'PicturesController@create');
Route::post('/pictures/create/{name}', 'PicturesController@store');
Route::get('/portfolio/{name}', 'PicturesController@index');
Route::get('/picture/{picture}', 'PicturesController@show');
Route::get('/picture/edit/{picture}', 'PicturesController@edit');
Route::patch('/picture/edit/{picture}', 'PicturesController@update');
Route::get('/picture/{picture}/destroy', 'PicturesController@destroy');

Route::get('/register', 'RegistrationController@create');

Route::post('/register', 'RegistrationController@store');

Route::get('/logout', 'SessionsController@destroy');

Route::get('/login', 'SessionsController@create')->name('login');

Route::post('/login', 'SessionsController@store');

Route::get('/users', 'UsersController@index');

Route::get('/users/{user}', 'UsersController@edit');

Route::patch('/users/{user}', 'UsersController@update');

Route::get('/dashboard', 'UsersController@dashboard');