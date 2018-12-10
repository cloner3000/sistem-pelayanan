@extends('kades.admin')
@section('judul','Daftar Surat Kematian Yang Telah Di Terima')

@section('skematian','active')
@section('riwayatSkematian','active')
@section('isi')
	<section class="content-header">
      <h1>
        Dashboard
        <small>Kepala Desa</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('kades.dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Daftar Surat Kematian Yang Telah Di Terima</li>
      </ol>
    </section>

    <section class="content">

    	<div class="row">
    		<div class="col-xs-12">
    			<div class="box">

		            <div class="box-header">
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<h4>Daftar Surat Kematian Yang Telah Di Terima</h4>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<form class="navbar-form navbar-form pull-right" method="post" action="{{ route('kades.skematian.export') }}">
									{{csrf_field()}}
									<div class="form-group">
										<label>Pilih Data :&nbsp;</label>
										<select name="export" class="form-control">
											@foreach($export as $x)
												<option value="{{$x->month.'-'.$x->year}}">{{bulan($x->month).' - '.$x->year}}</option>
											@endforeach
										</select>
										<button type="submit" class="btn btn-sm btn-info" style="margin-left: 5px;">Download</button>
									</div>
								</form>
							</div>
						</div>
		            </div>
		            
		            <div class="box-body table-responsive no-padding">
		              <table class="table table-hover">
		                <tr>
							<th>No</th>
			                <th>Nama</th>
			                <th>Tanggal Lahir</th>
			                <th>Jenis Kelamin</th>
			                <th>Agama</th>
			                <th>Jenis Kelamin</th>
			                <th>Pelapor</th>
			                <th>Status</th>
			                <th>Aksi</th>
		                </tr>
		                @foreach($datas as $data)
				            	<tr>
				                  	<td>{{++$no}}</td>
				                  	<td>{{$data->nama}}</td>
				                  	<td>{{$data->tempat}}, {{$data->tanggal}}</td> 
				                  	<td>{{ucfirst($data->jenis_kelamin)}}</td>
				                  	<td>{{ucfirst($data->agama)}}</td>
				                  	<td>{{ucfirst($data->jenis_kelamin)}}</td>
				                  	<td>{{$data->p_nama}}</td>
				                  	<td>
				                  		<span class="label label-success">{{$data->status}}</span>
				                  	</td>
				                  	<td>
				                  		<a class="btn btn-xs btn-primary" data-toggle="modal" data-target="#{{md5($data->id.'skematianpdf')}}" style="margin-bottom: 10px;">
											<i class="fa fa-file-alt"></i>
											 PDF
										</a>
										<br>
										<a class="btn btn-xs btn-info" data-toggle="modal" data-target="#{{md5($data->id.'skematian')}}" >
											<i class="fa fa-edit"></i>
											Edit
										</a>
										<br>
										<a class="btn btn-xs btn-danger" onclick="event.preventDefault();document.getElementById('{{md5($data->id."hapus")}}').submit();" style="margin-top: 10px;">
						                    <i class="fa fa-trash"></i>
						                    Hapus
						                    </a>

						                    <form id="{{md5($data->id.'hapus')}}" action="{{ route('kades.skematian.destroy',$data->id) }}" method="POST" style="display: none;">
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
    		<div class="modal fade" id="{{md5($d->id.'skematianpdf')}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			    <div class="modal-dialog" role="document">
			        <div class="modal-content">
			            <div class="modal-header text-center">
			                <h4 class="modal-title w-100 font-weight-bold">
			                	Penanggung Jawab Surat
				                <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close">
				                    <span aria-hidden="true">&times;</span>
				                </button>
			                </h4>
			            </div>
			            <div class="modal-body">
							<h5>Pilih Penanggung Jawab Surat</h5>
				            <div class="input-group">
				              	<span class="input-group-addon"><i class="fa fa-hammer"></i></span>
				              	<select id="penanggungJawab" data-url="{{ route('kades.skematian.show',['skematian'=> $d->id,'user_id' => '']) }}" class="form-control" onchange="getData(this)">
				              		@foreach($user as $u)
				              			<option data-id="{{$u->id}}">{{$u->name}}</option>
				              		@endforeach
				              	</select>
				            </div>
			            </div>
			        </div>
			    </div>
			</div>

			<div class="modal fade" id="{{md5($d->id.'skematian')}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			    <div class="modal-dialog modal-lg" role="document">
			        <div class="modal-content">
			            <div class="modal-header text-center">
			                <h4 class="modal-title w-100 font-weight-bold">
			                	Ubah Data Surat Keterangan Kematian
				                <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close">
				                    <span aria-hidden="true">&times;</span>
				                </button>
			                </h4>
			            </div>
			            <div class="modal-body">

				            <form method="POST" action="{{ route('kades.skematian.update',$d->id) }}">
								{{ csrf_field() }}
								<input type="hidden" name="_method" value="PATCH">

								<div class="panel panel-info">
						            <div class="panel-heading"><strong>Data Orang Meninggal</strong></div>
						            <div class="panel-body">
						                <div class="row">
						                	<div class="col-md-6">
						                		<h5>Nama</h5>
								            	<div class="input-group">
								              		<span class="input-group-addon"><i class="fa fa-user"></i></span>
								              		<input name="nama" type="text" class="form-control" required value="{{$d->nama}}">
								            	</div>
												
												<h5>NIK</h5>
								            	<div class="input-group">
								              		<span class="input-group-addon"><i class="fa fa-id-card"></i></span>
								              		<input name="nik" type="number" class="form-control" required value="{{$d->nik}}">
								            	</div>

								            	<h5>Jenis Kelamin</h5>
								            	<div class="input-group">
								              		<span class="input-group-addon"><i class="fa fa-venus-mars"></i></span>
								              		<select class="form-control" name="jenis_kelamin">
								              			<option value="laki-laki">Laki-laki</option>
								              			<option value="perempuan">Perempuan</option>
								              		</select>
								            	</div>
											</div>
											<div class="col-md-6">
								            	<h5>Tanggal Lahir</h5>
								            	<div class="input-group">
								              		<span class="input-group-addon"><i class="fa fa-calendar-alt"></i></span>
								              		<input name="tanggal_lahir" type="text" id="l_kematian" class="form-control" required value="{{date('d-m-Y', strtotime($d->tanggal_lahir))}}">
								            	</div>
												
												<h5>Agama</h5>
								            	<div class="input-group">
								              		<span class="input-group-addon"><i class="fa fa-map-signs"></i></span>
								              		<input name="agama" type="text" class="form-control" required value="{{$d->agama}}">
								            	</div>

								            	<h5>Alamat</h5>
								            	<div class="input-group">
								              		<span class="input-group-addon"><i class="fa fa-map-signs"></i></span>
								              		<input name="alamat" type="text" class="form-control" required value="{{$d->alamat}}">
								            	</div>
						                	</div>
						              	</div>
						            </div>
					            </div>
								<div class="panel panel-info">
						            <div class="panel-heading"><strong>Terjadinya Peristiwa</strong></div>
						            <div class="panel-body">
						            	<h5>Tanggal</h5>
								        <div class="input-group">
								       		<span class="input-group-addon"><i class="fa fa-map-signs"></i></span>
								        	<input name="waktu" type="text" id="w_kematian" class="form-control" required value="{{date('d-m-Y', strtotime($d->waktu))}}">
								        </div>

								        <h5>Tempat</h5>
								        <div class="input-group">
								       		<span class="input-group-addon"><i class="fa fa-map-signs"></i></span>
								        	<input name="tempat" type="text" class="form-control" required value="{{$d->tempat}}">
								        </div>

								        <h5>Penyebab</h5>
								        <div class="input-group">
								       		<span class="input-group-addon"><i class="fa fa-map-signs"></i></span>
								        	<input name="penyebab" type="text" class="form-control" required value="{{$d->penyebab}}">
								        </div>
						            </div>
						        </div>
					            <div class="panel panel-info">
						            <div class="panel-heading"><strong>Pelapor</strong></div>
						            <div class="panel-body">
						                <div class="row">
						                	<div class="col-md-6">
						                		<h5>NIK</h5>
								            	<div class="input-group">
								              		<span class="input-group-addon"><i class="fa fa-id-card"></i></span>
								              		<input name="p_nik" type="number" class="form-control" required value="{{$d->p_nik}}">
								            	</div>

								            	<h5>Nama</h5>
								            	<div class="input-group">
								              		<span class="input-group-addon"><i class="fa fa-user"></i></span>
								              		<input name="p_nama" type="text" class="form-control" required value="{{$d->p_nama}}">
								            	</div>

								            	<h5>Tanggal Lahir</h5>
								            	<div class="input-group">
								              		<span class="input-group-addon"><i class="fa fa-user"></i></span>
								              		<input name="p_tanggal" type="text" id="l_kematian_pelapor" class="form-control" required value="{{date('d-m-Y', strtotime($d->p_tanggal))}}">
								            	</div>

						                	</div>
						                	<div class="col-md-6">
						                		<h5>Tempat Lahir</h5>
								            	<div class="input-group">
								              		<span class="input-group-addon"><i class="fa fa-map-signs"></i></span>
								              		<input name="p_tempat" type="text" class="form-control" required value="{{$d->p_alamat}}">
								            	</div>

								            	<h5>Pekerjaan</h5>
								            	<div class="input-group">
								              		<span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
								              		<select class="form-control" name="p_pekerjaan">
								              			<option value="pns">Pegawai Negeri Sipil</option>
								              			<option value="wiraswasta">Wiraswasta</option>
								              			<option value="pelajar">Pelajar</option>
								              			<option value="mahasiswa">Mahasiswa</option>
								              			<option value="karyawan">Karyawan</option>
								              			<option value="programmer">Programmer</option>
								              			<option value="ibu rumah tangga">Ibu Rumah Tangga</option>
								              			<option value="lain-lain">Lain-Lain</option>
								              		</select>
								            	</div>

								            	<h5>Alamat</h5>
								            	<div class="input-group">
								              		<span class="input-group-addon"><i class="fa fa-map-signs"></i></span>
								              		<input name="p_alamat" type="text" class="form-control" required value="{{$d->p_alamat}}">
								            	</div>

								            	<h5>Hubungan</h5>
								            	<div class="input-group">
								              		<span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
								              		<select class="form-control" name="p_hubungan">
								              			<option value="anak kandung">Anak Kandung</option>
								              		</select>
								            	</div>
						                	</div>
						              	</div>
						            </div>
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