<?php

use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('index');
// })->name('options');
Route::get('/', 'PagesController@plans')->name('plans');
Route::get('basic-plan-monthly-payment', 'PagesController@basic')->name('basic');
Route::get('subscription-plan-monthly-payment', 'PagesController@subscription')->name('subscription');

Route::post('basic-plan-monthly-payment', 'BasicController@store')->name('basic.store');

Route::post('flutterwave', 'PagesController@flutterwave')->name('flutterwave');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
