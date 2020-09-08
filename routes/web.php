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

// Route::get('/', function () {
//     return view('dashboard');
// });

// Route::get('/index', 'DashboardController@index');
// Route::get('/dashboard', 'DashboardController@index');

// Route::get('/historyorders', 'Orders\HistoryOrderController@index');
// Route::get('/historyorderdetails', 'Orders\HistoryOrderController@indexdetail');

// Route::get('/workorders', 'Orders\WorkOrderController@index');
// Route::get('/workorderdetails', 'Orders\WorkOrderController@indexdetail');

// Route::get('/companysettings', 'SystemInstallers\CompanySettingsController@index');

// Route::get('/companies', 'SystemInstallers\CompanyController@index');
// Route::get('companydetails', 'SystemInstallers\CompanyController@indexdetail');

// Route::get('/customers', 'Customers\CustomerController@index');

// Route::get('/', function () {
//     return view('app');
// });

Route::get('/{any}', function () {
    return view('app');
})->where('any','.*');

Route::get('/index', 'DashboardController@index');
Route::get('/dashboard', 'DashboardController@index');

Route::get('/historyorders', 'Orders\HistoryOrderController@index');
Route::get('/historyorderdetails', 'Orders\HistoryOrderController@indexdetail');

Route::get('/workorders', 'Orders\WorkOrderController@index');
Route::get('/workorderdetails', 'Orders\WorkOrderController@indexdetail');

Route::get('/companysettings', 'SystemInstallers\CompanySettingsController@index');

Route::get('/companies', 'SystemInstallers\CompanyController@index');
Route::get('companydetails', 'SystemInstallers\CompanyController@indexdetail');

Route::get('/customers', 'Customers\CustomerController@index');