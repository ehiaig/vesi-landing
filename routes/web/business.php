<?php

Route::group(['prefix' => 'business', 'namespace' => 'Business', 'middleware' => 'auth', 'accesslogin'], function() {

    // MERCHANT CONTROLLER
    // Route::get('/', [
    //     'as' => 'business.show.index',
    //     'uses' => 'BusinessController@index',
    //     // 'middleware'=>'verified'
    // ]);

    Route::post('/business', [
        'as' => 'dashboard.business.save',
        'uses' => 'BusinessController@createBusiness',
    ]);

    Route::match(['GET', 'POST'], '/business/{id}/edit', [
        'as' => 'dashboard.business.edit',
        'uses' => 'BusinessController@edit',
    ]);

    Route::get('/business/delete/{id?}', [
        'as' => 'dashboard.business.delete',
        'uses' => 'BusinessController@delete',
    ]);

    //Docs
    Route::get('/docs', [
        'as' => 'business.show.docs',
        'uses' => 'BusinessController@docs'
    ]);

});