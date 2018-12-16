@extends('kades.admin')
@section('judul','Pengaturan Website')
@section('web','active')
@section('isi')
	<section class="content-header">
      <h1>
        Dashboard
        <small>Kepala Desa</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('kades.dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Pengaturan Website</li>
      </ol>
    </section>

    <section class="content">
		<form action="{{ route('kades.web.update',$web->id) }}" method="post" enctype="multipart/form-data">
			{{csrf_field()}}
			<input type="hidden" name="_method" value="PATCH">

		    <div class="box box-primary">
		        <div class="box-header with-border">
		          <h3 class="box-title">Pengaturan Data Portal Website</h3>

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
				             <label>Nama Website</label>
				             <input name="nama_website" type="text" class="form-control"  value="{{$web->nama_website}}">
				           </div>

				            <div class="form-group">
				              <label>Email</label>
				              <input name="email" type="text" class="form-control"  value="{{$web->email}}">
				            </div>

				            <div class="form-group">
				              <label>Twitter</label>
				              <input name="twitter" type="text" class="form-control"  value="{{$web->twitter}}">
				            </div>
				        </div>

				        <div class="col-md-6">
				            <div class="form-group">
				              <label>No Telpon</label>
				              <input name="tlp" type="text" class="form-control"  value="{{$web->tlp}}">
				            </div>

				            <div class="form-group">
				              <label>Facebook</label>
				              <input name="fb" type="text" class="form-control"  value="{{$web->fb}}">
				            </div>

				            <div class="form-group">
				              <label>Instagram</label>
				              <input name="ig" type="text" class="form-control"  value="{{$web->ig}}">
				            </div>
				        </div>

				         </div>
			    </div>
		    </div>
		
			<div class="box box-info">
		        <div class="box-header">
		          <h3 class="box-title">
		            Tentang Website
		          </h3>
		          <div class="pull-right box-tools">
		            <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"
		                    title="Collapse">
		              <i class="fa fa-minus"></i>
		          	</button>
		          </div>
		        </div>
		        <div class="box-body pad">
		            <textarea id="tentang" name="tentang" rows="10" cols="80">
		                {{$web->tentang}}
		            </textarea>
		        </div>
				
				<div class="box-body pad">
					<div class="form-group">
						<label for="foto_tentang">Foto Tentang</label>
						<input name="foto_tentang" class="form-control" type="file" id="foto_tentang">
						<p class="help-block">Gambar Untuk Desktipsi Website</p>
					</div>
				</div>
		        <div class="box-body pad">
		            <div class="form-group">
		            	<label for="tentang1">Tentang website untuk posisi di bawah</label>
		            	<textarea  name="tentang1" id="tentang1" class="form-control" rows="3" cols="80">{{$web->tentang1}}</textarea>
		            </div>
		        </div>
		    </div>

		    <div class="box box-info">
		        <div class="box-header">
		          <h3 class="box-title">
		            Visi Dan Misi Website
		          </h3>
		          <div class="pull-right box-tools">
		            <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"
		                    title="Collapse">
		              <i class="fa fa-minus"></i>
		          	</button>
		          </div>
		        </div>
		        <div class="box-body pad">
		        	<label for="">Visi</label>
		            <textarea id="visi" name="visi" rows="10" cols="80">
		                {{$web->visi}}
		            </textarea>
		        </div>

		        <div class="box-body pad">
		        	<label for="">Misi</label>
		            <textarea id="misi" name="misi" rows="10" cols="80">
		                {{$web->misi}}
		            </textarea>
		        </div>
		    </div>



	    	<div class="box box-info">
		        <div class="box-header with-border">
		        	<h3 class="box-title">Pengaturan Foto Slider Portal Website</h3>
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
								<label>Judul Slider 1</label>
								<input name="judul_slider" type="text" class="form-control" value="{{$web->judul_slider}}">
							</div>
							
							<div class="form-group">
								<label>Kutipan Slider 1</label>
								<textarea name="deskripsi_slider" class="form-control" rows="3">{{$web->deskripsi_slider}}
								</textarea>
							</div>
							
							<div class="form-group">
								<label for="exampleInputFile">Foto Slider 1</label>
								<input name="foto_slider" type="file" id="exampleInputFile">
								<p class="help-block">Gambar Untuk Halaman Utama Website</p>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label>Judul Slider 2</label>
								<input name="judul_slider1" type="text" class="form-control" value="{{$web->judul_slider1}}">
							</div>
							
							<div class="form-group">
								<label>Kutipan Slider 2</label>
								<textarea name="deskripsi_slider1" class="form-control" rows="3">{{$web->deskripsi_slider1}}
								</textarea>
							</div>
							
							<div class="form-group">
								<label for="exampleInputFile">Foto Slider 2</label>
								<input name="foto_slider1" type="file" id="exampleInputFile">
								<p class="help-block">Gambar Untuk Halaman Utama Website</p>
							</div>
						</div>
						<div class="col-md-12">
								<button type="submit" class="btn btn-sm btn-info">Save</button>
							</div>
					</div>
				</div>

			</div>
		</form>
    </section>
@endsection

@section('webJS')
	<script type="text/javascript">
	  CKEDITOR.replace('tentang');
	  CKEDITOR.replace('visi');
	  CKEDITOR.replace('misi');
	</script>
@endsection