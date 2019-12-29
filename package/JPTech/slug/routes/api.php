<?php

Route::group(['namespace' => 'JPTech\Slug\Http\Controllers'], function (){
    Route::get('api/slug', 'ApiSlugController@index')->name('api.slug');
    Route::get('api/slug/update', 'ApiSlugController@update')->name('api.slug.update');
    Route::get('api/slug/add', 'ApiSlugController@add')->name('api.slug.update');
});

//Hiếu đang xử lý phần slug có thể di duyển vào trong admin sau khi xử lý Policy
/*Route::group(['prefix' => 'admin'], function () {
    Route::get('slug', function ()    {
        return view('slug');
    });
});*/

//End task