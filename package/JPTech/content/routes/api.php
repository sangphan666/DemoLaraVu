<?php

Route::group(['namespace' => 'JPTech\Content\Http\Controllers'], function (){
    Route::get('api/content', 'ApiContentController@index')->name('api.content');
    Route::get('api/content/update', 'ApiContentController@update')->name('api.content.update');
    Route::get('api/content/add', 'ApiContentController@update')->name('api.content.update');
});

//Hiếu đang xử lý phần Content có thể di duyển vào trong admin sau khi xử lý Policy
/*Route::group(['prefix' => 'admin'], function () {
    Route::get('Content', function ()    {
        return view('Content');
    });
});*/

//End task