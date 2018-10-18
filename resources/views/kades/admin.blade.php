<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Kepala Desa | @yield('judul')</title>

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <a href="index2.html" class="logo">
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
                      <small>Kepala Desa Sejak {{Auth::user()->created_at}}</small>
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
{{--       <div class="user-panel">
        <div class="pull-left" style="color: white;">
          <p>{{Auth::user()->name}}</p>
        </div>
      </div> --}}
     
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU UTAMA</li>
        <li class="@yield('dashboard')">
          <a href="{{ route('kades.dashboard') }}">
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
              <a href="{{ route('kades.pengguna.create') }}"><i class="fa fa-dot-circle"></i>Tambah User</a>
            </li>
            <li class="@yield('daftarUser')">
              <a href="{{ route('kades.pengguna.index') }}"><i class="fa fa-dot-circle"></i>Daftar User</a>
            </li>
          </ul>
        </li>

        <li class="treeview @yield('spp')">
          <a href="#">
            <i class="fa fa-people-carry"></i>
            <span>Data Surat Pindah</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="@yield('pengajuanSpp')">
              <a href="{{ route('kades.spp.index') }}"><i class="fa fa-dot-circle"></i>Pengajuan</a>
            </li>
            <li class="@yield('riwayatSpp')">
              <a href="{{ route('kades.spp.indexAcc') }}"><i class="fa fa-dot-circle"></i>Riwayat Pengajuan</a>
            </li>
          </ul>
        </li>

        <li class="treeview @yield('ktp')">
          <a href="#">
            <i class="fa fa-id-card"></i> <span>Data Surat KTP</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="@yield('pengajuanKtp')">
              <a href="{{ route('kades.ktp.index') }}"><i class="fa fa-dot-circle"></i>Pengajuan</a>
            </li>
            <li class="@yield('riwayatKtp')">
              <a href="{{ route('kades.ktp.acc') }}"><i class="fa fa-dot-circle"></i>Riwayat Pengajuan</a>
            </li>
          </ul>
        </li>

        <li class="treeview @yield('skk')">
          <a href="#">
            <i class="fa fa-table"></i> <span>Data Surat Kelahiran</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="@yield('pengajuanSkk')">
              <a href="{{ route('kades.skk.index') }}">
                <i class="fa fa-dot-circle"></i> 
                Pengajuan
              </a>
            </li>
            <li class="@yield('riwayatSkk')">
              <a href="{{ route('kades.skk.acc') }}">
                <i class="fa fa-dot-circle"></i> 
                Riwayat Pengajuan
              </a>
            </li>
          </ul>
        </li>

        <li class="treeview @yield('sptjm')">
          <a href="#">
            <i class="fa fa-table"></i> <span>Data SPTJM</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="@yield('pengajuanSptjm')">
              <a href="{{ route('kades.sptjm.index') }}">
                <i class="fa fa-dot-circle"></i> 
                Pengajuan
              </a>
            </li>
            <li class="@yield('riwayatSptjm')">
              <a href="{{ route('kades.sptjm.acc') }}">
                <i class="fa fa-dot-circle"></i> 
                Riwayat Pengajuan
              </a>
            </li>
          </ul>
        </li>
        <li class="@yield('riwayat')">
          <a href="#">
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
    {{-- <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div> --}}
    <strong>Copyright &copy; {{date('Y')}} Made with <i class="fa fa-heart"></i>
      <a href="https://laravel.com">Laravel</a>.
    </strong> 
    All rights reserved.
  </footer>

</div>

<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
<script type="text/javascript">
    $(function () {
        $('#l_bayi,#l_ibu,#p_ibu,#l_ayah,#p_ayah,#tl,#tl1,#tl2').datetimepicker({
           format:'DD-MM-YYYY HH:mm:ss',
        });
    });

    var ctx = document.getElementById("areaChart");
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [
              "Januari", "Februari", "Maret", "April", "Mei", "Juni","Juli",
              "Agustus","September","Oktober","Nopember","Desember"
            ],
            datasets: [{
                label: 'Pengunjung Website',
                data: [@yield('dataBar')],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',

                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',

                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',

                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });

    var pieChartCanvas = document.getElementById("pieChart");
    data = {
        datasets: [{
            data: [@yield('data')],
            backgroundColor: [
              "#2ecc71",
              "#3498db",
              "#9b59b6",
              "#f1c40f",
              "#e74c3c",
              "#34495e"
            ],
        }],
        labels: [
            'Desktop',
            'Tab',
            'Mobile'
        ]
    };

    var options     = {
      //seting responsive pie chart
      maintainAspectRatio  : true,
    }

    //Gambar Pie Chart
    var myDoughnutChart = new Chart(pieChartCanvas, {
      type: 'pie',
      data: data,
      options: options
    });
</script>
</body>
</html>
