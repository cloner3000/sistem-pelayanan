@extends('admin.admin')
@section('judul','Daftar Riwayat Surat Pernyataan Tanggung Jawab Mutlak')

@section('sptjm','active')
@section('riwayatSptjm','active')
@section('isi')
	<section class="content-header">
      <h1>
        Dashboard
        <small>Admin</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Daftar Surat Pernyataan Tanggung Jawab Mutlak</li>
      </ol>
    </section>

    <section class="content">

    	<div class="row">
    		<div class="col-xs-12">
    			<div class="box">

	            <div class="box-header">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<h4>Daftar Surat Pernyataan Tanggung Jawab Mutlak</h4>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<form class="navbar-form navbar-form pull-right">
								{{csrf_field()}}
								<div class="form-group">
									<label>Pilih Data :&nbsp;</label>
									<select name="export" class="form-control">
										@foreach($export as $x)
											<option value="{{$x->month.'-'.$x->year}}">{{bulan($x->month).' - '.$x->year}}</option>
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
						<th>NIK</th>
		                <th>Nama</th>
		                <th>Tempat/Tanggal lahir</th>
		                <th>Pekerjaan</th>
		                <th>Alamat</th>
		                <th>Status</th>
		                <th>Aksi</th>
	                </tr>
	                @foreach($datas as $data)
			            	<tr>
			                  	<td>{{++$no}}</td>
			                  	<td>{{$data->nik}}</td>
			                  	<td>{{$data->nama}}</td>
			                  	<td>{{$data->tempat}},{{$data->tanggal}}</td>
			                  	<td>{{$data->pekerjaan}}</td>
			                  	<td>{{$data->alamat}}</td>
			                  	<td>
			                  		<span class="label label-success">{{$data->status}}</span>
			                  	</td>
			                  	<td>
			                  		<a class="btn btn-xs btn-primary" href="{{ route('sptjm.show',$data->id) }}">
										<i class="fa fa-file-alt"></i>
										 PDF
									</a>
									<br>
									<a class="btn btn-xs btn-info" style="margin-top:10px;" data-toggle="modal" data-target="#{{md5($data->id.'sptjm')}}" >
										<i class="fa fa-edit"></i>
										 Edit
									</a>
									<br>									
									<a class="btn btn-xs btn-danger" onclick="event.preventDefault();document.getElementById('{{md5($data->id."hapus")}}').submit();" style="margin-top: 10px;">
					                    <i class="fa fa-trash"></i>
					                    Hapus
					                </a>

					                <form id="{{md5($data->id.'hapus')}}" action="{{ route('sptjm.destroy',$data->id) }}" method="POST" style="display: none;">
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
			<div class="modal fade" id="{{md5($d->id.'sptjm')}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			    <div class="modal-dialog modal-lg" role="document">
			        <div class="modal-content">
			            <div class="modal-header text-center">
			                <h4 class="modal-title w-100 font-weight-bold">Ubah Data Surat Permohonan sptjm
				                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				                    <span aria-hidden="true">&times;</span>
				                </button>
				            </h4>
			            </div>
			            <div class="modal-body mx-3">

				            <form method="POST" action="{{ route('sptjm.update',$d->id) }}">
								{{ csrf_field() }}
								<input type="hidden" name="_method" value="PATCH">
								
								<h5>NIK</h5>
				            	<div class="input-group">
				              		<span class="input-group-addon"><i class="fa fa-id-card"></i></span>
				              		<input name="nik" type="text" class="form-control" placeholder="" required value="{{$d->nik}}">
				            	</div>

								<h5>Nama</h5>
				            	<div class="input-group">
				              		<span class="input-group-addon"><i class="fa fa-user"></i></span>
				              		<input name="nama" type="text" class="form-control" placeholder="Nama" required value="{{$d->nama}}">
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

								<h5>Tempat Lahir</h5>
								<div class="input-group">
								  	<span class="input-group-addon"><i class="fa fa-map-marked-alt"></i></span>
								  	<input name="tempat" type="text" class="form-control" required value="{{$d->tempat}}">
								</div>

							    <h5>Tanggal Lahir</h5>
							    <div class="input-group">
							      	<span class="input-group-addon"><i class="fa fa-calendar-alt"></i></span>
							      	<input name="tanggal" type="text" id="tl" class="form-control" required value="{{date('d-m-Y', strtotime($d->tanggal))}}">
							    </div>

				            	<h5>Alamat</h5>
				            	<div class="input-group">

				              		<span class="input-group-addon"><i class="fa fa-address-card"></i></span>
				              		<input name="alamat" type="text" class="form-control" placeholder="" required value="{{$d->alamat}}">
				            	</div>

				            	<hr></hr>

				            	<h5>NIK</h5>
				            	<div class="input-group">
				              		<span class="input-group-addon"><i class="fa fa-id-card"></i></span>
				              		<input name="nik1" type="text" class="form-control" placeholder="" required value="{{$d->nik1}}">
				            	</div>

								<h5>Nama</h5>
				            	<div class="input-group">
				              		<span class="input-group-addon"><i class="fa fa-user"></i></span>
				              		<input name="nama1" type="text" class="form-control" placeholder="Nama" required value="{{$d->nama1}}">
				            	</div>

				            	<h5>Pekerjaan</h5>
								<div class="input-group">
								  	<span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
								  	<select class="form-control" name="pekerjaan1">
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

								<h5>Tempat Lahir</h5>
								<div class="input-group">
								  	<span class="input-group-addon"><i class="fa fa-map-marked-alt"></i></span>
								  	<input name="tempat1" type="text" class="form-control" required value="{{$d->tempat1}}">
								</div>

							    <h5>Tanggal Lahir</h5>
							    <div class="input-group">
							      	<span class="input-group-addon"><i class="fa fa-calendar-alt"></i></span>
							      	<input name="tanggal1" type="text" id="tl1" class="form-control" required value="{{date('d-m-Y', strtotime($d->tanggal1))}}">
							    </div>

				            	<h5>Alamat</h5>
				            	<div class="input-group">

				              		<span class="input-group-addon"><i class="fa fa-address-card"></i></span>
				              		<input name="alamat1" type="text" class="form-control" placeholder="" required value="{{$d->alamat1}}">
				            	</div>
								
								<hr></hr>

								<h5>NIK</h5>
				            	<div class="input-group">
				              		<span class="input-group-addon"><i class="fa fa-id-card"></i></span>
				              		<input name="nik2" type="text" class="form-control" placeholder="" required value="{{$d->nik2}}">
				            	</div>

								<h5>Nama</h5>
				            	<div class="input-group">
				              		<span class="input-group-addon"><i class="fa fa-user"></i></span>
				              		<input name="nama2" type="text" class="form-control" placeholder="Nama" required value="{{$d->nama2}}">
				            	</div>

				            	<h5>Pekerjaan</h5>
								<div class="input-group">
								  	<span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
								  	<select class="form-control" name="pekerjaan2">
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

								<h5>Tempat Lahir</h5>
								<div class="input-group">
								  	<span class="input-group-addon"><i class="fa fa-map-marked-alt"></i></span>
								  	<input name="tempat2" type="text" class="form-control" required value="{{$d->tempat2}}">
								</div>

							    <h5>Tanggal Lahir</h5>
							    <div class="input-group">
							      	<span class="input-group-addon"><i class="fa fa-calendar-alt"></i></span>
							      	<input name="tanggal2" type="text" id="tl2" class="form-control" required value="{{date('d-m-Y', strtotime($d->tanggal2))}}">
							    </div>

				            	<h5>Alamat</h5>
				            	<div class="input-group">

				              		<span class="input-group-addon"><i class="fa fa-address-card"></i></span>
				              		<input name="alamat2" type="text" class="form-control" placeholder="" required value="{{$d->alamat2}}">
				            	</div>

				            	<hr></hr>

				            	<h5>NIK</h5>
				            	<div class="input-group">
				              		<span class="input-group-addon"><i class="fa fa-id-card"></i></span>
				              		<input name="s1_nik" type="text" class="form-control" placeholder="" required value="{{$d->s1_nik}}">
				            	</div>

								<h5>Nama</h5>
				            	<div class="input-group">
				              		<span class="input-group-addon"><i class="fa fa-user"></i></span>
				              		<input name="s1_nama" type="text" class="form-control" placeholder="Nama" required value="{{$d->s1_nama}}">
				            	</div>

				            	<h5>NIK</h5>
				            	<div class="input-group">
				              		<span class="input-group-addon"><i class="fa fa-id-card"></i></span>
				              		<input name="s2_nik" type="text" class="form-control" placeholder="" required value="{{$d->s2_nik}}">
				            	</div>

								<h5>Nama</h5>
				            	<div class="input-group">
				              		<span class="input-group-addon"><i class="fa fa-user"></i></span>
				              		<input name="s2_nama" type="text" class="form-control" placeholder="Nama" required value="{{$d->s2_nama}}">
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