<?php

Auth::routes();


Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');

Route::get('register/personal', [
    'as' => 'auth.show.register.personal',
    'uses' => 'Auth\RegisterController@showRegisterPersonal'
]);

Route::post('register/personal', [
    'as' => 'auth.register.personal.save',
    'uses' => 'Auth\RegisterController@registerPersonal'
]);

Route::match(['GET', 'POST'], 'logout')
    ->name('auth.logout')
    ->uses('Auth\LoginController@logout');

Route::get('register/vsadmin', [
    'as' => 'auth.show.register.vsadmin',
    'uses' => 'Auth\RegisterController@showRegisterAdmin'
]);

Route::post('register/vsadmin', [
    'as' => 'auth.register.vsadmin.save',
    'uses' => 'Auth\RegisterController@registerAdmin'
]);

Route::get('register/business', [
    'as' => 'auth.show.register.business',
    'uses' => 'Auth\RegisterController@showRegisterBusiness'
]);

Route::post('register/business', [
    'as' => 'auth.register.business.save',
    'uses' => 'Auth\RegisterController@registerBusiness'
]);

Route::match(['GET', 'POST'], 'set/password/{uuid}')
    ->name('set.new.password')
    ->uses('Auth\ResetPasswordController@setNewPassword');

