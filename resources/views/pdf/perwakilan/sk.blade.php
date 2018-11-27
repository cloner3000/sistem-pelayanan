@extends('pdf.perwakilan.master')
@section('judul','Surat Keterangan')

@section('nomor')
	<h5><u>SURAT KETERANGAN</u></h5>
	<p>Nomor : 470/.../XI/2018</p>
@endsection

@section('isi')
	<p>Sekretaris Desa Warnajati Kecamatan Cibadak Kabupaten Sukabumi menerangkan bahwa :</p>
	<br>

	<div class="content">
		<div class="row">
			<div class="col-md-2">Nama</div>
			<div class="col-md-9">: <strong>OCIH</strong></div>
		</div>
		<div class="row">
			<div class="col-md-2">Jenis Kelamin</div>
			<div class="col-md-9">: Laki-laki</div>
		</div>
		<div class="row">
			<div class="col-md-2">NIK</div>
			<div class="col-md-9">: 038483748738748</div>
		</div>
		<div class="row">
			<div class="col-md-2">Tgl. Lahir/Umur</div>
			<div class="col-md-9">: 52 Tahun</div>
		</div>
		<div class="row">
			<div class="col-md-2">Kewarganegaraan</div>
			<div class="col-md-9">: Indonesia</div>
		</div>
		<div class="row">
			<div class="col-md-2">Agama</div>
			<div class="col-md-9">: Islam</div>
		</div>
		<div class="row">
			<div class="col-md-2">Pekerjaan</div>
			<div class="col-md-9">: Mengurus Rumah Tangga</div>
		</div>
		<div class="row">
			<div class="col-md-2">Alamat</div>
			<div class="col-md-9">: Jl Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error sunt unde laudantium, nostrum sequi doloremque assumenda illo consequatur consectetur</div>
		</div>
	</div>

	<br><p>Nama tersebut di atas memohon keterangan :</p><br>

	<div class="center">
		<h4>========== DOMISILI TEMPAT TINGGAL ==========</h4>
	</div>

	<br><br>
	<p>Keterangan ini dibuat dalam rangka melengkapi persyaratan administrasi <strong>Bepergian keluar kota</strong>.</p>
	<p>Keterangan ini kami berikan kepadanya, dengan berdasarkan sepengetahuan dan pertimbangan bahwa :</p>
	<p>1. Surat pengantar dari Ketua RT/RW</p>
	<p>2. Nama tersebut di atas adalah benar Warga Desa Warnajati Kecamatan Cibadak Kabupaten Sukabumi.</p>
	<br>
	<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Demikian keterangan ini dibuat agar dapat dipergunakan sebagaimana mestinya sesuai dengan peruntukannya dan dimohon kepada pihak yang bersangkutan kiranya dapat memberikan bantuan serta agar maklum.</p>
	<br><br><br>

@endsection

@section('kanan')
	<p>Dibuat Di &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Warnajati</p>
	<p><u>Pada Tanggal	&nbsp;: {{date('d M Y')}}</u></p>
	<br>
	<div class="center">
		<p>a.n Kepala Desa Warnajati</p>
		<p>Kasi Pelayanan</p>
		<br><br><br><br>
		<h4><u>DEDE Abdullah,S.HI</u></h4>
	</div>
@endsection