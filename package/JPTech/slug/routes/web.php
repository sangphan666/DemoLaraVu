<?php

/*Route::get('/post', function (){
    return "Demo laravel package";
});*/

Route::group(['namespace' => 'JPTech\Slug\Http\Controllers'], function (){
    Route::group(['middleware' => ['web']], function () {
	    Route::get('admin/slug', 'SlugController@index')->name('admin.slug');
	});
});

//Hiếu đang xử lý phần category có thể di duyển vào trong admin sau khi xử lý Policy
/*Route::group(['prefix' => 'admin'], function () {
    Route::get('category', function ()    {
        return view('category');
    });
});*/
//End task