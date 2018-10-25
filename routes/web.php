<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
require __DIR__ . '/web/auth.php';
require __DIR__ . '/web/admin.php';
require __DIR__ . '/web/business.php';
require __DIR__ . '/web/personal.php';
require __DIR__ . '/web/app.php';

Route::get('/', function () {
    return view('index');
});

Route::get('/business', [
    'as' => 'business',
    'uses' => 'PagesController@bizpage'
]);


// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

//Recipient opens professional invoice
Route::get('/invoice/open/{uuid}', [
    'as' => 'invoice.open',
    'uses' => 'InvoiceController@OpenInvoice',
    'middleware'=>'auth'
]);

Route::get('/invoice/lnk/{ref_code}', [
    'as' => 'invoice.lnk',
    'uses' => 'InvoiceController@invoiceLink'
]);

// Recipient opens basic invoice
// Route::get('/invoice/review/{uuid}', [
//         'as' => 'invoice.review',
//         'uses' => 'InvoiceController@OpenBasicInvoice'
//     ]);

//Pay an invoice with Paystack
Route::post('/pay', [
    'uses' => 'PaymentController@redirectToGateway',
    'as' => 'pay',
    'middleware'=>'auth'
]);
Route::get('/payment/callback', 'PaymentController@handleGatewayCallback');



Route::get('/console/schedule', function(){

	Artisan::call('disburse:escrow');
});