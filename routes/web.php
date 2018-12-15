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
    Route::get('test',function(){
        return PDF::loadView('pdf.pengaduan')->stream('test.pdf');
    });

    Route::get('/','WebController@index')->name('/');
    
    //Route Blog
    Route::get('berita','WebController@blogIndex')->name('berita');
    Route::get('berita/{slug}','WebController@blogDetail')->name('detail');
    Route::get('berita/kategori/{slug}','WebController@kategori')->name('kategori');
    Route::post('berita','WebController@cari')->name('cari');

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
    
    // Route::resource('spp', 'SppController',['names' =>'user.spp'])->only(['store']);
    Route::resource('ktp', 'KtpController',['names' =>'user.ktp'])->only(['store']);
    Route::resource('skk','SkkController',['names' =>'user.skk'])->only(['store']);
    Route::resource('sptjm','SptjmController',['names' =>'user.sptjm'])->only(['store']);
    Route::resource('pengaduan','PengaduanController',['names' =>'user.pengaduan'])->only(['store']);
    Route::resource('sk','SkController',['names' =>'user.sk'])->only(['store']);
    Route::resource('skematian','SkematianController',['names' =>'user.skematian'])->only(['store']);
    Route::resource('sktm','SktmController',['names' =>'user.sktm'])->only(['store']);
});

Route::group(['prefix' => 'kades','middleware' => 'role:Kepala Desa','name' => 'kades'], function(){

    Route::post('/','UserController@gantiPas')->name('kades.ganti_password');
    Route::get('/','DashboardController@indexAdmin')->name('kades.dashboard');

    //route edit User
    Route::resource('pengguna','UserController',['names' =>'kades.pengguna'])->except(['show','edit']);

    //route CRUD data pelayanan surat pindah
    // Route::post('acc/spp','SppController@acc')->name('kades.spp.acc');
    // Route::get('acc/spp','SppController@indexAcc')->name('kades.spp.indexAcc');
    // Route::resource('spp', 'SppController',['names' =>'kades.spp'])->except(['show','edit','create']);
    // Route::get('spp/{spp}/{user_id}','SppController@show')->name('kades.spp.show');
    // Route::post('export/spp','SppController@csv')->name('kades.spp.export');
    // Route::get('export/spp',function(){
    //     return abort(404);
    // });

    //route CRUD data ktp
    Route::post('acc/ktp','KtpController@acc')->name('kades.ktp.acc');
    Route::get('acc/ktp','KtpController@indexAcc')->name('kades.ktp.indexAcc');
    Route::resource('ktp', 'KtpController',['names' =>'kades.ktp'])->except(['show','edit','create']);
    Route::get('ktp/{ktp}/{user_id}','KtpController@show')->name('kades.ktp.show');
    Route::post('export/ktp','KtpController@csv')->name('kades.ktp.export');
    Route::get('export/ktp',function(){
        return abort(404);
    });

    //route Crud data surat Kelahiran
    Route::post('acc/skk','SkkController@acc')->name('kades.skk.acc');
    Route::get('acc/skk','SkkController@indexAcc')->name('kades.skk.indexAcc');
    Route::resource('skk','SkkController',['names' =>'kades.skk'])->except(['show','edit','create']);
    Route::get('skk/{skk}/{user_id}','SkkController@show')->name('kades.skk.show');
    Route::post('export/skk','SkkController@csv')->name('kades.skk.export');
    Route::get('export/skk',function(){
        return abort(404);
    });

    //route CRUD data sptjm
    Route::post('acc/sptjm','SptjmController@acc')->name('kades.sptjm.acc');
    Route::get('acc/sptjm','SptjmController@indexAcc')->name('kades.sptjm.indexAcc');
    Route::resource('sptjm','SptjmController',['names' =>'kades.sptjm'])->except(['show','edit','create']);
    Route::get('sptjm/{sptjm}/{user_id}','SptjmController@show')->name('kades.sptjm.show');
    Route::post('export/sptjm','SptjmController@csv')->name('kades.sptjm.export');
    Route::get('export/sptjm',function(){
        return abort(404);
    });

    //route CRUD data Pengaduan
    Route::post('acc/pengaduan','PengaduanController@acc')->name('kades.pengaduan.acc');
    Route::get('acc/pengaduan','PengaduanController@indexAcc')->name('kades.pengaduan.indexAcc');
    Route::resource('pengaduan','PengaduanController',['names' => 'kades.pengaduan'])->except(['update','edit','create']);
    Route::post('export/pengaduan','PengaduanController@csv')->name('kades.pengaduan.export');
    Route::get('export/pengaduan',function(){
        return abort(404);
    });

    //route CRUD data Sktm
    Route::post('acc/sktm','SktmController@acc')->name('kades.sktm.acc');
    Route::get('acc/sktm','SktmController@indexAcc')->name('kades.sktm.indexAcc');
    Route::resource('sktm','SktmController',['names' => 'kades.sktm'])->except(['show','edit','create']);
    Route::get('sktm/{sktm}/{user_id}','SktmController@show')->name('kades.sktm.show');
    Route::post('export/sktm','SktmController@csv')->name('kades.sktm.export');
    Route::get('export/sktm',function(){
        return abort(404);
    });

    //route CRUD data Skematian
    Route::post('acc/skematian','SkematianController@acc')->name('kades.skematian.acc');
    Route::get('acc/skematian','SkematianController@indexAcc')->name('kades.skematian.indexAcc');
    Route::resource('skematian','SkematianController',['names' => 'kades.skematian'])->except(['show','edit','create']);
    Route::get('skematian/{skematian}/{user_id}','SkematianController@show')->name('kades.skematian.show');
    Route::post('export/skematian','SkematianController@csv')->name('kades.skematian.export');
    Route::get('export/skematian',function(){
        return abort(404);
    });

    //route CRUD data Keterangan
    Route::post('acc/sk','SkController@acc')->name('kades.sk.acc');
    Route::get('acc/sk','SkController@indexAcc')->name('kades.sk.indexAcc');
    Route::resource('sk','SkController',['names' => 'kades.sk'])->except(['show','edit','create']);
    Route::get('sk/{sk}/{user_id}','SkController@show')->name('kades.sk.show');
    Route::post('export/sk','SkController@csv')->name('kades.sk.export');
    Route::get('export/sk',function(){
        return abort(404);
    });

    //Route CRUD Kategori
    Route::resource('kategori','KategoriController',['names' => 'kades.kategori'])->except(['show','edit','create']);

    //Route CRUD Profesi
    Route::resource('profesi','PekerjaanController',['names' => 'kades.profesi'])->except(['show','edit','create']);

    //Route CRUD Post
    Route::resource('blog','BlogController',['names' => 'kades.blog']);

    //route data Riwayat pengunjung
    Route::get('/riwayat','DashboardController@riwayat')->name('kades.riwayat');
    Route::post('/riwayat','DashboardController@hapus_riwayat')->name('kades.hapus_riwayat');

    Route::get('/web','DashboardController@editWeb')->name('kades.web');
    Route::patch('/web/{id}','DashboardController@updateWeb')->name('kades.web.update');

    Route::get('struktur','DashboardController@indexStruktur')->name('kades.struktur');
    Route::patch('struktur/{id}','DashboardController@updateStruktur')->name('kades.struktur.update');

});

Route::group(['prefix' => 'admin',['middleware' => 
        'role:Sekretaris Desa','role:Kepala Urusan Administrasi Umum','role:Kepala Urusan Keuangan',
        'role:Kepala Urusan Perencanaan','role:Kepala Seksi Pelayanan','role:Kepala Seksi Pemerintahan',
        'role:Kepala Seksi Kesejahteraan','role:Kepala Dusun Malinggut I','role:Kepala Dusun Malinggut II',
        'role:Kepala Dusun Malinggut III','role:Kepala Dusun Sukamaju'
    ],'name' => 'admin'], function(){
	
    Route::post('/','UserController@gantiPas')->name('admin.ganti_password');
    Route::get('/','DashboardController@indexAdmin')->name('admin.dashboard');

    //route edit User
    Route::resource('pengguna','UserController')->except(['show','edit']);

    //route CRUD data pelayanan surat pindah
    // Route::post('acc/spp','SppController@acc')->name('spp.acc');
    // Route::get('acc/spp','SppController@indexAcc')->name('spp.indexAcc');
    // Route::resource('spp', 'SppController')->except(['show','edit','create']);
    // Route::get('spp/{spp}/{user_id}','SppController@show')->name('spp.show');
    // Route::post('export/spp','SppController@csv')->name('spp.export');
    // Route::get('export/spp',function(){
    //     return abort(404);
    // });

    //route CRUD data ktp
    Route::post('acc/ktp','KtpController@acc')->name('ktp.acc');
    Route::get('acc/ktp','KtpController@indexAcc')->name('ktp.indexAcc');
    Route::resource('ktp', 'KtpController')->except(['show','edit','create']);
    Route::get('ktp/{ktp}/{user_id}','KtpController@show')->name('ktp.show');
    Route::post('export/ktp','KtpController@csv')->name('ktp.export');
    Route::get('export/ktp',function(){
        return abort(404);
    });

    //route Crud data surat Kelahiran
    Route::post('acc/skk','SkkController@acc')->name('skk.acc');
    Route::get('acc/skk','SkkController@indexAcc')->name('skk.indexAcc');
    Route::resource('skk','SkkController')->except(['show','edit','create']);
    Route::get('skk/{skk}/{user_id}','SkkController@show')->name('skk.show');
    Route::post('export/skk','SkkController@csv')->name('skk.export');
    Route::get('export/skk',function(){
        return abort(404);
    });

    //route CRUD data sptjm
    Route::post('acc/sptjm','SptjmController@acc')->name('sptjm.acc');
    Route::get('acc/sptjm','SptjmController@indexAcc')->name('sptjm.indexAcc');
    Route::resource('sptjm','SptjmController')->except(['show','edit','create']);
    Route::get('sptjm/{sptjm}/{user_id}','SptjmController@show')->name('sptjm.show');
    Route::post('export/sptjm','SptjmController@csv')->name('sptjm.export');
    Route::get('export/sptjm',function(){
        return abort(404);
    });

    //route CRUD data sktm
    Route::post('acc/sktm','SktmController@acc')->name('sktm.acc');
    Route::get('acc/sktm','SktmController@indexAcc')->name('sktm.indexAcc');
    Route::resource('sktm','SktmController')->except(['show','edit','create']);
    Route::get('sktm/{sktm}/{user_id}','SktmController@show')->name('sktm.show');
    Route::post('export/sktm','SktmController@csv')->name('sktm.export');
    Route::get('export/sktm',function(){
        return abort(404);
    });

    //route CRUD data Skematian
    Route::post('acc/skematian','SkematianController@acc')->name('skematian.acc');
    Route::get('acc/skematian','SkematianController@indexAcc')->name('skematian.indexAcc');
    Route::resource('skematian','SkematianController',['names' => 'skematian'])->except(['show','edit','create']);
    Route::get('skematian/{skematian}/{user_id}','SkematianController@show')->name('skematian.show');
    Route::post('export/skematian','SkematianController@csv')->name('skematian.export');
    Route::get('export/skematian',function(){
        return abort(404);
    });

    //route CRUD data Keterangan
    Route::post('acc/sk','SkController@acc')->name('sk.acc');
    Route::get('acc/sk','SkController@indexAcc')->name('sk.indexAcc');
    Route::resource('sk','SkController',['names' => 'sk'])->except(['show','edit','create']);
    Route::get('sk/{sk}/{user_id}','SkController@show')->name('sk.show');
    Route::post('export/sk','SkController@csv')->name('sk.export');
    Route::get('export/sk',function(){
        return abort(404);
    });

    //route CRUD data Pengaduan
    Route::post('acc/pengaduan','PengaduanController@acc')->name('pengaduan.acc');
    Route::get('acc/pengaduan','PengaduanController@indexAcc')->name('pengaduan.indexAcc');
    Route::resource('pengaduan','PengaduanController')->except(['update','edit','create']);
    Route::post('export/pengaduan','PengaduanController@csv')->name('pengaduan.export');
    Route::get('export/pengaduan',function(){
        return abort(404);
    });

    //Route CRUD Kategori
    Route::resource('kategori','KategoriController')->except(['show','edit','create']);

    //Route CRUD Profesi
    Route::resource('profesi','PekerjaanController')->except(['show','edit','create']);

    //Route CRUD Post
    Route::resource('blog','BlogController');

    Route::get('/riwayat','DashboardController@riwayat')->name('riwayat');
    Route::post('/riwayat','DashboardController@hapus_riwayat')->name('hapus_riwayat');

    Route::get('/web','DashboardController@editWeb')->name('admin.web');
    Route::patch('/web/{id}','DashboardController@updateWeb')->name('admin.web.update');

    Route::get('struktur','DashboardController@indexStruktur')->name('admin.struktur');
    Route::patch('struktur/{id}','DashboardController@updateStruktur')->name('admin.struktur.update');

});
