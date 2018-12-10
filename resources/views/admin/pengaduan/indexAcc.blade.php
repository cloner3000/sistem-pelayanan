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
		                <th>Tanggal Lahit</th>
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
			                  	<td>{{$data->tanggal_lahir}}</td>
			                  	<td>{{$data->pekerjaan}}</td>
			                  	<td>{{$data->alamat}}</td>
			                  	<td>{{$data->sasaran}}</td>
			                  	<td>
			                  		<span class="label label-success">{{$data->status}}</span>
			                  	</td>
			                  	<td>
			                  		{{-- <a class="btn btn-xs btn-primary" href="{{ route('pengaduan.show',$data->id) }}">
										<i class="fa fa-file-alt"></i>
										 PDF
									</a> --}}
									<a class="btn btn-xs btn-info" style="margin-top: 10px;" data-toggle="modal" data-target="#{{md5($data->id.'pengaduan')}}" >
										<i class="fa fa-edit"></i>
										 Edit
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

		@foreach($datas as $d)
			<div class="modal fade" id="{{md5($d->id.'pengaduan')}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			    <div class="modal-dialog" role="document">
			        <div class="modal-content">
			            <div class="modal-header text-center">
			                <h4 class="modal-title w-100 font-weight-bold">Ubah Data Surat Pengaduan</h4>
			                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			                    <span aria-hidden="true">&times;</span>
			                </button>
			            </div>
			            <div class="modal-body mx-3">

				            <form method="POST" action="{{ route('pengaduan.update',$d->id) }}">
								{{ csrf_field() }}
								<input type="hidden" name="_method" value="PATCH">
								
								<h5>NIK</h5>
				            	<div class="input-group">
				              		<span class="input-group-addon"><i class="fa fa-id-card"></i></span>
				              		<input name="nik" type="text" class="form-control" required value="{{$d->nik}}">
				            	</div>

								<h5>Nama</h5>
				            	<div class="input-group">
				              		<span class="input-group-addon"><i class="fa fa-user"></i></span>
				              		<input name="nama" type="text" class="form-control" required value="{{$d->nama}}">
				            	</div>
								
								<h5>Tanggal Lahir</h5>
								<div class="input-group">
								  	<span class="input-group-addon"><i class="fa fa-calendar-alt"></i></span>
								  	<input name="tanggal_lahir" type="text" id="l_pengaduan" class="form-control" required value="{{date('d-m-Y', strtotime($d->tanggal_lahir))}}">
								</div>

								<h5>Pekerjaan</h5>
								<div class="input-group">
								  	<span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
								  	<select class="form-control" name="pekerjaan">
								  		<option value="pns">Pegawai Negeri Sipil</option>
								  		<option value="wiraswasta">Wiraswasta</option>
								  		<option value="pelajar">Pelajar</option>
								  		<option value="mahasiswa">Mahasiswa</option>
								  		<option value="karyawan">Karyawan</option>
								  		<option value="programmer">Programmer</option>
								  		<option value="ibu rumah tangga">Ibu Rumah Tangga</option>
								  		<option value="lain-lain">Lain-Lain</option>
								  	</select>
								</div>
								
								<h5>Sasaran</h5>
				            	<div class="input-group">
				              		<span class="input-group-addon"><i class="fa fa-address-card"></i></span>
				              		<input name="sasaran" type="text" class="form-control" required value="{{$d->sasaran}}">
				            	</div>

				            	<h5>Alamat</h5>
				            	<div class="input-group">
				              		<span class="input-group-addon"><i class="fa fa-address-card"></i></span>
				              		<input name="alamat" type="text" class="form-control" required value="{{$d->alamat}}">
				            	</div>

				            	<h5>Pengaduan</h5>
				            	<div class="input-group">
				              		<span class="input-group-addon"><i class="fa fa-address-card"></i></span>
				              		<textarea name="isi" class="form-control" required>{{$d->isi}}</textarea>
				            	</div>

				            	<h5>Alternatif</h5>
				            	<div class="input-group">
				              		<span class="input-group-addon"><i class="fa fa-address-card"></i></span>
				              		<textarea name="alternatif" class="form-control" required >{{$d->alternatif}}</textarea>
				            	</div>

				            	<div class="modal-footer d-flex justify-content-center">
				               		<button type="submit" class="btn btn-primary">Simpan</button>
				              	</div>
							</form>

			            </div>
			        </div>
			    </div>
			</div>
    	@endforeach

    </section>
@endsection