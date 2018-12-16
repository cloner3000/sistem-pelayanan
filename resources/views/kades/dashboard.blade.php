@extends('kades.admin')
@section('judul','Dashboard')
@section('dashboard','active')

{{-- data pie chart pengunjung --}}
@section('data',$desktop.','.$tab.','.$mobile)

{{-- data riwayat pelayanan --}}
@section('dataBar',$hit)

@section('isi')
	<section class="content-header">
      <h1>
        Dashboard
        <small>Kepala Desa</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
    

    <section class="content">
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{$nKtp+$nPengaduan+$nSk+$nSkematian+$nSkk+$nSktm+$nSpp+$nSptjm+$acc}}</h3>

              <p>Pengajuan Pelayanan</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{$mobile+$tab+$desktop}}</h3>

              <p>Pengunjung</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{$acc}}</h3>

              <p>Pengajuan Diterima</p>
            </div>
            <div class="icon">
              <i class="ion ion-checkmark"></i>
            </div>
            <a href="#" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-purple">
            <div class="inner">
              <h3>{{$user->count()}}</h3>

              <p>Pengguna</p>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
            <a href="#" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
      <div class="row">
        <section class="col-lg-7 connectedSortable">
           <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Riwayat Pengunjung Per Bulan</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="chart">
                <canvas id="areaChart" style="height:250px"></canvas>
              </div>
            </div>
          </div>

        </section>
        <section class="col-lg-5 connectedSortable">

          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Riwayat Pengunjung</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
              
            </div>
            <div class="box-body">
              <canvas id="pieChart" style="height:250px"></canvas>
            </div>
          </div>

        </section>
      </div>

    </section>
@endsection

@section('dashboardJS')
  <script type="text/javascript">
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
      maintainAspectRatio  : true,
    };

    var myDoughnutChart = new Chart(pieChartCanvas, {
      type: 'pie',
      data: data,
      options: options
    });
  </script>
@endsection