@extends('admin.admin')
@section('judul','Daftar Pengguna')
@section('daftarUser','active')
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
                	@if($data->roles->first()->name == "Kepala Desa")
	                	{{-- buang data kepala desa --}}
		            @else
		            	<tr>
		                  	<td>{{++$no}}</td>
		                  	<td>{{$data->name}}</td>
		                  	<td>{{$data->email}}</td>
		                  	<td>
		                  		<span class="label label-success">{!!$data->roles->first()->name!!}</span>
		                  	</td>
		                  	<td>
								<a class="btn btn-sm btn-info" href="mailto:joe@example.com?subject=feedback" >email me</a>
								<a class="btn btn-sm btn-danger" href="mailto:joe@example.com?subject=feedback" >email me</a>
		                  	</td>
		                </tr>
	                @endif
                @endforeach
              </table>
              <div class="pull-right">
              	{!! $datas->render('vendor.pagination.default') !!}
              </div>
            </div>
            <!-- /.box-body -->
          </div>
            
    		</div>
    	</div>
    	
    </section>
@endsection