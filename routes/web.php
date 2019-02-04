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

Route::get('/login', 'PagesController@login');
Route::post('/requisition', 'PagesController@requisition');

// Vehicles
Route::get('vehicles', 'VehiclesController@index');
Route::get('vehicles/add', 'VehiclesController@add');

