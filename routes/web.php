<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/', 'App\Http\Controllers\CarsController@index');
Route::resource('/cars', 'App\Http\Controllers\CarsController');
Route::resource('/reservation', 'App\Http\Controllers\ReservationController');



Auth::routes([
    'register' => false
]);

Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
