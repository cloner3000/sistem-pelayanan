@extends('kades.admin')
@section('judul','Daftar Postingan')

@section('blog','active')
@section('indexPost','active')
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
			                  	<td>{{$data->kategoris->nama}}</td>
			                  	<td>
			                  		<img src="{{ asset('storage/blog').'/'.$data->foto}}" class="img-thumbnail" style="width: auto;height: 50px;">
			                  	</td>
			                  	<td>{{$data->slug}}</td>
			                  	<td>{{$data->users->name}}</td>
			                  	<td>
			                  		<a class="btn btn-xs btn-primary" data-toggle="modal" data-target="#{{md5($data->id.'blog')}}" >
										<i class="fa fa-search"></i>
										 Lihat
									</a>
									<br>
									<a class="btn btn-xs btn-info" href="{{ route('kades.blog.edit',$data->id) }}" style="margin-bottom: 5px;">
										<i class="fa fa-edit"></i>
										 Edit
									</a>
									<br>									
									<a class="btn btn-xs btn-danger" onclick="event.preventDefault();document.getElementById('{{md5($data->id."hapus")}}').submit();" style="margin-bottom: 5px;">
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
			<div class="modal fade" id="{{md5($d->id.'blog')}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			    <div class="modal-dialog modal-lg" role="document" style="width: 90%;">
			        <div class="modal-content">
			            <div class="modal-header text-center">
			                <h4 class="modal-title w-100 font-weight-bold">Preview Posting</h4>
			                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			                    <span aria-hidden="true">&times;</span>
			                </button>
			            </div>
			            <div class="modal-body mx-3">
							<div class="container">

						      <div class="row">
						        <div class="col-lg-12">
						          <h5><strong>Judul :</strong> {{$d->judul}}</h5>
						          <hr>
						          <p>
						            <strong>Diposting Oleh :</strong> {{$d->users->name}}
						          </p>
						          <hr>
						          <p>
						            <strong>Kategori :</strong> {{$d->kategoris->nama}}
						          </p>
						          <hr>
						          <p><strong>Diposting pada :</strong> {{$d->created_at}}</p>

						          <hr>
						          <p>
						          	<strong>Foto Posting :</strong>
						          	<img class="img-thumbnail" src="{{ asset('storage/blog').'/'.$d->foto }}" style="width: 10%;height:auto;">
						          </p>
						          <hr>
						          <p><strong>Desktipsi :</strong>{{$d->deskripsi}}</p>
								  <hr>
								  <br>
						          	{!!$d->isi!!}
						          <hr>

						        </div>
						    </div>
			            </div>
			        </div>
			    </div>
			</div>
    	@endforeach

    </section>
@endsection