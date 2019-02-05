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
// Route::post('/requisition', 'PagesController@requisition');

// Requisitions
Route::get('/requisitions/create', 'RequisitionsController@create');

// Vehicles
Route::get('/vehicles', 'VehiclesController@index');
Route::post('/vehicles', 'VehiclesController@store');
Route::get('/vehicles/create', 'VehiclesController@create');

