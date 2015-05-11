<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



//Route::get('/', 'PagesController@index');

Route::resource('animals', 'AnimalsController');
Route::resource('people', 'PeopleController');
Route::resource('shelters', 'SheltersController');

Route::controller('/','Auth\AuthController');


