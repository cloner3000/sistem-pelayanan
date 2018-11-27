@extends('pdf.kades.master')

@section('judul','Surat Keterangan')

@section('nomor')
	<h5><u>SURAT KETERANGAN TIDAK MAMPU</u></h5>
	<p>Nomor : 421/.../{{romawi($data->created_at->format('m'))}}/{{$data->created_at->format('Y')}}</p>
@endsection

@section('isi')
	<p>Kepala Desa Warnajati Kecamatan Cibadak Kabupaten Sukabumi menerangkan bahwa :</p>
	<br>

	<div class="content">
		<div class="row">
			<div class="col-md-2">Nama</div>
			<div class="col-md-9">: <strong>{{$data->nama}}</strong></div>
		</div>
		<div class="row">
			<div class="col-md-2">Jenis Kelamin</div>
			<div class="col-md-9">: {{$data->jenis_kelamin}}</div>
		</div>
		<div class="row">
			<div class="col-md-2">NIK</div>
			<div class="col-md-9">: {{$data->nik}}</div>
		</div>
		<div class="row">
			<div class="col-md-2">Tempat Tgl. Lahir</div>
			<div class="col-md-9">: {{$data->tempat}},{{date('d-m-Y',strtotime($data->tanggal))}}</div>
		</div>
		<div class="row">
			<div class="col-md-2">Kewarganegaraan</div>
			<div class="col-md-9">: {{$data->kewarganegaraan}}</div>
		</div>
		<div class="row">
			<div class="col-md-2">Agama</div>
			<div class="col-md-9">: {{$data->agama}}</div>
		</div>
		<div class="row">
			<div class="col-md-2">Pekerjaan</div>
			<div class="col-md-9">: {{ucfirst($data->pekerjaan)}}</div>
		</div>
		<div class="row">
			<div class="col-md-2">Alamat</div>
			<div class="col-md-9">: {{$data->alamat}}</div>
		</div>
	</div>

	<br><p>Adalah benar warga kami yang memohon Surat Keterangan Tidak Mampu kepada kami dalam rangka melengkapi persyaratan  <strong>{{$data->keperluan}}</strong></p><br>

	<br><p>Keterangan ini kami berikan kepadanya, dengan berdasarkan sepengetahuan dan pertimbangan bahwa :</p><br>
	
	<div class="content">
		<p>1. Surat pengantar dari Ketua RT/RW</p>
		<p>2. Nama tersebut di atas adalah benar Warga Desa Warnajati anak kandung dari Bapak <strong>{{$data->n_ayah}}</strong> dan Ibu <strong>{{$data->n_ibu}}</strong> yang tergolong keluarga tidak mampu.</p>
	</div>

	<br><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Demikian keterangan ini dibuat agar dapat dipergunakan sebagaimana mestinya sesuai dengan peruntukannya dan dimohon kepada pihak yang bersangkutan kiranya dapat memberikan bantuan serta agar maklum.</p>
	<br><br>

@endsection

@section('kanan')
	<p>Dibuat Di &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Warnajati</p>
	<p><u>Pada Tanggal	&nbsp;: {{date('d M Y')}}</u></p>
	<br>
	<div class="center">
		<p>Kepala Desa Warnajati</p>
		<br><br><br><br>
		<h4><u>DEDE Abdullah,S.HI</u></h4>
	</div>
	<br><br><br><br><br><br>
@endsection