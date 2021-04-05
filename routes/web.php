<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'ProductController@index')->name('index');


// LOGIN - REGISTRO - LOG-OUT
Route::get('/login',function(){
    return view('auth.login');
})->name('login');
Route::post('/login','UserController@login');

Route::get('/registrar','UserController@create');
Route::post('/registrar','UserController@store');

Route::get('/logOut', 'UserController@logOut');


// SINGLE PRODUCT - NEW PRODUCT - MODIFY PRODUCT
Route::get('/producto/{id}','ProductController@show')->name('product');

Route::get('/new/product','ProductController@create');
Route::post('/new/product','ProductController@store');

Route::get('/producto/modificar/{id}','ProductController@edit');
Route::put('/producto/modificar/{id}','ProductController@update');


// PAYPAL
Route::get('/payment/{productID}', 'PaymentController@payWithPayPal')->name('payment');
Route::get('/payment/cancel', 'PaymentController@cancel')->name('payment.cancel');
Route::get('/payment/success/{payment_id}', 'PaymentController@success')->name('payment.success');