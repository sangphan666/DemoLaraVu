<?php

/*Route::get('/post', function (){
    return "Demo laravel package";
});*/

Route::group(['namespace' => 'JPTech\Post\Http\Controllers'], function (){
    Route::get('admin/post', 'PostController@index')->name('post');
});