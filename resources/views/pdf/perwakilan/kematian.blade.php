@extends('pdf.perwakilan.master')
@section('judul','Surat Keterangan Kematian | '.$data->nama)
@section('nomor')
	<h5>UNTUK YANG BERSANGKUTAN</h5>
	<h5><u>SURAT KETERANGAN KEMATIAN</u></h5>
	<p>Nomor : 474.3/.../XI/2018</p>
@endsection
@section('nomor')
	<h5>UNTUK YANG BERSANGKUTAN</h5>
	<h5><u>SURAT KETERANGAN KEMATIAN</u></h5>
	<p>Nomor : 474.3/{{$data->id}}/{{romawi(date('m',strtotime($data->created_at)))}}/{{date('Y',strtotime($data->created_at))}}</p>
@endsection
@section('isi')
		<div class="content">
			<br>
			<p>Yang Bertanda tangan dibawah ini, menerangkan bahwa:</p>
			<br>

			<div class="row">
				<div class="col-md-3">Nama Lengkap</div>
				<div class="col-md-5">: {{$data->nama}}</div>
			</div>
			<div class="row">
				<div class="col-md-3">NIK</div>
				<div class="col-md-5">: {{$data->nik}}</div>
			</div>
			<div class="row">
				<div class="col-md-3">Jenis kelamin</div>
				<div class="col-md-5">: {{$data->jenis_kelamin}}</div>
			</div>
			<div class="row">
				<div class="col-md-3">Tanggal lahir/Umur</div>
				<div class="col-md-5">: {{date('d-m-Y',strtotime($data->tanggal))}}</div>
			</div>
			<div class="row">
				<div class="col-md-3">Agama</div>
				<div class="col-md-5">: {{$data->agama}}</div>
			</div>
			<div class="row">
				<div class="col-md-3">Alamat</div>
				<div class="col-md-7">: {{$data->alamat}}</div>
			</div>

			<br>
			<p>Telah meninggal dunia pada :</p>
			<br>

			<div class="row">
				<div class="col-md-3">Hari</div>
				<div class="col-md-5">: {{hari(date('l',strtotime($data->waktu)))}}</div>
			</div>
			<div class="row">
				<div class="col-md-3">Tanggal</div>
				<div class="col-md-5">: {{date('d-M-Y',strtotime($data->waktu))}}</div>
			</div>
			<div class="row">
				<div class="col-md-3">Bertempat di</div>
				<div class="col-md-5">: {{$data->tempat}}</div>
			</div>
			<div class="row">
				<div class="col-md-3">Penyebab Kematian</div>
				<div class="col-md-5">: {{$data->penyebab}}</div>
			</div>
			
			<br>
			<p>Surat keterangan ini dibuat berdasarkan keterangan pelapor :</p>
			<br>
			
			<div class="row">
				<div class="col-md-3">Nama</div>
				<div class="col-md-5">: {{$data->p_nama}}</div>
			</div>
			<div class="row">
				<div class="col-md-3">NIK</div>
				<div class="col-md-5">: {{$data->p_nik}}</div>
			</div>
			<div class="row">
				<div class="col-md-3">Tanggal lahir/Umur</div>
				<div class="col-md-5">: {{$data->p_tempat}}/{{date('d-m-Y',strtotime($data->p_tanggal))}}</div>
			</div>
			<div class="row">
				<div class="col-md-3">Pekerjaan</div>
				<div class="col-md-5">: {{$data->p_pekerjaan}}</div>
			</div>
			<div class="row">
				<div class="col-md-3">Alamat</div>
				<div class="col-md-7">: {{$data->p_alamat}}</div>
			</div>
			<br>
			<p>Hubungan dengan yang meninggal : Anak Kandung</p>	
		</div>
@endsection

@section('kanan')
	<p>Dibuat Di &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Warnajati</p>
	<p><u>Pada Tanggal	&nbsp;: {{date('d M Y')}}</u></p>
	<br>
	<div class="center">
		<p>a.n Kepala Desa Warnajati</p>
		<p>{{$user->roles->first()->deskripsi}}</p>
		<br><br><br><br>
		<h4><u>{{$user->name}}</u></h4>
	</div>
@endsection