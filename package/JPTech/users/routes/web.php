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

// Auth::routes();
// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

Route::get('/admin', 'DashboardController@index')->name('dashboard')->middleware('auth');

Route::group(['namespace' => 'JPTech\Users\Http\Controllers'], function (){
	Route::group(['middleware' => ['web']], function () {
		//users
	    Route::get('admin/users', 'UserController@index')->name('admin.users');

	    //usergroup
        Route::resource('admin/usergroup', 'GroupController@index');

        //permission
		Route::resource('admin/permission', 'PermissionController@index');
	});
});
