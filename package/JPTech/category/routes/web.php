<?php

Route::group(['namespace' => 'JPTech\Category\Http\Controllers'], function (){
	Route::group(['middleware' => ['web']], function () {
	    Route::get('admin/category', 'CategoryController@index')->name('admin.category');
	});
    
});



//Hiếu đang xử lý phần category có thể di duyển vào trong admin sau khi xử lý Policy
/*Route::group(['prefix' => 'admin'], function () {
    Route::get('category', function ()    {
        return view('category');
    });
});*/
//End task