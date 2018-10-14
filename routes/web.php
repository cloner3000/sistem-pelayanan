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
    return view('admin.user.tambahUser');
});

Route::get('kades',function(){
	return view('superadmin');
})->middleware('role:Kepala Desa');

Route::get('admin',function(){
	return view('admin.dashboard');
})->middleware('role:Admin')->name('admin');

Route::get('user',function(){
	return view('user');
})->middleware('role:User');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin','middleware' => 'role:Admin','name' => 'admin'], function(){
	//route edit User
    Route::resource('pengguna','UserController')->except(['show','edit']);

    //route CRUD data pelayanan surat pindah
    Route::post('spp/acc','SppController@acc')->name('spp.acc');
    Route::get('spp/acc','SppController@indexAcc')->name('spp.indexAcc');
    Route::resource('spp', 'SppController')->except(['edit']);

    //route CRUD data ktp
    Route::post('ktp/acc','KtpController@acc')->name('ktp.acc');
    Route::get('ktp/acc','KtpController@indexAcc')->name('ktp.indexAcc');
    Route::resource('ktp', 'KtpController')->except(['edit']);

});
