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

Auth::routes();

//--------Login Page routes
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/manager-login', 'HomeController@manager')->name('manager-login');
Route::get('/stockKeeper-login', 'HomeController@stockKeeper')->name('stockKeeper-login');
Route::get('/cashier-login', 'HomeController@cashier')->name('cashier-login');
//--------Login Page routes

//--------Login Submission routes
Route::post('/manager_login', 'Auth\LoginController@managerLogin')->name('manager-verify');
Route::post('/stockKeeper_login', 'Auth\LoginController@storeKeeperLogin')->name('stockKeeper-verify');
Route::post('/cashier_login', 'Auth\LoginController@cashierLogin')->name('cashier-verify');
//--------Login Submission routes

//--------Register Submission routes
Route::post('/manager_register', 'Auth\RegisterController@managerRegister')->name('cashier-verify');
//--------Register Submission routes


Route::middleware(['auth:manager'])->group(function () { 
    Route::get('/manager_panel', 'ManagerController@dashboard')->name('manager-dash');
});

Route::middleware(['auth:storeKeeper'])->group(function () { 
    Route::get('/storeKeeper_panel', 'StoreKeeperController@dashboard')->name('storeKeeper-dash');
});

Route::middleware(['auth:cashier'])->group(function () { 
    Route::get('/cashier_panel', 'CashierController@dashboard')->name('cashier-dash');
});
