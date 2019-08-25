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

//Route::get('/', function () {
//    return view('home');
//});

Auth::routes();

//Route::get('/', 'HomeController@index')->name('home');

Route::get('stripe', 'SellerController@save')->name('save.express');

Route::group(['middleware' => ['auth:web']], function(){
    Route::group(['middleware' => ['stripe']], function(){
        Route::get('/', 'ProductController@index')->name('products');
        Route::get('dashboard', 'SellerController@login')->name('stripe.login');
        Route::get('add', 'ProductController@add')->name('product.form')->middleware('seller');
        Route::post('add', 'ProductController@store')->name('save.product')->middleware('seller');
        Route::post('purchase', 'ProductController@purchase')->name('purchase')->middleware('customer');

    });
    Route::get('save', 'CustomerController@form')->name('stripe.form');
    Route::post('save', 'CustomerController@save')->name('save.customer');
    Route::get('express', 'SellerController@create')->name('create.express');
});
