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

Route::group(['middleware' => ['auth']], function() {
  Route::resource('contacts', 'App\Http\Controllers\ContactController');
  Route::resource('user', 'App\Http\Controllers\UserDashboardController@index');
  Route::resource('companies', 'App\Http\Controllers\CompanyController');
  Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
