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
Route::get('/manager-login', 'Auth\LoginController@manager')->name('manager-login');
Route::get('/stockKeeper-login', 'Auth\LoginController@stockKeeper')->name('stockKeeper-login');
Route::get('/cashier-login', 'Auth\LoginController@cashier')->name('cashier-login');

Route::get('/manager-register', 'Auth\RegisterController@manager')->name('cashier-register');
Route::get('/storeKeeper-register', 'Auth\RegisterController@stockKeeper')->name('cashier-register');
Route::get('/cashier-register', 'Auth\RegisterController@cashier')->name('cashier-register');
//--------Login Page routes

//--------Login Submission routes 
Route::post('/manager_login', 'Auth\LoginController@managerLogin')->name('manager-verify');
Route::post('/stockKeeper_login', 'Auth\LoginController@storeKeeperLogin')->name('stockKeeper-verify');
Route::post('/cashier_login', 'Auth\LoginController@cashierLogin')->name('cashier-verify');
//--------Login Submission routes

//--------Register Submission routes
Route::post('/manager_register', 'Auth\RegisterController@managerRegister')->name('cashier-verify');
Route::post('/storeKeeper_register', 'Auth\RegisterController@storeKeeperRegister')->name('cashier-verify');
Route::post('/cashier_register', 'Auth\RegisterController@cashierRegister')->name('cashier-verify');
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


Route::get('{path}','HomeController@index')->where( 'path', '([A-z\d\-\/_.]+)?' );