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

Route::get('list-folder-contents', function() {
    // The human readable folder name to get the contents of...
    // For simplicity, this folder is assumed to exist in the root directory.
    $folder = 'tentang';
    // Get root directory contents...
    $contents = collect(Storage::cloud()->listContents('/', false));
    // Find the folder you are looking for...
    $dir = $contents->where('type', '=', 'dir')
        ->where('filename', '=', $folder)
        ->first(); // There could be duplicate directory names!
    if ( ! $dir) {
        return 'No such folder!';
    }
    // Get the files inside the folder...
    $files = collect(Storage::cloud()->listContents($dir['path'], false))
        ->where('type', '=', 'file');
    return $files->mapWithKeys(function($file) {
        $filename = $file['filename'].'.'.$file['extension'];
        $path = $file['path'];
        // Use the path to download each file via a generated link..
        // Storage::cloud()->get($file['path']);
        return [$path];
    });
});

Route::get('newest', function() {
    $filename = '6249d93e3223fb15563a1dd612d0ab93.jpg';
    $dir = '1GbRMvea33-6AKC9XGeh7X4CUKQnVdCc0';
    $recursive = false; // Get subdirectories also?
    $file = collect(Storage::cloud()->listContents($dir, $recursive))
        ->where('type', '=', 'file')
        ->where('filename', '=', pathinfo($filename, PATHINFO_FILENAME))
        ->where('extension', '=', pathinfo($filename, PATHINFO_EXTENSION))
        ->sortBy('timestamp')
        ->last();
    return $file['basename'];
});

    Route::get('/','WebController@index');
    
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');

    // Password Reset Routes...
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');

    Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'role:User'], function(){
    Route::resource('spp', 'SppController',['names' =>'user.spp'])->only(['store']);
    Route::resource('ktp', 'KtpController',['names' =>'user.ktp'])->only(['store']);
    Route::resource('skk','SkkController',['names' =>'user.skk'])->only(['store']);
    Route::resource('sptjm','SptjmController',['names' =>'user.sptjm'])->only(['store']);
    Route::resource('pengaduan','PengaduanController',['names' =>'user.pengaduan'])->only(['store']);
});

Route::group(['prefix' => 'kades','middleware' => 'role:Kepala Desa','name' => 'kades'], function(){

    Route::post('/','UserController@gantiPas')->name('kades.ganti_password');
    Route::get('/','DashboardController@indexAdmin')->name('kades.dashboard');

    //route edit User
    Route::resource('pengguna','UserController',['names' =>'kades.pengguna'])->except(['show','edit']);

    //route CRUD data pelayanan surat pindah
    Route::post('spp/acc','SppController@acc')->name('kades.spp.acc');
    Route::get('spp/acc','SppController@indexAcc')->name('kades.spp.indexAcc');
    Route::resource('spp', 'SppController',['names' =>'kades.spp'])->except(['edit','create']);

    //route CRUD data ktp
    Route::post('ktp/acc','KtpController@acc')->name('kades.ktp.acc');
    Route::get('ktp/acc','KtpController@indexAcc')->name('kades.ktp.indexAcc');
    Route::resource('ktp', 'KtpController',['names' =>'kades.ktp'])->except(['edit','create']);

    //route Crud data surat Kelahiran
    Route::post('skk/acc','SkkController@acc')->name('kades.skk.acc');
    Route::get('skk/acc','SkkController@indexAcc')->name('kades.skk.indexAcc');
    Route::resource('skk','SkkController',['names' =>'kades.skk'])->except(['edit','create']);

    //route CRUD data sptjm
    Route::post('sptjm/acc','SptjmController@acc')->name('kades.sptjm.acc');
    Route::get('sptjm/acc','SptjmController@indexAcc')->name('kades.sptjm.indexAcc');
    Route::resource('sptjm','SptjmController',['names' =>'kades.sptjm'])->except(['edit','create']);

    //route CRUD data Pengaduan
    Route::post('pengaduan/acc','PengaduanController@acc')->name('kades.pengaduan.acc');
    Route::get('pengaduan/acc','PengaduanController@indexAcc')->name('kades.pengaduan.indexAcc');
    Route::resource('pengaduan','PengaduanController',['names' => 'kades.pengaduan'])->except(['edit','create']);

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
    Route::resource('spp', 'SppController')->except(['edit','create']);

    //route CRUD data ktp
    Route::post('ktp/acc','KtpController@acc')->name('ktp.acc');
    Route::get('ktp/acc','KtpController@indexAcc')->name('ktp.indexAcc');
    Route::resource('ktp', 'KtpController')->except(['edit','create']);

    //route Crud data surat Kelahiran
    Route::post('skk/acc','SkkController@acc')->name('skk.acc');
    Route::get('skk/acc','SkkController@indexAcc')->name('skk.indexAcc');
    Route::resource('skk','SkkController')->except(['edit','create']);

    //route CRUD data sptjm
    Route::post('sptjm/acc','SptjmController@acc')->name('sptjm.acc');
    Route::get('sptjm/acc','SptjmController@indexAcc')->name('sptjm.indexAcc');
    Route::resource('sptjm','SptjmController')->except(['edit','create']);

    //route CRUD data Pengaduan
    Route::post('pengaduan/acc','PengaduanController@acc')->name('pengaduan.acc');
    Route::get('pengaduan/acc','PengaduanController@indexAcc')->name('pengaduan.indexAcc');
    Route::resource('pengaduan','PengaduanController')->except(['edit','create']);

    Route::get('/riwayat','DashboardController@riwayat')->name('riwayat');
    Route::post('/riwayat','DashboardController@hapus_riwayat')->name('hapus_riwayat');

    Route::get('/web','DashboardController@editWeb')->name('admin.web');
    Route::patch('/web/{id}','DashboardController@updateWeb')->name('admin.web.update');

    Route::get('struktur','DashboardController@indexStruktur')->name('admin.struktur');
    Route::patch('struktur/{id}','DashboardController@updateStruktur')->name('admin.struktur.update');

});
