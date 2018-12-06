@extends('kades.admin')
@section('judul','Edit Postingan')
@section('isi')
	<section class="content-header">
      <h1>
        Dashboard
        <small>Kepala Desa</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Postingan</li>
      </ol>
    </section>

    <section class="content">
		<form action="{{ route('kades.blog.update',$data->id) }}" method="post" enctype="multipart/form-data">
			{{csrf_field()}}
			<input type="hidden" name="_method" value="PATCH">
		    <div class="box box-primary">
		        <div class="box-header with-border">
		          <h3 class="box-title">Edit Postingan</h3>

		          <div class="pull-right box-tools">
	                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"
	                        title="Collapse">
	                  <i class="fa fa-minus"></i></button>
	              </div>
		        </div>

		        <div class="box-body">
				    <div class="row">
				       <div class="col-md-6">
				           	<div class="form-group">
				           	  <label>Judul</label>
				           	  <input name="judul" type="text" class="form-control" required value="{{$data->judul}}">
				           	</div>
							
							<div class="form-group">
								<label for="exampleInputFile">Foto Postingan</label>
								<input name="foto" type="file">
								<p class="help-block">Gambar Untuk Postingan Website</p>
							</div>
				        </div>

				        <div class="col-md-6">
				        	<div class="form-group">
				              <label>Kategori</label>
				              <select name="kategori_id" class="form-control" required>
				              		@foreach($kategori as $d)
				              			@if($d->id == $data->kategori_id)
				              				<option value="{{$d->id}}" selected>{{$d->nama}}</option>
				              			@else
				              				<option value="{{$d->id}}">{{$d->nama}}</option>
				              			@endif
				              		@endforeach
				              </select>
				            </div>

				            <div class="form-group">
				              <label>Deskripsi</label>
				              <textarea name="deskripsi" type="text" class="form-control" rows="3" required>{{$data->deskripsi}}</textarea>
				            </div>

				        </div>

				    </div>
			    </div>
		    </div>
		
			<div class="box box-info">
		        <div class="box-header">
		          <h3 class="box-title">
		            Postingan
		          </h3>
		          <div class="pull-right box-tools">
		            <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"
		                    title="Collapse">
		              <i class="fa fa-minus"></i>
		          	</button>
		          </div>
		        </div>

		        <div class="box-body pad">
		            <div class="form-group">
		            	<textarea id="tentang" name="isi" rows="10" cols="80" required>{{$data->isi}}</textarea>	
		            </div>
		            <div class="form-group">
		            	<button type="submit" class="btn btn-sm btn-info">Posting</button>	
		            </div>
		        </div>
		    </div>
		</form>
    </section>
@endsection