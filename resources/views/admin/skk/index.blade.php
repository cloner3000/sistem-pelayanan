@extends('admin.admin')
@section('judul','Daftar Pengajuan Surat Keterangan Kelahiran')

@section('skk','active')
@section('pengajuanSkk','active')
@section('isi')
	<section class="content-header">
      <h1>
        Dashboard
        <small>Admin</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Daftar Pengajuan Surat Keterangan Kelahiran</li>
      </ol>
    </section>

    <section class="content">

    	<div class="row">
    		<div class="col-xs-12">
    			<div class="box">

	            <div class="box-header">
	              <h3 class="box-title">Daftar Pengajuan Surat Keterangan Kelahiran</h3>

	              {{-- <div class="box-tools">
	                <div class="input-group input-group-sm" style="width: 150px;">
	                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

	                  <div class="input-group-btn">
	                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
	                  </div>
	                </div>
	              </div> --}}
	            </div>
	            <!-- /.box-header -->
	            <div class="box-body table-responsive no-padding">
	              <table class="table table-hover">
	                <tr>
						<th>No</th>
		                <th>Nama</th>
		                <th>Tempat Tanggal Lahir</th>
		                <th>Nama Ibu</th>
		                <th>Nama Ayah</th>
		                <th>Jenis Kelamin</th>
		                <th>Kelahiran Ke</th>
		                <th>Status</th>
		                <th>Aksi</th>
	                </tr>
	                @foreach($datas as $data)
			            	<tr>
			                  	<td>{{++$no}}</td>
			                  	<td>{{$data->b_nama}}</td>
			                  	<td>{{$data->b_tempat}}, {{$data->b_tanggal}}</td> 
			                  	<td>{{$data->a_nama}}</td>
			                  	<td>{{$data->i_nama}}</td>
			                  	<td>{{$data->b_jenis_kelamin}}</td>
			                  	<td>{{$data->b_kelahiran_ke}}</td>
			                  	<td>
			                  		<span class="label label-warning">{{$data->status}}</span>
			                  	</td>
			                  	<td>
									<a class="btn btn-xs btn-info" data-toggle="modal" data-target="#{{md5($data->id.'skk')}}" >
										<i class="fa fa-edit"></i>
										Edit
									</a>
									<br>
									<a class="btn btn-xs btn-success" onclick="event.preventDefault();document.getElementById('{{md5($data->id."acc")}}').submit();" style="margin-top: 10px;">
					                    <i class="fa fa-check"></i>
					                    Acc
					                </a>

					                <form id="{{md5($data->id.'acc')}}" action="{{ route('skk.acc') }}" method="POST" style="display: none;">
					                    {{ csrf_field() }}
					                    <input type="hidden" name="id" value="{{$data->id}}">
					                </form>
									<br>
									<a class="btn btn-xs btn-danger" onclick="event.preventDefault();document.getElementById('{{md5($data->id."hapus")}}').submit();" style="margin-top: 10px;">
					                    <i class="fa fa-trash"></i>
					                    Hapus
					                    </a>

					                    <form id="{{md5($data->id.'hapus')}}" action="{{ route('skk.destroy',$data->id) }}" method="POST" style="display: none;">
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
			<div class="modal fade" id="{{md5($d->id.'skk')}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			    <div class="modal-dialog modal-lg" role="document">
			        <div class="modal-content">
			            <div class="modal-header text-center">
			                <h4 class="modal-title w-100 font-weight-bold">Ubah Data Surat Keterangan Kelahiran</h4>
			                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			                    <span aria-hidden="true">&times;</span>
			                </button>
			            </div>
			            <div class="modal-body">

				            <form method="POST" action="{{ route('skk.update',$d->id) }}">
								{{ csrf_field() }}
								<input type="hidden" name="_method" value="PATCH">
								
								<div class="panel panel-info">
						            <div class="panel-heading"><strong>BAYI</strong></div>
						            <div class="panel-body">
						                <div class="row">
						                	<div class="col-md-6">
						                		<h5>Nama</h5>
								            	<div class="input-group">
								              		<span class="input-group-addon"><i class="fa fa-user"></i></span>
								              		<input name="b_nama" type="text" class="form-control" required value="{{$d->b_nama}}">
								            	</div>

								            	<h5>Jenis Kelamin</h5>
								            	<div class="input-group">
								              		<span class="input-group-addon"><i class="fa fa-user"></i></span>
								              		<input name="b_jenis_kelamin" type="text" class="form-control" required value="{{$d->b_jenis_kelamin}}">
								            	</div>

								            	<h5>Tempat Lahir</h5>
								            	<div class="input-group">
								              		<span class="input-group-addon"><i class="fa fa-user"></i></span>
								              		<input name="b_tempat" type="text" class="form-control" required value="{{$d->b_tempat}}">
								            	</div>

								            	<h5>Tanggal Lahir</h5>
								            	<div class="input-group">
								              		<span class="input-group-addon"><i class="fa fa-calendar-alt"></i></span>
								              		<input name="b_tanggal" type="text" class="form-control" required value="{{$d->b_tanggal}}">
								            	</div>
						                	</div>
						                	<div class="col-md-6">
						                		<h5>Jenis Kelahiran</h5>
								            	<div class="input-group">
								              		<span class="input-group-addon"><i class="fa fa-user"></i></span>
								              		<input name="b_jenis_kelahiran" type="text" class="form-control" required value="{{$d->b_jenis_kelahiran}}">
								            	</div>

								            	<h5>Kelahiran Ke</h5>
								            	<div class="input-group">
								              		<span class="input-group-addon"><i class="fa fa-user"></i></span>
								              		<input name="b_kelahiran_ke" type="text" class="form-control" required value="{{$d->b_kelahiran_ke}}">
								            	</div>

								            	<h5>Berat</h5>
								            	<div class="input-group">
								              		<span class="input-group-addon"><i class="fa fa-user"></i></span>
								              		<input name="b_berat" type="text" class="form-control" required value="{{$d->b_berat}}">
								            	</div>

								            	<h5>Panjang</h5>
								            	<div class="input-group">
								              		<span class="input-group-addon"><i class="fa fa-user"></i></span>
								              		<input name="b_panjang" type="text" class="form-control" required value="{{$d->b_panjang}}">
								            	</div>
						                	</div>
						              	</div>
						            </div>
					            </div>

					            <div class="panel panel-primary">
						            <div class="panel-heading"><strong>IBU</strong></div>
						            <div class="panel-body">
						                <div class="row">
						                	<div class="col-md-6">
						                		<h5>NIK</h5>
								            	<div class="input-group">
								              		<span class="input-group-addon"><i class="fa fa-id-card"></i></span>
								              		<input name="i_nik" type="text" class="form-control" required value="{{$d->i_nik}}">
								            	</div>

								            	<h5>Nama</h5>
								            	<div class="input-group">
								              		<span class="input-group-addon"><i class="fa fa-user"></i></span>
								              		<input name="i_nama" type="text" class="form-control" required value="{{$d->i_nama}}">
								            	</div>

								            	<h5>Tanggal Lahir</h5>
								            	<div class="input-group">
								              		<span class="input-group-addon"><i class="fa fa-calendar-alt"></i></span>
								              		<input name="i_tanggal_lahir" type="text" class="form-control" required value="{{$d->i_tanggal_lahir}}">
								            	</div>

								            	<h5>Pekerjaan</h5>
								            	<div class="input-group">
								              		<span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
								              		<input name="i_pekerjaan" type="text" class="form-control" required value="{{$d->i_pekerjaan}}">
								            	</div>
						                	</div>
						                	<div class="col-md-6">
						                		<h5>Alamat</h5>
								            	<div class="input-group">
								              		<span class="input-group-addon"><i class="fa fa-map-signs"></i></span>
								              		<input name="i_alamat" type="text" class="form-control" required value="{{$d->i_alamat}}">
								            	</div>

								            	<h5>Kewarganegaraan</h5>
								            	<div class="input-group">
								              		<span class="input-group-addon"><i class="fa fa-user"></i></span>
								              		<input name="i_kewarganegaraan" type="text" class="form-control" required value="{{$d->i_kewarganegaraan}}">
								            	</div>

								            	<h5>Kebangsaan</h5>
								            	<div class="input-group">
								              		<span class="input-group-addon"><i class="fa fa-user"></i></span>
								              		<input name="i_kebangsaan" type="text" class="form-control" required value="{{$d->i_kebangsaan}}">
								            	</div>

								            	<h5>Tanggal Pernikahan</h5>
								            	<div class="input-group">
								              		<span class="input-group-addon"><i class="fa fa-user"></i></span>
								              		<input name="i_tanggal_perkawinan" type="text" class="form-control" required value="{{$d->i_tanggal_perkawinan}}">
								            	</div>
						                	</div>
						              	</div>
						            </div>
					            </div>

					            <div class="panel panel-success">
						            <div class="panel-heading"><strong>AYAH</strong></div>
						            <div class="panel-body">
						                <div class="row">
						                	<div class="col-md-6">
						                		<h5>NIK</h5>
								            	<div class="input-group">
								              		<span class="input-group-addon"><i class="fa fa-id-card"></i></span>
								              		<input name="a_nik" type="text" class="form-control" required value="{{$d->a_nik}}">
								            	</div>

								            	<h5>Nama</h5>
								            	<div class="input-group">
								              		<span class="input-group-addon"><i class="fa fa-user"></i></span>
								              		<input name="a_nama" type="text" class="form-control" required value="{{$d->a_nama}}">
								            	</div>

								            	<h5>Tanggal Lahir</h5>
								            	<div class="input-group">
								              		<span class="input-group-addon"><i class="fa fa-calendar-alt"></i></span>
								              		<input name="a_tanggal_lahir" type="text" class="form-control" required value="{{$d->a_tanggal_lahir}}">
								            	</div>

								            	<h5>Pekerjaan</h5>
								            	<div class="input-group">
								              		<span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
								              		<input name="a_pekerjaan" type="text" class="form-control" required value="{{$d->a_pekerjaan}}">
								            	</div>
						                	</div>
						                	<div class="col-md-6">
						                		<h5>Alamat</h5>
								            	<div class="input-group">
								              		<span class="input-group-addon"><i class="fa fa-map-signs"></i></span>
								              		<input name="a_alamat" type="text" class="form-control" required value="{{$d->a_alamat}}">
								            	</div>

								            	<h5>Kewarganegaraan</h5>
								            	<div class="input-group">
								              		<span class="input-group-addon"><i class="fa fa-user"></i></span>
								              		<input name="a_kewarganegaraan" type="text" class="form-control" required value="{{$d->a_kewarganegaraan}}">
								            	</div>

								            	<h5>Kebangsaan</h5>
								            	<div class="input-group">
								              		<span class="input-group-addon"><i class="fa fa-user"></i></span>
								              		<input name="a_kebangsaan" type="text" class="form-control" required value="{{$d->a_kebangsaan}}">
								            	</div>

								            	<h5>Tanggal Pernikahan</h5>
								            	<div class="input-group">
								              		<span class="input-group-addon"><i class="fa fa-user"></i></span>
								              		<input name="a_tanggal_perkawinan" type="text" class="form-control" required value="{{$d->a_tanggal_perkawinan}}">
								            	</div>
						                	</div>
						              	</div>
						            </div>
					            </div>

					            <div class="panel panel-info">
						            <div class="panel-heading"><strong>PELAPOR</strong></div>
						            <div class="panel-body">
						                <div class="row">
						                	<div class="col-md-6">
						                		<h5>NIK</h5>
								            	<div class="input-group">
								              		<span class="input-group-addon"><i class="fa fa-id-card"></i></span>
								              		<input name="p_nik" type="text" class="form-control" required value="{{$d->p_nik}}">
								            	</div>

								            	<h5>Nama</h5>
								            	<div class="input-group">
								              		<span class="input-group-addon"><i class="fa fa-user"></i></span>
								              		<input name="p_nama" type="text" class="form-control" required value="{{$d->p_nama}}">
								            	</div>

								            	<h5>Umur</h5>
								            	<div class="input-group">
								              		<span class="input-group-addon"><i class="fa fa-user"></i></span>
								              		<input name="p_umur" type="text" class="form-control" required value="{{$d->p_umur}}">
								            	</div>
						                	</div>
						                	<div class="col-md-6">
						                		<h5>Jenis Kelamin</h5>
								            	<div class="input-group">
								              		<span class="input-group-addon"><i class="fa fa-user"></i></span>
								              		<input name="p_jenis_kelamin" type="text" class="form-control" required value="{{$d->p_jenis_kelamin}}">
								            	</div>

								            	<h5>Pekerjaan</h5>
								            	<div class="input-group">
								              		<span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
								              		<input name="p_pekerjaan" type="text" class="form-control" required value="{{$d->p_pekerjaan}}">
								            	</div>

								            	<h5>Alamat</h5>
								            	<div class="input-group">
								              		<span class="input-group-addon"><i class="fa fa-map-signs"></i></span>
								              		<input name="p_alamat" type="text" class="form-control" required value="{{$d->p_alamat}}">
								            	</div>
						                	</div>
						              	</div>
						            </div>
					            </div>

					            <div class="panel panel-primary">
						            <div class="panel-heading"><strong>SAKSI I</strong></div>
						            <div class="panel-body">
						                <div class="row">
						                	<div class="col-md-6">
						                		<h5>NIK</h5>
								            	<div class="input-group">
								              		<span class="input-group-addon"><i class="fa fa-id-card"></i></span>
								              		<input name="s1_nik" type="text" class="form-control" required value="{{$d->s1_nik}}">
								            	</div>

								            	<h5>Nama</h5>
								            	<div class="input-group">
								              		<span class="input-group-addon"><i class="fa fa-user"></i></span>
								              		<input name="s1_nama" type="text" class="form-control" required value="{{$d->s1_nama}}">
								            	</div>

								            	<h5>Umur</h5>
								            	<div class="input-group">
								              		<span class="input-group-addon"><i class="fa fa-user"></i></span>
								              		<input name="s1_umur" type="text" class="form-control" required value="{{$d->s1_umur}}">
								            	</div>
						                	</div>
						                	<div class="col-md-6">

								            	<h5>Pekerjaan</h5>
								            	<div class="input-group">
								              		<span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
								              		<input name="s1_pekerjaan" type="text" class="form-control" required value="{{$d->s1_pekerjaan}}">
								            	</div>

								            	<h5>Alamat</h5>
								            	<div class="input-group">
								              		<span class="input-group-addon"><i class="fa fa-map-signs"></i></span>
								              		<input name="s1_alamat" type="text" class="form-control" required value="{{$d->s1_alamat}}">
								            	</div>
						                	</div>
						              	</div>
						            </div>
					            </div>

					            <div class="panel panel-success">
						            <div class="panel-heading"><strong>SAKSI II</strong></div>
						            <div class="panel-body">
						                <div class="row">
						                	<div class="col-md-6">
						                		<h5>NIK</h5>
								            	<div class="input-group">
								              		<span class="input-group-addon"><i class="fa fa-id-card"></i></span>
								              		<input name="s2_nik" type="text" class="form-control" required value="{{$d->s2_nik}}">
								            	</div>

								            	<h5>Nama</h5>
								            	<div class="input-group">
								              		<span class="input-group-addon"><i class="fa fa-user"></i></span>
								              		<input name="s2_nama" type="text" class="form-control" required value="{{$d->s2_nama}}">
								            	</div>

								            	<h5>Umur</h5>
								            	<div class="input-group">
								              		<span class="input-group-addon"><i class="fa fa-user"></i></span>
								              		<input name="s2_umur" type="text" class="form-control" required value="{{$d->s2_umur}}">
								            	</div>
						                	</div>
						                	<div class="col-md-6">

								            	<h5>Pekerjaan</h5>
								            	<div class="input-group">
								              		<span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
								              		<input name="s2_pekerjaan" type="text" class="form-control" required value="{{$d->s2_pekerjaan}}">
								            	</div>

								            	<h5>Alamat</h5>
								            	<div class="input-group">
								              		<span class="input-group-addon"><i class="fa fa-map-signs"></i></span>
								              		<input name="s2_alamat" type="text" class="form-control" required value="{{$d->s2_alamat}}">
								            	</div>
						                	</div>
						              	</div>
						            </div>
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