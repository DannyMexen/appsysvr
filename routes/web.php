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
    return view('login.index');
});

/*
Resourceful controllers

1. Requisitions
2. Vehicles
3. Users
4. [Vehicle] Officers
5. Managers
6. Deparments
7. Employees
8. Dashboard
9. Login
10. Logout
*/

Route::resource('requisitions', 'RequisitionsController');
Route::resource('vehicles', 'VehiclesController');
Route::resource('users', 'UsersController');
Route::resource('officers', 'OfficersController');
Route::resource('managers', 'ManagersController');
Route::resource('departments', 'DepartmentsController');
Route::resource('employees', 'EmployeesController');
Route::resource('dashboard', 'DashboardController');
Route::resource('login', 'LoginController');
Route::resource('logout', 'LogoutController');
