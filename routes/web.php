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
Route::get('login', 'AdminController@index');
Route::get('logout', 'AdminController@logout');
Route::post('post-login', 'AdminController@postLogin'); 
Route::get('registration', 'AdminController@registration');
Route::post('post-registration', 'AdminController@postRegistration');

Route::get('/admin', 'AdminController@dashboard')->name('admin');
