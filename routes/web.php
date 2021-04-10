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

Route::get('/registrar/user','UserController@create');
Route::post('/registrar/user','UserController@store');

Route::get('/logOut', 'UserController@logOut');

Route::get('/registrar/admin',function(){
    return view('auth.registerAdmin');
});
Route::post('/registrar/admin','UserController@store');


// SINGLE PRODUCT - NEW PRODUCT - MODIFY PRODUCT
Route::get('/producto/{id}','ProductController@show')->name('product');

Route::get('/new/product','ProductController@create')->middleware('auth','admin');
Route::post('/new/product','ProductController@store')->middleware('auth','admin');

// Route::get('/producto/modificar/{id}','ProductController@edit')->middleware('auth','admin');
// Route::put('/producto/modificar/{id}','ProductController@update')->middleware('auth','admin');


// PAYPAL
Route::get('/payment/{productID}', 'PaymentController@payWithPayPal')->name('payment')->middleware('auth');
Route::get('/payment/cancel', 'PaymentController@cancel')->name('payment.cancel')->middleware('auth');
Route::get('/payment/success/{payment_id}', 'PaymentController@success')->name('payment.success')->middleware('auth');

//PRUEBA
Route::get('/prueba','UserController@prueba');