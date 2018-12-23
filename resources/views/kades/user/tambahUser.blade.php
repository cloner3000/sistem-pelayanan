@extends('kades.admin')
@section('judul','Tambah Pengguna')

@section('user','active')
@section('tambahUser','active')
@section('isi')
	<section class="content-header">
      <h1>
        Dashboard
        <small>Kepala Desa</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('kades.dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Tambah Pengguna</li>
      </ol>
    </section>

    <section class="content">
    	<div class="row">
    		<div class="col-md-6">

	          <div class="box box-info">
	            <div class="box-header with-border">
	              <h3 class="box-title">Tambah Pengguna</h3>
	            </div>

	            <div class="box-body">
					<form method="POST" action="{{ route('kades.pengguna.store') }}">
						{{ csrf_field() }}

						<h5>Nama</h5>
		            	<div class="input-group">

		              		<span class="input-group-addon"><i class="fa fa-user"></i></span>
		              		<input name="name" type="text" class="form-control" id="name" placeholder="Nama" required>
		            	</div>

						<h5>Email</h5>
		            	<div class="input-group">
		              		<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
		              		<input name="email" type="email" class="form-control" placeholder="Email" required>
		            	</div>

						<h5>Hak Akses</h5>
		            	<div class="form-group">
		                  <select name="role" class="form-control">
		                    @foreach($role as $r)
	                            <option value="{{$r->id}}">{{$r->name}}</option>
	                        @endforeach
		                  </select>
		                </div>
						
						<h5>Password</h5>
		            	<div class="input-group">
		              		<span class="input-group-addon"><i class="fa fa-lock"></i></span>
		              		<input name="password" type="password" class="form-control" placeholder="Kata Sandi" required>
		            	</div>
		            	
		            	<h5>Konfirmasi Password</h5>
		            	<div class="input-group">
		              		<span class="input-group-addon"><i class="fa fa-lock"></i></span>
		              		<input name="password_confirmation" type="password" class="form-control" placeholder="Konfirmasi Kata Sandi" required>
		            	</div>
		            	<br>

		            	<div class="box-footer">
		               		<button type="submit" class="btn btn-primary">Tambah</button>
		              	</div>
					</form>
	            </div>
	            <!-- /.box-body -->
	          </div>
	        </div>

	        <div class="col-md-6">

	          <div class="box box-info">
	            <div class="box-header with-border">
	              <h3 class="box-title">Ubah Password</h3>
	            </div>

	            <div class="box-body">
					<form method="POST" action="{{ route('kades.ganti_password') }}">
						{{ csrf_field() }}
						<input type="hidden" name="id" value="{{encrypt($user->id)}}">

						<h5>Nama</h5>
		            	<div class="input-group">

		              		<span class="input-group-addon"><i class="fa fa-user"></i></span>
		              		<input name="nama" type="text" class="form-control" required value="{{$user->name}}">
		            	</div>

						<h5>Email</h5>
		            	<div class="input-group">
		              		<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
		              		<input name="email" type="email" class="form-control" required value="{{$user->email}}">
		            	</div>

		            	<h5>Password Lama</h5>
		            	<div class="input-group">
		              		<span class="input-group-addon"><i class="fa fa-lock"></i></span>
		              		<input name="pasLama" type="password" class="form-control" placeholder="Kata Sandi" required>
		            	</div>
						
						<h5>Password Baru</h5>
		            	<div class="input-group">
		              		<span class="input-group-addon"><i class="fa fa-lock"></i></span>
		              		<input name="pasBaru" type="password" class="form-control" placeholder="Kata Sandi" required>
		            	</div>
		            	
		            	<h5>Konfirmasi Password Baru</h5>
		            	<div class="input-group">
		              		<span class="input-group-addon"><i class="fa fa-lock"></i></span>
		              		<input name="pasBaruCek" type="password" class="form-control" placeholder="Konfirmasi Kata Sandi" required>
		            	</div>
		            	<br>
						
		            	<div class="box-footer">
		               		<button type="submit" class="btn btn-primary">Ubah Password</button>
		              	</div>
					</form>
	            </div>
	            <!-- /.box-body -->
	          </div>
	        </div>

    	</div>
          <!-- /.box -->
    </section>
@endsection