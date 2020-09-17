<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//customers
Route::get('/customers', 'Customers\CustomerController@index');
Route::post('customers/store', 'Customers\CustomerController@store');
Route::get('customers/{id?}', 'Customers\CustomerController@show');
Route::post('/customers/update/{id?}', 'Customers\CustomerController@update');
Route::post('/customers/delete/{id?}', 'Customers\CustomerController@delete');

//new orders
Route::get('/neworders', 'Orders\NewOrderController@index');
Route::get('neworders/{id?}', 'Orders\NewOrderController@show');
Route::post('/neworders/reject/{id?}', 'Orders\NewOrderController@reject');

//work orders
Route::get('/workorders', 'Orders\WorkOrderController@index');

// bidding
Route::get('/biddings', 'Orders\BiddingController@index');
Route::post('biddings/create', 'Orders\BiddingController@create');

// company settings
Route::get('/companysettings', 'SystemInstallers\CompanySettingsController@index');