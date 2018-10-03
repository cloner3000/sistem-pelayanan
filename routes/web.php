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

Route::get('/', function () {
    return view('welcome');
});

Route::get('superadmin',function(){
	return view('superadmin');
})->middleware('role:Super Admin');

Route::get('admin',function(){
	return view('admin');
})->middleware('role:Admin');

Route::get('user',function(){
	return view('user');
})->middleware('role:User');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
