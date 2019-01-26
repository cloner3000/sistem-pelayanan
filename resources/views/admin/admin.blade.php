<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | @yield('judul')</title>

  <link rel="shortcut icon" type="image/png" href="{{ asset('img/logo.jpg') }}"/>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" type="text/css" href="{{ secure_asset('css/app.css') }}">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <a href="{{ route('admin.dashboard') }}" class="logo">
      <span class="logo-mini"><b>S</b>P</span>
      <span class="logo-lg"><b>System</b> Pelayanan</span>
    </a>

    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <i class="fa fa-list"></i>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span class="hidden-xs">{{Auth::user()->name}}</span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-body bg-aqua">
                <div class="row">
                  <div class="col-xs-12 text-center">
                    <p>
                      {{Auth::user()->name}} - {{Auth::user()->roles->first()->deskripsi}}
                    </p>
                    <p>
                      <small>Admin Sejak {{Auth::user()->created_at}}</small>
                    </p>
                  </div>
                </div>
              </li>
              <li class="user-footer">
                <div class="pull-right">
                  <a class="btn btn-info" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>

                <div class="pull-left">
                  <a class="btn btn-info" href="{{ route('pengguna.create') }}">Ubah Password</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>

  </header>

  <aside class="main-sidebar">
    <section class="sidebar">     
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU UTAMA</li>
        <li class="@yield('dashboard')">
          <a href="{{ route('admin.dashboard') }}">
            <i class="fa fa-tachometer-alt"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li class="treeview @yield('user')">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Data Akun</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="@yield('tambahUser')">
              <a href="{{ route('pengguna.create') }}"><i class="fa fa-dot-circle"></i>Tambah User</a>
            </li>
            <li class="@yield('daftarUser')">
              <a href="{{ route('pengguna.index') }}"><i class="fa fa-dot-circle"></i>Daftar User</a>
            </li>
          </ul>
        </li>

       {{--  <li class="treeview @yield('spp')">
          <a href="#">
            <i class="fa fa-people-carry"></i>
            <span>Data Surat Pindah</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="@yield('pengajuanSpp')">
              <a href="{{ route('spp.index') }}"><i class="fa fa-dot-circle"></i>Pengajuan</a>
            </li>
            <li class="@yield('riwayatSpp')">
              <a href="{{ route('spp.indexAcc') }}"><i class="fa fa-dot-circle"></i>Riwayat Pengajuan</a>
            </li>
          </ul>
        </li> --}}

        <li class="treeview @yield('ktp')">
          <a href="#">
            <i class="fa fa-id-card"></i> <span>Data Surat KTP</span>
            @if($nKtp > 0)
              <span class="pull-right-container">
                <small class="label pull-right bg-blue">{{$nKtp}}</small>
              </span>
            @else
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            @endif
          </a>
          <ul class="treeview-menu">
            <li class="@yield('pengajuanKtp')">
              <a href="{{ route('ktp.index') }}"><i class="fa fa-dot-circle"></i>Pengajuan</a>
            </li>
            <li class="@yield('riwayatKtp')">
              <a href="{{ route('ktp.acc') }}"><i class="fa fa-dot-circle"></i>Riwayat Pengajuan</a>
            </li>
          </ul>
        </li>

        <li class="treeview @yield('skk')">
          <a href="#">
            <i class="fa fa-child"></i> <span>Data Surat Kelahiran</span>
            @if($nSkk > 0)
              <span class="pull-right-container">
                <small class="label pull-right bg-blue">{{$nSkk}}</small>
              </span>
            @else
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            @endif
          </a>
          <ul class="treeview-menu">
            <li class="@yield('pengajuanSkk')">
              <a href="{{ route('skk.index') }}">
                <i class="fa fa-dot-circle"></i> 
                Pengajuan
              </a>
            </li>
            <li class="@yield('riwayatSkk')">
              <a href="{{ route('skk.acc') }}">
                <i class="fa fa-dot-circle"></i> 
                Riwayat Pengajuan
              </a>
            </li>
          </ul>
        </li>
        
        <li class="treeview @yield('sktm')">
          <a href="#">
            <i class="fa fa-file-invoice-dollar"></i><span>Data SKTM</span>
            @if($nSktm > 0)
              <span class="pull-right-container">
                <small class="label pull-right bg-blue">{{$nSktm}}</small>
              </span>
            @else
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            @endif
          </a>
          <ul class="treeview-menu">
            <li class="@yield('pengajuanSktm')">
              <a href="{{ route('sktm.index') }}">
                <i class="fa fa-dot-circle"></i> 
                Pengajuan
              </a>
            </li>
            <li class="@yield('riwayatSktm')">
              <a href="{{ route('sktm.acc') }}">
                <i class="fa fa-dot-circle"></i> 
                Riwayat Pengajuan
              </a>
            </li>
          </ul>
        </li>

        <li class="treeview @yield('skematian')">
          <a href="#">
            <i class="fa fa-book-dead"></i> <span>Data Surat Kematian</span>
            @if($nSkematian > 0)
              <span class="pull-right-container">
                <small class="label pull-right bg-blue">{{$nSkematian}}</small>
              </span>
            @else
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            @endif
          </a>
          <ul class="treeview-menu">
            <li class="@yield('pengajuanSkematian')">
              <a href="{{ route('skematian.index') }}">
                <i class="fa fa-dot-circle"></i> 
                Pengajuan
              </a>
            </li>
            <li class="@yield('riwayatSkematian')">
              <a href="{{ route('skematian.acc') }}">
                <i class="fa fa-dot-circle"></i> 
                Riwayat Pengajuan
              </a>
            </li>
          </ul>
        </li>

        <li class="treeview @yield('sk')">
          <a href="#">
            <i class="fa fa-file-contract"></i> <span>Data Surat Keterangan</span>
            @if($nSk > 0)
              <span class="pull-right-container">
                <small class="label pull-right bg-blue">{{$nSk}}</small>
              </span>
            @else
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            @endif
          </a>
          <ul class="treeview-menu">
            <li class="@yield('pengajuanSk')">
              <a href="{{ route('sk.index') }}">
                <i class="fa fa-dot-circle"></i> 
                Pengajuan
              </a>
            </li>
            <li class="@yield('riwayatSk')">
              <a href="{{ route('sk.acc') }}">
                <i class="fa fa-dot-circle"></i> 
                Riwayat Pengajuan
              </a>
            </li>
          </ul>
        </li>
        
        <li class="treeview @yield('sptjm')">
          <a href="#">
            <i class="fa fa-table"></i> <span>Data SPTJM</span>
            @if($nSptjm > 0)
              <span class="pull-right-container">
                <small class="label pull-right bg-blue">{{$nSptjm}}</small>
              </span>
            @else
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            @endif
          </a>
          <ul class="treeview-menu">
            <li class="@yield('pengajuanSptjm')">
              <a href="{{ route('sptjm.index') }}">
                <i class="fa fa-dot-circle"></i> 
                Pengajuan
              </a>
            </li>
            <li class="@yield('riwayatSptjm')">
              <a href="{{ route('sptjm.acc') }}">
                <i class="fa fa-dot-circle"></i> 
                Riwayat Pengajuan
              </a>
            </li>
          </ul>
        </li>

        <li class="treeview @yield('pengaduan')">
          <a href="#">
            <i class="fa fa-gavel"></i> <span>Data Pengaduan</span>
            @if($nPengaduan > 0)
              <span class="pull-right-container">
                <small class="label pull-right bg-blue">{{$nPengaduan}}</small>
              </span>
            @else
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            @endif
          </a>
          <ul class="treeview-menu">
            <li class="@yield('pengajuanPengaduan')">
              <a href="{{ route('pengaduan.index') }}">
                <i class="fa fa-dot-circle"></i> 
                Pengaduan
              </a>
            </li>
            <li class="@yield('riwayatPengaduan')">
              <a href="{{ route('pengaduan.acc') }}">
                <i class="fa fa-dot-circle"></i> 
                Riwayat Pengaduan
              </a>
            </li>
          </ul>
        </li>

        <li class="treeview @yield('regulasi')">
          <a href="#">
            <i class="fa fa-globe"></i><span>Regulasi Desa</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="@yield('peraturanDesa')">
              <a href="{{ route('admin.regulasi.edit','peraturan-desa') }}">
                <i class="fa fa-dot-circle"></i> 
                Peraturan Desa
              </a>
            </li>
            <li class="@yield('keuanganDesa')">
              <a href="{{ route('admin.regulasi.edit','keuangan-desa') }}">
                <i class="fa fa-dot-circle"></i> 
                Keuangan Desa
              </a>
            </li>
            <li class="@yield('kekayaanDesa')">
              <a href="{{ route('admin.regulasi.edit','kekayaan-desa') }}">
                <i class="fa fa-dot-circle"></i> 
                Kekayaan Desa
              </a>
            </li>
          </ul>
        </li>

        <li class="treeview @yield('lembaga')">
          <a href="#">
            <i class="fa fa-globe"></i><span>Lembaga Desa</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="@yield('pengurus-bpd')">
              <a href="{{ route('admin.regulasi.edit','pengurus-bpd') }}">
                <i class="fa fa-dot-circle"></i> 
                  Pengurus BPD
              </a>
            </li>
            <li class="@yield('pengurus-lpm')">
              <a href="{{ route('admin.regulasi.edit','pengurus-lpm') }}">
                <i class="fa fa-dot-circle"></i> 
                Pengurus LPM
              </a>
            </li>
            <li class="@yield('pengurus-pkk')">
              <a href="{{ route('admin.regulasi.edit','pengurus-pkk') }}">
                <i class="fa fa-dot-circle"></i> 
                Pengurus PKK
              </a>
            </li>
            <li class="@yield('karang-taruna')">
              <a href="{{ route('admin.regulasi.edit','karang-taruna') }}">
                <i class="fa fa-dot-circle"></i> 
                Karang Taruna
              </a>
            </li>
            <li class="@yield('rw-rt')">
              <a href="{{ route('admin.regulasi.edit','rw-rt') }}">
                <i class="fa fa-dot-circle"></i> 
                RW/RT
              </a>
            </li>
            <li class="@yield('kader-posyandu')">
              <a href="{{ route('admin.regulasi.edit','kader-posyandu') }}">
                <i class="fa fa-dot-circle"></i> 
                Kader Posyandu
              </a>
            </li>
            <li class="@yield('linmas')">
              <a href="{{ route('admin.regulasi.edit','linmas') }}">
                <i class="fa fa-dot-circle"></i> 
                Linmas
              </a>
            </li>
            <li class="@yield('mui-desa')">
              <a href="{{ route('admin.regulasi.edit','mui-desa') }}">
                <i class="fa fa-dot-circle"></i> 
                MUI Desa
              </a>
            </li>
            <li class="@yield('gapoktan')">
              <a href="{{ route('admin.regulasi.edit','gapoktan') }}">
                <i class="fa fa-dot-circle"></i> 
                Gapoktan
              </a>
            </li>
          </ul>
        </li>

         <li class="treeview @yield('blog')">
          <a href="#">
            <i class="fa fa-globe"></i><span>Pengaturan Blog</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="@yield('indexPost')">
              <a href="{{ route('blog.index') }}">
                <i class="fa fa-dot-circle"></i> 
                Daftar Postingan
              </a>
            </li>
            <li class="@yield('createPost')">
              <a href="{{ route('blog.create') }}">
                <i class="fa fa-dot-circle"></i> 
                Tambah Postingan
              </a>
            </li>
            <li class="@yield('kategori')">
              <a href="{{ route('kategori.index') }}">
                <i class="fa fa-dot-circle"></i> 
                Kategori Postingan
              </a>
            </li>
          </ul>
        </li>

        <li class="@yield('profesi')">
          <a href="{{ route('profesi.index') }}">
            <i class="fa fa-briefcase"></i>
            <span>Pengaturan Profesi</span>
          </a>
        </li>

        <li class="@yield('struktur')">
          <a href="{{ route('admin.struktur') }}">
            <i class="fa fa-network-wired"></i>
            <span>Struktur Organisasi</span>
          </a>
        </li>
        <li class="@yield('web')">
          <a href="{{ route('admin.web') }}">
            <i class="fa fa-cogs"></i>
            <span>Pengaturan Website</span>
          </a>
        </li>
        <li class="@yield('riwayat')">
          <a href="{{ route('riwayat') }}">
            <i class="fa fa-history"></i>
            <span>Riwayat Pengunjung</span>
          </a>
        </li>

      </ul>
    </section>
  </aside>

  <div class="content-wrapper">
    @yield('isi')
  </div>

  <footer class="main-footer">
    <strong>Copyright &copy; {{date('Y')}} Made with 
      <i class="fa fa-heart"></i> <a href="https://laravel.com"> Laravel</a>. Developed by 
      <a href="mailto:dekiakbar@linuxmail.org"> Deki</a>.
    </strong> 
    All rights reserved.
  </footer>

</div>

<script type="text/javascript" src="{{ secure_asset('js/app.js') }}"></script>
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>

@yield('ckUploadJS')

<script type="text/javascript">
  function getData(data){
    var url = ($(data).data('url')+'/'+$(data).children('option:selected').data('id'));
    window.location.assign(url);
  }
</script>

@yield('webJS')

<script type="text/javascript">
    $(function () {
        $('#l_bayi,#l_ibu,#p_ibu,#l_ayah,#p_ayah,#tl,#tl1,#tl2,#tl_anak,#l_pengaduan,#sktm_tl,#l_kematian,#l_kematian_pelapor,#w_kematian,#sk_tl').datetimepicker({
           format:'DD-MM-YYYY HH:mm:ss',
        });
    });
</script>

@yield('dashboardJS')

</body>
</html>
