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
Route::get('subscription-plan-monthly-payment-bank', 'PagesController@smartonline')->name('smartonline');

Route::post('basic-plan-monthly-payment', 'BasicController@store')->name('basic.store');

Route::post('flutterwave', 'SubscriptionController@payWithFlutterwave')->name('flutterwave');
Route::post('flutterwave/validate', 'SubscriptionController@validatePayment')->name('flutterwave.validate');
Route::get('subscription/success/{id}', 'SubscriptionController@success')->name('subscription.success');



Route::group(['prefix' => 'control'], function () {
    Route::get('/','HomeController@index')->name('dashboard');
    Route::group(['prefix' => 'customers'], function () {
        Route::get('/','HomeController@customersInfo')->name('customers');
        Route::get('/handles','HomeController@handles')->name('customers.handles');
        Route::get('/phones','HomeController@phones')->name('customers.phones');
    });
    Route::get('search','HomeController@search')->name('control.search');
    Route::get('password','HomeController@password')->name('control.password');
    Route::post('password','HomeController@passsave')->name('control.password');


    Route::group(['prefix' => 'payments'], function () {
        Route::get('','PaymentsController@index')->name('control.payments');
        Route::get('card','PaymentsController@card')->name('control.payments.card');
        Route::get('bank','PaymentsController@bank')->name('control.payments.bank');
        Route::get('pending','PaymentsController@pending')->name('control.payments.pending');
        Route::post('approve','PaymentsController@approve')->name('control.payments.approve');

    });

    Route::group(['prefix' => 'subscriptions'], function () {
        Route::get('','SubscriptionController@index')->name('control.subscription')->middleware('auth');
        Route::get('active','SubscriptionController@active')->name('control.subscription.active')->middleware('auth');
        Route::get('expired','SubscriptionController@expired')->name('control.subscription.expired')->middleware('auth');
    });

    Route::group(['prefix' => 'charts'], function () {

        Route::post('revenue','HomeController@revenue')->name('charts.revenue');
        Route::post('active/subscription','HomeController@active_subscription');
        Route::post('active/progress','HomeController@plan_progress');
        Route::post('compare/subscription','HomeController@compare_subscription');

    });
    Auth::routes();
    Route::get('logout','HomeController@logout')->name('logout');
});
