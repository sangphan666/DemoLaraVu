<?php

use Illuminate\Http\Request;

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

Route::group(['namespace' => 'JPTech\Users\Http\Controllers'], function () {
    Route::group([
        'prefix' => 'api',
        'middleware' => ['auth:api', 'bindings'],
    ], function () {
        Route::resource('users', 'UserController');
        Route::resource('roles', 'RoleController');
        Route::resource('groups', 'GroupController');
        Route::resource('permissions', 'PermissionController');
    });
});
