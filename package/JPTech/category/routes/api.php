<?php

Route::group(['namespace' => 'JPTech\Category\Http\Controllers'], function (){
	
	Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::resource('api/category', 'ApiCategoryController');
    });

    //category product
	Route::resource('api/category', 'ApiCategoryController');
});