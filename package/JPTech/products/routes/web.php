<?php

Route::group(['namespace' => 'JPTech\Products\Http\Controllers'], function (){
	Route::group(['middleware' => ['web']], function () {
		//product
	    Route::get('admin/product', 'ProductController@index')->name('admin.product');

	    //category product
		Route::resource('admin/product/category', 'CategoryController');
		Route::match(['put', 'patch'], 'admin/product/category/update/{id}','CategoryController@update');
	});
});