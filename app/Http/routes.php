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

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');


Route::Resource('makers','MakerController',['except' => ['store','edit'] ]);
Route::Resource('vehicles','VehicleController',['only' => ['index']);

Route::resource('makers.vehicles','MakerVehiclesController',['except' => ['edit','create']]);




Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
