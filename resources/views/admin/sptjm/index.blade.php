@extends('admin.admin')
@section('judul','Daftar Surat Pernyataan Tanggung Jawab Mutlak')

@section('sptjm','active')
@section('pengajuanSptjm','active')
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
	              <h3 class="box-title">Daftar Surat Pernyataan Tanggung Jawab Mutlak</h3>
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
			                  	<td>{{$data->tempat}},{{date('d-m-Y',strtotime($data->tanggal))}}</td>
			                  	<td>{{ucfirst($data->pekerjaan)}}</td>
			                  	<td>{{$data->alamat}}</td>
			                  	<td>
			                  		<span class="label label-warning">{{$data->status}}</span>
			                  	</td>
			                  	<td>
									<a class="btn btn-xs btn-info" data-toggle="modal" data-target="#{{md5($data->id.'sptjm')}}" >
										<i class="fa fa-edit"></i>
										Edit
									</a>
									<br>
									<a class="btn btn-xs btn-success" onclick="event.preventDefault();document.getElementById('{{md5($data->id."acc")}}').submit();" style="margin-top: 10px;">
					                    <i class="fa fa-check"></i>
					                    Acc
					                </a>

					                <form id="{{md5($data->id.'acc')}}" action="{{ route('sptjm.acc') }}" method="POST" style="display: none;">
					                    {{ csrf_field() }}
					                    <input type="hidden" name="id" value="{{$data->id}}">
					                </form>
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
								
								<h5>No Kartu kelarga</h5>
				            	<div class="input-group">
				              		<span class="input-group-addon"><i class="fa fa-id-card"></i></span>
				              		<input name="no_kk" type="text" class="form-control" placeholder="" required value="{{$d->nik}}">
				            	</div>

								<h5>NIK Pelapor</h5>
				            	<div class="input-group">
				              		<span class="input-group-addon"><i class="fa fa-id-card"></i></span>
				              		<input name="nik" type="text" class="form-control" placeholder="" required value="{{$d->nik}}">
				            	</div>

								<h5>Nama Pelapor</h5>
				            	<div class="input-group">
				              		<span class="input-group-addon"><i class="fa fa-user"></i></span>
				              		<input name="nama" type="text" class="form-control" placeholder="Nama" required value="{{$d->nama}}">
				            	</div>

				            	<h5>Pekerjaan Pelapor</h5>
								<div class="input-group">
								  	<span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
								  	<select class="form-control" name="pekerjaan">
								  		@foreach($ps as $p)
								  			@if($p->slug == $d->pekerjaan)
												<option value="{{$p->slug}}" selected>{{$p->nama}}</option>
								  			@else
												<option value="{{$p->slug}}">{{$p->nama}}</option>
								  			@endif
								  		@endforeach
								  	</select>
								</div>

								<h5>Tempat Lahir Pelapor</h5>
								<div class="input-group">
								  	<span class="input-group-addon"><i class="fa fa-map-marked-alt"></i></span>
								  	<input name="tempat" type="text" class="form-control" required value="{{$d->tempat}}">
								</div>

							    <h5>Tanggal Lahir Pelapor</h5>
							    <div class="input-group">
							      	<span class="input-group-addon"><i class="fa fa-calendar-alt"></i></span>
							      	<input name="tanggal" type="text" id="tl" class="form-control" required value="{{date('d-m-Y', strtotime($d->tanggal))}}">
							    </div>

				            	<h5>Alamat Pelapor</h5>
				            	<div class="input-group">

				              		<span class="input-group-addon"><i class="fa fa-address-card"></i></span>
				              		<input name="alamat" type="text" class="form-control" placeholder="" required value="{{$d->alamat}}">
				            	</div>

				            	<hr></hr>

				            	<h5>NIK Pihak Pertama</h5>
				            	<div class="input-group">
				              		<span class="input-group-addon"><i class="fa fa-id-card"></i></span>
				              		<input name="nik1" type="text" class="form-control" placeholder="" required value="{{$d->nik1}}">
				            	</div>

								<h5>Nama Pihak Pertama</h5>
				            	<div class="input-group">
				              		<span class="input-group-addon"><i class="fa fa-user"></i></span>
				              		<input name="nama1" type="text" class="form-control" placeholder="Nama" required value="{{$d->nama1}}">
				            	</div>

				            	<h5>Pekerjaan Pihak Pertama</h5>
								<div class="input-group">
								  	<span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
								  	<select class="form-control" name="pekerjaan1">
								  		@foreach($ps as $p)
								  			@if($p->slug == $d->pekerjaan1)
												<option value="{{$p->slug}}" selected>{{$p->nama}}</option>
								  			@else
												<option value="{{$p->slug}}">{{$p->nama}}</option>
								  			@endif
								  		@endforeach
								  	</select>
								</div>

								<h5>Tempat Lahir Pihak Pertama</h5>
								<div class="input-group">
								  	<span class="input-group-addon"><i class="fa fa-map-marked-alt"></i></span>
								  	<input name="tempat1" type="text" class="form-control" required value="{{$d->tempat1}}">
								</div>

							    <h5>Tanggal Lahir Pihak Pertama</h5>
							    <div class="input-group">
							      	<span class="input-group-addon"><i class="fa fa-calendar-alt"></i></span>
							      	<input name="tanggal1" type="text" id="tl1" class="form-control" required value="{{date('d-m-Y', strtotime($d->tanggal1))}}">
							    </div>

				            	<h5>Alamat Pihak Pertama</h5>
				            	<div class="input-group">

				              		<span class="input-group-addon"><i class="fa fa-address-card"></i></span>
				              		<input name="alamat1" type="text" class="form-control" placeholder="" required value="{{$d->alamat1}}">
				            	</div>
								
								<hr></hr>
								
								<h5>Hubungan Pihak Pertama Dengan Pihak Kedua</h5>
								<div class="input-group">
								  	<span class="input-group-addon"><i class="fa fa-network-wired"></i></span>
								  	<select class="form-control" name="hubungan">
								  		@if($d->hubungan == 'suami')
								  			<option value="suami" selected>Suami</option>
								  			<option value="istri">Istri</option>
								  		@elseif($d->hubungan == 'istri')
								  			<option value="istri" selected>Istri</option>
								  			<option value="suami">Suami</option>
								  		@endif
								  	</select>
								</div>
								
								<hr></hr>

								<h5>NIK Pihak Kedua</h5>
				            	<div class="input-group">
				              		<span class="input-group-addon"><i class="fa fa-id-card"></i></span>
				              		<input name="nik2" type="text" class="form-control" placeholder="" required value="{{$d->nik2}}">
				            	</div>

								<h5>Nama Pihak Kedua</h5>
				            	<div class="input-group">
				              		<span class="input-group-addon"><i class="fa fa-user"></i></span>
				              		<input name="nama2" type="text" class="form-control" placeholder="Nama" required value="{{$d->nama2}}">
				            	</div>

				            	<h5>Pekerjaan Pihak Kedua</h5>
								<div class="input-group">
								  	<span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
								  	<select class="form-control" name="pekerjaan2">
								  		@foreach($ps as $p)
								  			@if($p->slug == $d->pekerjaan2)
												<option value="{{$p->slug}}" selected>{{$p->nama}}</option>
								  			@else
												<option value="{{$p->slug}}">{{$p->nama}}</option>
								  			@endif
								  		@endforeach
								  	</select>
								</div>

								<h5>Tempat Lahir Pihak Kedua</h5>
								<div class="input-group">
								  	<span class="input-group-addon"><i class="fa fa-map-marked-alt"></i></span>
								  	<input name="tempat2" type="text" class="form-control" required value="{{$d->tempat2}}">
								</div>

							    <h5>Tanggal Lahir Pihak Kedua</h5>
							    <div class="input-group">
							      	<span class="input-group-addon"><i class="fa fa-calendar-alt"></i></span>
							      	<input name="tanggal2" type="text" id="tl2" class="form-control" required value="{{date('d-m-Y', strtotime($d->tanggal2))}}">
							    </div>

				            	<h5>Alamat Pihak Kedua</h5>
				            	<div class="input-group">

				              		<span class="input-group-addon"><i class="fa fa-address-card"></i></span>
				              		<input name="alamat2" type="text" class="form-control" placeholder="" required value="{{$d->alamat2}}">
				            	</div>

				            	<hr></hr>
								
								<h5>Nama Anak</h5>
				            	<div class="input-group">
				              		<span class="input-group-addon"><i class="fa fa-user"></i></span>
				              		<input name="nama_anak" type="text" class="form-control" placeholder="Nama" value="{{$d->nama_anak}}">
				            	</div>

				            	<h5>Pekerjaan Anak</h5>
								<div class="input-group">
								  	<span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
								  	<select class="form-control" name="pekerjaan_anak">
								  		@foreach($ps as $p)
								  			@if($p->slug == $d->pekerjaan_anak)
												<option value="{{$p->slug}}" selected>{{$p->nama}}</option>
								  			@else
												<option value="{{$p->slug}}">{{$p->nama}}</option>
								  			@endif
								  		@endforeach
								  	</select>
								</div>

								<h5>Tempat Lahir Anak</h5>
								<div class="input-group">
								  	<span class="input-group-addon"><i class="fa fa-map-marked-alt"></i></span>
								  	<input name="tempat_anak" type="text" class="form-control" value="{{$d->tempat_anak}}">
								</div>

							    <h5>Tanggal Lahir Anak</h5>
							    <div class="input-group">
							      	<span class="input-group-addon"><i class="fa fa-calendar-alt"></i></span>
							      	<input name="tanggal_anak" type="text" id="tl_anak" class="form-control" value="{{date('d-m-Y', strtotime($d->tanggal_anak))}}">
							    </div>

				            	<h5>Alamat Anak</h5>
				            	<div class="input-group">

				              		<span class="input-group-addon"><i class="fa fa-address-card"></i></span>
				              		<input name="alamat_anak" type="text" class="form-control" placeholder="" value="{{$d->alamat_anak}}">
				            	</div>

				            	<hr></hr>

				            	<h5>NIK Saksi 1</h5>
				            	<div class="input-group">
				              		<span class="input-group-addon"><i class="fa fa-id-card"></i></span>
				              		<input name="s1_nik" type="text" class="form-control" placeholder="" required value="{{$d->s1_nik}}">
				            	</div>

								<h5>Nama Saksi 1</h5>
				            	<div class="input-group">
				              		<span class="input-group-addon"><i class="fa fa-user"></i></span>
				              		<input name="s1_nama" type="text" class="form-control" placeholder="Nama" required value="{{$d->s1_nama}}">
				            	</div>

				            	<h5>NIK Saksi 2</h5>
				            	<div class="input-group">
				              		<span class="input-group-addon"><i class="fa fa-id-card"></i></span>
				              		<input name="s2_nik" type="text" class="form-control" placeholder="" required value="{{$d->s2_nik}}">
				            	</div>

								<h5>Nama Saksi 2</h5>
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