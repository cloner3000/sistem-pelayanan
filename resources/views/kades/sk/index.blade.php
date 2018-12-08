@extends('kades.admin')
@section('judul','Daftar Pengajuan Surat Keterangan')

@section('sk','active')
@section('pengajuanSk','active')
@section('isi')
	<section class="content-header">
      <h1>
        Dashboard
        <small>Kepala Desa</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('kades.dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Daftar Pengajuan Surat Keterangan</li>
      </ol>
    </section>

    <section class="content">

    	<div class="row">
    		<div class="col-xs-12">
    			<div class="box">

	            <div class="box-header">
	              <h3 class="box-title">Daftar Pengajuan Surat Keterangan</h3>
	            </div>
	            <div class="box-body table-responsive no-padding">
	              <table class="table table-hover">
	                <tr>
						<th>No</th>
			            <th>Nama</th>
			            <th>NIK</th>
			            <th>Tempat Tanggal Lahir</th>
			            <th>Jenis Kelamin</th>
			            <th>Tujuan</th>
			            <th>Keterangan</th>
			            <th>Status</th>
			            <th>Aksi</th>
	                </tr>
	                @foreach($datas as $data)
			            	<tr>
			                  	<td>{{++$no}}</td>
				                <td>{{$data->nama}}</td>
				                <td>{{$data->nik}}</td>
				                <td>{{$data->tempat}}, {{$data->tanggal}}</td> 
				                <td>{{$data->jenis_kelamin}}</td>
				                <td>{{$data->keperluan}}</td>
				                <td>{{$data->keterangan}}</td>
			                  	<td>
			                  		<span class="label label-warning">{{$data->status}}</span>
			                  	</td>
			                  	<td>
									<a class="btn btn-xs btn-info" data-toggle="modal" data-target="#{{md5($data->id.'sk')}}" >
										<i class="fa fa-edit"></i>
										Edit
									</a>
									<br>
									<a class="btn btn-xs btn-success" onclick="event.preventDefault();document.getElementById('{{md5($data->id."acc")}}').submit();" style="margin-top: 10px;">
					                    <i class="fa fa-check"></i>
					                    Acc
					                </a>

					                <form id="{{md5($data->id.'acc')}}" action="{{ route('kades.sk.acc') }}" method="POST" style="display: none;">
					                    {{ csrf_field() }}
					                    <input type="hidden" name="id" value="{{$data->id}}">
					                </form>
									<br>
									<a class="btn btn-xs btn-danger" onclick="event.preventDefault();document.getElementById('{{md5($data->id."hapus")}}').submit();" style="margin-top: 10px;">
					                    <i class="fa fa-trash"></i>
					                    Hapus
					                    </a>

					                    <form id="{{md5($data->id.'hapus')}}" action="{{ route('kades.sk.destroy',$data->id) }}" method="POST" style="display: none;">
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
			<div class="modal fade" id="{{md5($d->id.'sk')}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			    <div class="modal-dialog modal-lg" role="document">
			        <div class="modal-content">
			            <div class="modal-header text-center">
			                <h4 class="modal-title w-100 font-weight-bold">
			                	Ubah Data Surat Keterangan
				                <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close">
				                    <span aria-hidden="true">&times;</span>
				                </button>
			                </h4>
			            </div>
			            <div class="modal-body">

				            <form method="POST" action="{{ route('kades.sk.update',$d->id) }}">
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
				              		<input name="nama" type="text" class="form-control"  required value="{{$d->nama}}">
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

								<h5>Jenis Kelamin</h5>
								<div class="input-group">
								  	<span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
								  	<select class="form-control" name="jenis_kelamin">
								  		<option value="laki-laki">Laki-laki</option>
								  		<option value="perempuan">Perempuan</option>
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
							      	<input name="tanggal" type="text" id="sk_tl" class="form-control" required value="{{date('d-m-Y', strtotime($d->tanggal))}}">
							    </div>

							    <h5>Agama</h5>
				            	<div class="input-group">

				              		<span class="input-group-addon"><i class="fa fa-address-card"></i></span>
				              		<input name="agama" type="text" class="form-control" required value="{{$d->agama}}">
				            	</div>

				            	<h5>Alamat</h5>
				            	<div class="input-group">

				              		<span class="input-group-addon"><i class="fa fa-address-card"></i></span>
				              		<input name="alamat" type="text" class="form-control" required value="{{$d->alamat}}">
				            	</div>

				            	<h5>Kewarganegaraan</h5>
				            	<div class="input-group">
				              		<span class="input-group-addon"><i class="fa fa-flag"></i></span>
				              		<input name="kewarganegaraan" type="text" class="form-control" required value="{{$d->kewarganegaraan}}">
				            	</div>

				            	<h5>Tujuan</h5>
				            	<div class="input-group">
				              		<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
				              		<input name="keperluan" type="text" class="form-control" required value="{{$d->keperluan}}">
				            	</div>

				            	<h5>Keterangan</h5>
				            	<div class="input-group">
				              		<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
				              		<input name="keterangan" type="text" class="form-control" required value="{{$d->keterangan}}">
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