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

// Route::get('/',function(){
//     return view('welcome');
// });

Route::get('/','WebController@index');
// Route::get('kades',function(){
// 	return view('superadmin');
// })->middleware('role:Kepala Desa');

// Route::get('admin',function(){
// 	return view('admin.dashboard');
// })->middleware('role:Admin')->name('admin');

Route::get('user',function(){
	return view('user');
})->middleware('role:User');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'kades','middleware' => 'role:Kepala Desa','name' => 'kades'], function(){

    Route::post('/','UserController@gantiPas')->name('kades.ganti_password');
    Route::get('/','DashboardController@indexAdmin')->name('kades.dashboard');

    //route edit User
    Route::resource('pengguna','UserController',['names' =>'kades.pengguna'])->except(['show','edit']);

    //route CRUD data pelayanan surat pindah
    Route::post('spp/acc','SppController@acc')->name('kades.spp.acc');
    Route::get('spp/acc','SppController@indexAcc')->name('kades.spp.indexAcc');
    Route::resource('spp', 'SppController',['names' =>'kades.spp'])->except(['edit']);

    //route CRUD data ktp
    Route::post('ktp/acc','KtpController@acc')->name('kades.ktp.acc');
    Route::get('ktp/acc','KtpController@indexAcc')->name('kades.ktp.indexAcc');
    Route::resource('ktp', 'KtpController',['names' =>'kades.ktp'])->except(['edit']);

    //route Crud data surat Kelahiran
    Route::post('skk/acc','SkkController@acc')->name('kades.skk.acc');
    Route::get('skk/acc','SkkController@indexAcc')->name('kades.skk.indexAcc');
    Route::resource('skk','SkkController',['names' =>'kades.skk'])->except(['edit']);

    //route CRUD data sptjm
    Route::post('sptjm/acc','SptjmController@acc')->name('kades.sptjm.acc');
    Route::get('sptjm/acc','SptjmController@indexAcc')->name('kades.sptjm.indexAcc');
    Route::resource('sptjm','SptjmController',['names' =>'kades.sptjm'])->except(['edit']);

    //route data Riwayat pengunjung
    Route::get('/riwayat','DashboardController@riwayat')->name('kades.riwayat');
    Route::post('/riwayat','DashboardController@hapus_riwayat')->name('kades.hapus_riwayat');

    Route::get('/web','DashboardController@editWeb')->name('kades.web');
    Route::patch('/web/{id}','DashboardController@updateWeb')->name('kades.web.update');

    Route::get('struktur','DashboardController@indexStruktur')->name('kades.struktur');
    Route::patch('struktur/{id}','DashboardController@updateStruktur')->name('kades.struktur.update');

});

Route::group(['prefix' => 'admin','middleware' => 'role:Admin','name' => 'admin'], function(){
	
    Route::post('/','UserController@gantiPas')->name('admin.ganti_password');
    Route::get('/','DashboardController@indexAdmin')->name('admin.dashboard');
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

    //route Crud data surat Kelahiran
    Route::post('skk/acc','SkkController@acc')->name('skk.acc');
    Route::get('skk/acc','SkkController@indexAcc')->name('skk.indexAcc');
    Route::resource('skk','SkkController')->except(['edit']);

    //route CRUD data sptjm
    Route::post('sptjm/acc','SptjmController@acc')->name('sptjm.acc');
    Route::get('sptjm/acc','SptjmController@indexAcc')->name('sptjm.indexAcc');
    Route::resource('sptjm','SptjmController')->except(['edit']);

    Route::get('/riwayat','DashboardController@riwayat')->name('riwayat');
    Route::post('/riwayat','DashboardController@hapus_riwayat')->name('hapus_riwayat');

    Route::get('/web','DashboardController@editWeb')->name('admin.web');
    Route::patch('/web/{id}','DashboardController@updateWeb')->name('admin.web.update');

    Route::get('struktur','DashboardController@indexStruktur')->name('admin.struktur');
    Route::patch('struktur/{id}','DashboardController@updateStruktur')->name('admin.struktur.update');

});
