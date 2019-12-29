<?php

Route::group(['namespace' => 'JPTech\Media\Http\Controllers'], function (){
	
	Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::resource('api/media', 'ApiMediaController');
    });

    //category product
	Route::resource('api/media', 'ApiMediaController');
});