@extends('admin.admin')
@section('judul','Daftar Pengguna')

@section('user','active')
@section('daftarUser','active')
@section('isi')
	<section class="content-header">
      <h1>
        Dashboard
        <small>Admin</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Daftar Pengguna</li>
      </ol>
    </section>

    <section class="content">

    	<div class="row">
    		<div class="col-xs-12">
    			<div class="box">

	            <div class="box-header">
	              <h3 class="box-title">Daftar Pengguna</h3>

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
		                <th>Email</th>
		                <th>Hak Akses</th>
		                <th>Aksi</th>
	                </tr>
	                @foreach($datas as $data)
	                	@if($data->roles->first()->name != "Kepala Desa" && $data->roles->first()->name != "Admin")
		                	
			            	<tr>
			                  	<td>{{++$no}}</td>
			                  	<td>{{$data->name}}</td>
			                  	<td>{{$data->email}}</td>
			                  	<td>
			                  		<span class="label label-success">{!!$data->roles->first()->name!!}</span>
			                  	</td>
			                  	<td>
									<a class="btn btn-sm btn-info" data-toggle="modal" data-target="#{{md5($data->id.'user')}}" >
										<i class="fa fa-edit"></i>
										 Edit
									</a>
									<a class="btn btn-sm btn-danger" onclick="event.preventDefault();document.getElementById('{{md5($data->id."hapus")}}').submit();">
					                    <i class="fa fa-trash"></i>
					                    Hapus
					                    </a>

					                    <form id="{{md5($data->id.'hapus')}}" action="{{ route('pengguna.destroy',$data->id) }}" method="POST" style="display: none;">
					                        {{ csrf_field() }}
					                        <input type="hidden" name="_method" value="DELETE">
					                    </form>
			                  	</td>
			                </tr>
		                @endif
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
			<div class="modal fade" id="{{md5($d->id.'user')}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			    <div class="modal-dialog" role="document">
			        <div class="modal-content">
			            <div class="modal-header text-center">
			                <h4 class="modal-title w-100 font-weight-bold">Ubah Data Pengguna</h4>
			                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			                    <span aria-hidden="true">&times;</span>
			                </button>
			            </div>
			            <div class="modal-body mx-3">

				            <form method="POST" action="{{ route('pengguna.update',$d->id) }}">
								{{ csrf_field() }}
								<input type="hidden" name="_method" value="PATCH">

								<h5>Nama</h5>
				            	<div class="input-group">

				              		<span class="input-group-addon"><i class="fa fa-user"></i></span>
				              		<input name="name" type="text" class="form-control" placeholder="Nama" required value="{{$d->name}}">
				            	</div>

								<h5>Email</h5>
				            	<div class="input-group">
				              		<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
				              		<input name="email" type="email" class="form-control" placeholder="Email" required value="{{$d->email}}">
				            	</div>

								<h5>Hak Akses</h5>
				            	<div class="form-group">
				                  <select name="role" class="form-control" disabled>
			                        <option selected>{{$d->roles->first()->name}}</option>
				                  </select>
				                </div>
								
								<h5>Password</h5>
				            	<div class="input-group">
				              		<span class="input-group-addon"><i class="fa fa-lock"></i></span>
				              		<input name="password" type="password" class="form-control" placeholder="Kata Sandi" disabled value="**********">
				            	</div>
				            	
				            	<h5>Konfirmasi Password</h5>
				            	<div class="input-group">
				              		<span class="input-group-addon"><i class="fa fa-lock"></i></span>
				              		<input name="password_confirmation" type="password" class="form-control" placeholder="Konfirmasi Kata Sandi" disabled value="**********">
				            	</div>
				            	<br>

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