<?php

Route::group(['namespace' => 'JPTech\Content\Http\Controllers'], function (){

    Route::group(['middleware' => ['web']], function () {
	    Route::get('admin/content', 'ContentController@index')->name('admin.content');
	});
});

//Hiếu đang xử lý phần content có thể di duyển vào trong admin sau khi xử lý Policy
/*Route::group(['prefix' => 'admin'], function () {
    Route::get('content', function ()    {
        return view('content');
    });
});*/
//End task