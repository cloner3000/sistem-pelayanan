@extends('admin.admin')
@section('judul','Daftar Surat Pengantar Pindah')

@section('spp','active')
@section('riwayatSpp','active')
@section('isi')
	<section class="content-header">
      <h1>
        Dashboard
        <small>Admin</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Daftar Surat Pengantar Pindah</li>
      </ol>
    </section>

    <section class="content">

    	<div class="row">
    		<div class="col-xs-12">
    			<div class="box">

		            <div class="box-header">
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<h4>Daftar Surat Pengantar Pindah</h4>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<form class="navbar-form navbar-form pull-right" method="post" action="{{ route('spp.export') }}">
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
						<th>NIK</th>
		                <th>Nama</th>
		                <th>No Kartu Keluarga</th>
		                <th>Nama Kepala Keluarga</th>
		                <th>Alamat Sekarang</th>
		                <th>Alamat Tujuan</th>
		                <th>Jumlah</th>
		                <th>Status</th>
		                <th>Aksi</th>
	                </tr>
	                @foreach($datas as $data)
			            	<tr>
			                  	<td>{{++$no}}</td>
			                  	<td>{{$data->nik}}</td>
			                  	<td>{{$data->nama}}</td>
			                  	<td>{{$data->no_kk}}</td>
			                  	<td>{{$data->kepala_keluarga}}</td>
			                  	<td>{{$data->alamat_sekarang}}</td>
			                  	<td>{{$data->alamat_tujuan}}</td>
			                  	<td>{{$data->jumlah_pindah}}</td>
			                  	<td>
			                  		<span class="label label-success">{{$data->status}}</span>
			                  	</td>
			                  	<td>
			                  		<a class="btn btn-xs btn-primary" data-toggle="modal" data-target="#{{md5($data->id.'spppdf')}}">
										<i class="fa fa-file-alt"></i>
										 PDF
									</a>
									<br>
									<a class="btn btn-xs btn-info" style="margin-top: 10px;" data-toggle="modal" data-target="#{{md5($data->id.'spp')}}" >
										<i class="fa fa-edit"></i>
										 Edit
									</a>
									<br>									
									<a class="btn btn-xs btn-danger" onclick="event.preventDefault();document.getElementById('{{md5($data->id."hapus")}}').submit();" style="margin-top: 10px;">
					                    <i class="fa fa-trash"></i>
					                    Hapus
					                </a>

					                <form id="{{md5($data->id.'hapus')}}" action="{{ route('spp.destroy',$data->id) }}" method="POST" style="display: none;">
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
    		<div class="modal fade" id="{{md5($d->id.'spppdf')}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			    <div class="modal-dialog" role="document">
			        <div class="modal-content">
			            <div class="modal-header text-center">
			                <h4 class="modal-title w-100 font-weight-bold">
			                	Penanggung Jawab Surat
				                <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close">
				                    <span aria-hidden="true">&times;</span>
				                </button>
			                </h4>
			            </div>
			            <div class="modal-body">
							<h5>Pilih Penanggung Jawab Surat</h5>
				            <div class="input-group">
				              	<span class="input-group-addon"><i class="fa fa-hammer"></i></span>
				              	<select class="form-control" data-url="{{ route('spp.show',['spp'=> $d->id,'user_id' => '']) }}" onchange="getData(this);">
				              		@foreach($user as $u)
				              			<option data-id="{{$u->id}}">{{$u->name}}</option>
				              		@endforeach
				              	</select>
				            </div>
			            </div>
			        </div>
			    </div>
			</div>

			<div class="modal fade" id="{{md5($d->id.'spp')}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			    <div class="modal-dialog" role="document">
			        <div class="modal-content">
			            <div class="modal-header text-center">
			                <h4 class="modal-title w-100 font-weight-bold">Ubah Data Surat Pindah</h4>
			                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			                    <span aria-hidden="true">&times;</span>
			                </button>
			            </div>
			            <div class="modal-body mx-3">

				             <form method="POST" action="{{ route('spp.update',$d->id) }}">
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

				            	<h5>No Kartu Keluarga</h5>
				            	<div class="input-group">
				              		<span class="input-group-addon"><i class="fa fa-id-card-alt"></i></span>
				              		<input name="no_kk" type="text" class="form-control" placeholder="" required value="{{$d->no_kk}}">
				            	</div>

				            	<h5>Nama Kepala Keluarga</h5>
				            	<div class="input-group">

				              		<span class="input-group-addon"><i class="fa fa-id-card"></i></span>
				              		<input name="kepala_keluarga" type="text" class="form-control" placeholder="" required value="{{$d->kepala_keluarga}}">
				            	</div>

				            	<h5>Alamat Sekarang</h5>
				            	<div class="input-group">

				              		<span class="input-group-addon"><i class="fa fa-address-card"></i></span>
				              		<input name="alamat_sekarang" type="text" class="form-control" placeholder="" required value="{{$d->alamat_sekarang}}">
				            	</div>

				            	<h5>Alamat Tujuan</h5>
				            	<div class="input-group">

				              		<span class="input-group-addon"><i class="fa fa-map-signs"></i></span>
				              		<input name="alamat_tujuan" type="text" class="form-control" placeholder="" required value="{{$d->alamat_tujuan}}">
				            	</div>

				            	<h5>Jumlah</h5>
				            	<div class="input-group">

				              		<span class="input-group-addon"><i class="fa fa-users"></i></span>
				              		<input name="jumlah_pindah" type="number" class="form-control" placeholder="" required value="{{$d->jumlah_pindah}}">
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