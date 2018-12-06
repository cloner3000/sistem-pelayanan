@extends('kades.admin')
@section('judul','Daftar Postingan')

@section('ktp','active')
@section('riwayatKtp','active')
@section('isi')
	<section class="content-header">
      <h1>
        Dashboard
        <small>Kepala Desa</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('kades.dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Daftar Postingan</li>
      </ol>
    </section>

    <section class="content">

    	<div class="row">
    		<div class="col-xs-12">
    			<div class="box">

	            <div class="box-header">
	              <h3 class="box-title">Daftar Postingan</h3>
	            </div>
	            <div class="box-body table-responsive no-padding">
	              <table class="table table-hover">
	                <tr>
						<th>No</th>
						<th>Judul</th>
		                <th>Ketegori</th>
		                <th>Image</th>
		                <th>Slug</th>
		                <th>Pembuat</th>
		                <th>Aksi</th>
	                </tr>
	                @foreach($datas as $data)
			            	<tr>
								<td>{{++$no}}</td>
			                  	<td>{{$data->judul}}</td>
			                  	<td>{{$data->kategori_id}}</td>
			                  	<td>
			                  		<img src="{{ asset('storage/blog').'/'.$data->foto}}" class="img-thumbnail">
			                  	</td>
			                  	<td>{{$data->slug}}</td>
			                  	<td>{{$data->user_id}}</td>
			                  	<td>
			                  		<a class="btn btn-xs btn-primary" href="{{ route('kades.blog.show',$data->id) }}">
										<i class="fa fa-search"></i>
										 Lihat
									</a>
									
									<a class="btn btn-xs btn-info" style="margin-left: 5px;" data-toggle="modal" data-target="#{{md5($data->id.'blog')}}" >
										<i class="fa fa-edit"></i>
										 Edit
									</a>
																		
									<a class="btn btn-xs btn-danger" onclick="event.preventDefault();document.getElementById('{{md5($data->id."hapus")}}').submit();" style="margin-left: 5px;">
					                    <i class="fa fa-trash"></i>
					                    Hapus
					                </a>

					                <form id="{{md5($data->id.'hapus')}}" action="{{ route('kades.blog.destroy',$data->id) }}" method="POST" style="display: none;">
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
			<div class="modal fade" id="{{md5($d->id.'ktp')}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			    <div class="modal-dialog" role="document">
			        <div class="modal-content">
			            <div class="modal-header text-center">
			                <h4 class="modal-title w-100 font-weight-bold">Ubah Data Surat Permohonan KTP</h4>
			                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			                    <span aria-hidden="true">&times;</span>
			                </button>
			            </div>
			            <div class="modal-body mx-3">

				            

			            </div>
			        </div>
			    </div>
			</div>
    	@endforeach

    </section>
@endsection