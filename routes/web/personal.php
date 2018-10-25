<?php

Route::group(['prefix' => 'personal', 'namespace' => 'Personal', 'middleware' => 'auth', 'accesslogin'], function() {

    // BUYER CONTROLLER
    Route::get('personal/', [
        'as' => 'personal.show.index',
        'uses' => 'PersonalController@index'
    ]);

    Route::get('/fund-wallet', [
        'as' => 'dashboard.show.fund-wallet',
        'uses' => 'PersonalController@fundWallet'
    ]);

    Route::get('/personal/all', [
        'as' => 'personal.show.all',
        'uses' => 'PersonalController@allPayments'
    ]);

    //Get invoice Key
    // Route::post('/invoice/single/{uuid}', [
    //     'as' => 'item.save',
    //     'uses' => 'ItemController@createItem',
    // ]);

    //Send invoice key to recipient
});