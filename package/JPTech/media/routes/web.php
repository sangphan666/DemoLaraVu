<?php
Route::group(['namespace' => 'JPTech\Media\Http\Controllers'], function (){
	Route::group(['middleware' => ['web']], function () {
	    Route::get('admin/media', 'MediaController@index')->name('admin.product');

	    //category product
		Route::resource('admin/media', 'MediaController');
	});
});
//Hiếu đang xử lý phần category có thể di duyển vào trong admin sau khi xử lý Policy
/*Route::group(['prefix' => 'admin'], function () {
    Route::get('category', function ()    {
        return view('category');
    });
});*/
//End task