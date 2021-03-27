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

Route::get('/', function () {
    return view('index');
})->name('index');


// LOGIN - REGISTRO - LOG-OUT

Route::get('/login',function(){
    return view('auth.login');
})->name('login');
Route::post('/login','UserController@login');


Route::get('/registrar','UserController@create');
Route::post('/registrar','UserController@store');

Route::get('/logOut', 'UserController@logOut');


// PRODUCT SINGLE - NEW PRODUCT
Route::get('/producto/{id}',function(){
    return view('product.detail');
});

Route::get('/new/product','ProductController@create');
Route::post('/new/product','ProductController@store');

Route::get('/paypal/pay', 'PaymentController@payWithPayPal');
Route::get('/paypal/status', 'PaymentController@payPalStatus');