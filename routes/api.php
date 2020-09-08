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

Route::get('/customers', 'Customers\CustomerController@index');
Route::post('customers/store', 'Customers\CustomerController@store');
Route::get('customers/{id?}', 'Customers\CustomerController@show');
Route::post('/customers/update', 'Customers\CustomerController@update');
Route::post('/customers/delete', 'Customers\CustomerController@delete');
