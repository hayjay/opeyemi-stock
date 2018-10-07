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

Route::match(['get', 'post'], '/', 'UserController@index')->name('login');
Route::group(['prefix' => 'product', 'middleware' => 'auth'], function(){
	Route::match(['get', 'post'], '/', 'ProductController@addProduct');
	Route::match(['get', 'post'], '/purchase', 'ProductController@purchaseProduct');
});
Route::get('/logout', function(){
	auth()->logout();
	return redirect('/')->with('success', 'Logged Out!');
});
