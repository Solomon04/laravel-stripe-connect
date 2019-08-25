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
Route::get('/', 'ProductController@index')->name('products');
Route::get('/save', 'CustomerController@form')->name('stripe.form');
Route::post('/save', 'CustomerController@save')->name('save.customer');