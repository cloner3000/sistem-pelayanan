@extends('kades.admin')
@section('judul','Daftar Struktur Organisasi')

@section('struktur','active')
@section('isi')
	<section class="content-header">
      <h1>
        Dashboard
        <small>Admin</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Daftar Struktur Organisasi</li>
      </ol>
    </section>

    <section class="content">

    	<div class="row">
    		<div class="col-xs-12">
    			<div class="box">

	            <div class="box-header">
	              <h3 class="box-title">Daftar Struktur Organisasi</h3>
	            </div>
	            <div class="box-body table-responsive no-padding">
	              <table class="table table-hover">
	                <tr>
						<th>No</th>
		                <th>Nama</th>
		                <th>Jabatan</th>
		                <th>Foto</th>
		                <th>Aksi</th>
	                </tr>
	                @foreach($datas as $data)
			            	<tr>
			                  	<td>{{++$no}}</td>
			                  	<td>{{$data->nama}}</td>
			                  	<td>{{$data->jabatan}}</td>
			                  	<td>{{$data->foto}}</td>
			                  	<td>
									<a class="btn btn-xs btn-info" data-toggle="modal" data-target="#{{md5($data->id.'struktur')}}" >
										<i class="fa fa-edit"></i>
										Edit
									</a>
									<br>
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
			<div class="modal fade" id="{{md5($d->id.'struktur')}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			    <div class="modal-dialog" role="document">
			        <div class="modal-content">
			            <div class="modal-header text-center">
			                <h4 class="modal-title w-100 font-weight-bold">Ubah Data Struktur</h4>
			                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			                    <span aria-hidden="true">&times;</span>
			                </button>
			            </div>
			            <div class="modal-body mx-3">

				            <form method="POST" action="{{ route('kades.struktur.update',$d->id) }}" enctype="multipart/form-data">
								{{ csrf_field() }}
								<input type="hidden" name="_method" value="PATCH">

								<h5>Nama</h5>
				            	<div class="input-group">
				              		<span class="input-group-addon"><i class="fa fa-user"></i></span>
				              		<input name="nama" type="text" class="form-control" required value="{{$d->nama}}">
				            	</div>

				            	<h5>Jabatan</h5>
				            	<div class="input-group">
				              		<span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
				              		<select class="form-control" name="jabatan" required>
				              			<option value="kepala desa">Kepala Desa</option>
				              			<option value="sekretaris">Sekretaris</option>
				              			<option value="bendahara">Bendahara</option>
				              		</select>
				            	</div>

								<h5>Foto</h5>
				            	<div class="input-group">
				              		<span class="input-group-addon"><i class="fa fa-image"></i></span>
				              		<input name="foto" type="file" class="form-control" required>
				            	</div>
								
								<h5>Link Facebook</h5>
				            	<div class="input-group">
				              		<span class="input-group-addon"><i class="fa fa-globe"></i></span>
				              		<input name="fb" type="text" class="form-control" required value="{{$d->fb}}">
				            	</div>
								
								<h5>Link Twitter</h5>
				            	<div class="input-group">
				              		<span class="input-group-addon"><i class="fa fa-globe-asia"></i></span>
				              		<input name="twitter" type="text" class="form-control" required value="{{$d->twitter}}">
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