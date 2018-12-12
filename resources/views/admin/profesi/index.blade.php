@extends('admin.admin')
@section('judul','Daftar Profesi')

@section('profesi','active')
@section('isi')
	<section class="content-header">
      <h1>
        Dashboard
        <small>Admin</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Daftar Profesi</li>
      </ol>
    </section>

    <section class="content">

    	<div class="row">
    		<div class="col-xs-12">
    			<div class="box">

	            <div class="box-header">
	              <div class="row">
	              	<div class="col-xs-6">
	              		<h3 class="box-title">Daftar Profesi</h3>
	              	</div>
	              	<div class="col-xs-6">
	              		<div class="text-right">
			            	<a class="btn btn-xs btn-primary" data-toggle="modal" data-target="#tambah">
			            		<i class="fa fa-plus"></i> 
			            		Tambah
			            	</a>
			            </div>

			            <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-hidden="true">
						    <div class="modal-dialog" role="document">
						        <div class="modal-content">
						            <div class="modal-header text-center">
						                <h4 class="modal-title w-100 font-weight-bold">Tambah Data Profesi</h4>
						                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						                    <span aria-hidden="true">&times;</span>
						                </button>
						            </div>
						            <div class="modal-body mx-3">

							            <form method="POST" action="{{ route('profesi.store') }}">
											{{ csrf_field() }}
											
											<h5>Nama Profesi</h5>
							            	<div class="input-group">
							              		<span class="input-group-addon"><i class="fa fa-id-card"></i></span>
							              		<input name="nama" type="text" class="form-control" placeholder="" required>
							            	</div>

							            	<div class="modal-footer d-flex justify-content-center">
							               		<button type="submit" class="btn btn-primary">Simpan</button>
							              	</div>
										</form>

						            </div>
						        </div>
						    </div>
						</div>

	              	</div>
	              </div>
	            </div>
	            <div class="box-body table-responsive no-padding">
	              <table class="table table-hover">
	                <tr>
						<th>No</th>
						<th>Nama Profesi</th>
		                <th>Slug</th>
		                <th>Aksi</th>
	                </tr>
	                @foreach($datas as $data)
			            	<tr>
			                  	<td>{{++$no}}</td>
			                  	<td>{{$data->nama}}</td>
			                  	<td>{{$data->slug}}</td>
			                  	<td>
									<a class="btn btn-xs btn-info" data-toggle="modal" data-target="#{{md5($data->id.'profesi')}}" >
										<i class="fa fa-edit"></i>
										Edit
									</a>
									<a class="btn btn-xs btn-danger" onclick="event.preventDefault();document.getElementById('{{md5($data->id."hapus")}}').submit();" style="margin-left: 5px;">
					                    <i class="fa fa-trash"></i>
					                    Hapus
					                    </a>

					                    <form id="{{md5($data->id.'hapus')}}" action="{{ route('profesi.destroy',$data->id) }}" method="POST" style="display: none;">
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
			<div class="modal fade" id="{{md5($d->id.'profesi')}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			    <div class="modal-dialog" role="document">
			        <div class="modal-content">
			            <div class="modal-header text-center">
			                <h4 class="modal-title w-100 font-weight-bold">Ubah Data Profesi</h4>
			                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			                    <span aria-hidden="true">&times;</span>
			                </button>
			            </div>
			            <div class="modal-body mx-3">

				            <form method="POST" action="{{ route('profesi.update',$d->id) }}">
								{{ csrf_field() }}
								<input type="hidden" name="_method" value="PATCH">
								
								<h5>Nama Profesi</h5>
				            	<div class="input-group">
				              		<span class="input-group-addon"><i class="fa fa-id-card"></i></span>
				              		<input name="nama" type="text" class="form-control" placeholder="" required value="{{$d->nama}}">
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