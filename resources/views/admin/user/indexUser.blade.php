@extends('admin.admin')
@section('judul','Daftar Pengguna')

@section('isi')
	<section class="content-header">
      <h1>
        Dashboard
        <small>Admin</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Daftar Pengguna</li>
      </ol>
    </section>

    <section class="content">
    	<div class="row">
    		<div class="col-xs-12">
    			<div class="box">
            <div class="box-header">
              <h3 class="box-title">Daftar Pengguna</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
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
                	<tr>
	                  <td>{{++$no}}</td>
	                  <td>{{$data->name}}</td>
	                  <td>{{$data->email}}</td>
	                  <td>
	                  	{{-- @if($data->roles->first() != "Super Admin") --}}
	                  		<span class="label label-success">{!!$data->roles->first()->name!!}</span>
	                  	{{-- @endif --}}
	                  </td>
	                  <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
	                </tr>
                @endforeach
              </table>
            </div>
            <!-- /.box-body -->
          </div>
            
    		</div>
    	</div>
    	
    </section>
@endsection