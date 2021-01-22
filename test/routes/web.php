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
  Route::post('passupdate', 'App\Http\Controllers\Pop_upController@changePassword');#password veranderen
  #route voor de pop up form
  Route::post('cssupdate', 'App\Http\Controllers\Pop_upController@updateColor');

  Route::resource('contacts', 'App\Http\Controllers\ContactController');
  Route::resource('companies', 'App\Http\Controllers\CompanyController');
  Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
