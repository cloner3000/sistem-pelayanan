@extends('admin.admin')
@section('judul','Daftar Riwayat Surat Pengaduan Yang Telah Di Terima')

@section('pengaduan','active')
@section('riwayatPengaduan','active')
@section('isi')
	<section class="content-header">
      <h1>
        Dashboard
        <small>Admin</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Daftar Riwayat Surat Pengaduan Yang Telah Di Terima</li>
      </ol>
    </section>

    <section class="content">

    	<div class="row">
    		<div class="col-xs-12">
    			<div class="box">

	            <div class="box-header">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<h4>Daftar Riwayat Surat Pengaduan Yang Telah Di Terima</h4>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<form class="navbar-form navbar-form pull-right" method="post" action="{{ route('pengaduan.export') }}">
								{{csrf_field()}}
								<div class="form-group">
									<label>Pilih Data :&nbsp;</label>
									<select name="export" class="form-control">
										@foreach($export as $x)
											<option value="{{$x->month.'-'.$x->year}}">{{$x->year.' - '.bulan($x->month)}}</option>
										@endforeach
									</select>
									<button type="submit" class="btn btn-sm btn-info" style="margin-left: 5px;">Download</button>
								</div>
							</form>
						</div>
					</div>
	            </div>
	            <div class="box-body table-responsive no-padding">
	              <table class="table table-hover">
	                <tr>
						<th>No</th>
						<th>Nama</th>
		                <th>NIK</th>
		                <th>Tanggal Lahir</th>
		                <th>Pekerjaan</th>
		                <th>Alamat</th>
		                <th>Sasaran</th>
		                <th>Status</th>
		                <th>Aksi</th>
	                </tr>
	                @foreach($datas as $data)
			            	<tr>
								<td>{{++$no}}</td>
			                  	<td>{{$data->nama}}</td>
			                  	<td>{{$data->nik}}</td>
			                  	<td>{{date('d-m-Y',strtotime($data->tanggal))}}</td>
			                  	<td>{{$data->pekerjaan}}</td>
			                  	<td>{{$data->alamat}}</td>
			                  	<td>{{$data->sasaran}}</td>
			                  	<td>
			                  		<span class="label label-success">{{$data->status}}</span>
			                  	</td>
			                  	<td>
									<a href="{{ route('pengaduan.show',$data->id) }}" class="btn btn-xs btn-primary">
										<i class="fa fa-eye"></i>
										 Lihat
									</a>
									<br>
									<a class="btn btn-xs btn-danger" onclick="event.preventDefault();document.getElementById('{{md5($data->id."hapus")}}').submit();" style="margin-top: 10px;">
					                    <i class="fa fa-trash"></i>
					                    Hapus
					                </a>

					                <form id="{{md5($data->id.'hapus')}}" action="{{ route('pengaduan.destroy',$data->id) }}" method="POST" style="display: none;">
					                    {{ csrf_field() }}
					                    <input type="hidden" name="_method" value="DELETE">
					                </form>
			                  	</td>
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