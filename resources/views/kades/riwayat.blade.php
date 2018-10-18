@extends('admin.admin')
@section('judul','Daftar Riwayat Pengunjung Website')

@section('riwayat','active')
@section('isi')
	<section class="content-header">
      <h1>
        Dashboard
        <small>Admin</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Daftar Riwayat Pengunjung Website</li>
      </ol>
    </section>

    <section class="content">

    	<div class="row">
    		<div class="col-xs-12">
    			<div class="box">

	            <div class="box-header">
	              	<div class="row">
	              	<div class="col-md-8">
	              		<div class="pull-left">
	              			<h3>Daftar Riwayat Pengunjung Website</h3>
	              		</div>
	              	</div>
	              		
		        	<div class="col-md-4">
		        		<div class="pull-right">
			                <a class="btn btn-sm btn-danger" onclick="event.preventDefault();document.getElementById('hapus').submit();" style="margin-top: 10px;">
							    <i class="fa fa-trash"></i>
							    Hapus Riwayat
							</a>

							<form id="hapus" action="{{ route('hapus_riwayat') }}" method="POST" style="display: none;">
							    {{ csrf_field() }}
							</form>
		                </div>
		        	</div>
	              	</div>
	            </div>
	            <!-- /.box-header -->
	            <div class="box-body table-responsive no-padding">
	              <table class="table table-hover">
	                <tr>
						<th>No</th>
						<th>User</th>
		                <th>Browser</th>
		                <th>OS</th>
		                <th>Platform</th>
	                </tr>
	                @foreach($datas as $data)
			            	<tr>
			                  	<td>{{++$no}}</td>
			                  	<td>{{$data->users}}</td>
			                  	<td>{{$data->browsers}}</td>
			                  	<td>{{$data->oses}}</td>
			                  	<td>{{$data->platform}}</td>
			                </tr>
	                @endforeach
	              </table>
	              <div class="pull-right">
	              	{!! $datas->render('vendor.pagination.default') !!}
	              </div>
	            </div>

	          </div>

    		</div>
    	</div>
    </section>
@endsection