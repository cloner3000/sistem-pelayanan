@extends('pdf.kades.master')
@section('judul','Surat Keterangan Kelahiran | '.$data->nama)

@section('nomor')
	<h5><u>SURAT KETERANGAN KENAL LAHIR</u></h5>
	<p>Nomor : 474.1/.../XI/2018</p>
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
			<div class="col-md-2">Tgl. Lahir/Umur</div>
			<div class="col-md-9">: 52 Tahun</div>
		</div>
		<div class="row">
			<div class="col-md-2">Pekerjaan</div>
			<div class="col-md-9">: Mengurus Rumah Tangga</div>
		</div>
		<div class="row">
			<div class="col-md-2">Alamat</div>
			<div class="col-md-9">: Jl Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error sunt unde laudantium, nostrum sequi doloremque assumenda illo consequatur consectetur</div>
		</div>

		<br><p>Isteri dari :</p><br>
		
		<div class="row">
			<div class="col-md-2">Nama</div>
			<div class="col-md-9">: <strong>OCIH</strong></div>
		</div>
		<div class="row">
			<div class="col-md-2">Tgl. Lahir/Umur</div>
			<div class="col-md-9">: 52 Tahun</div>
		</div>
		<div class="row">
			<div class="col-md-2">Pekerjaan</div>
			<div class="col-md-9">: Mengurus Rumah Tangga</div>
		</div>
		<div class="row">
			<div class="col-md-2">Alamat</div>
			<div class="col-md-9">: Jl Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error sunt unde laudantium</div>
		</div>
	</div>

	<br><p>Pada Tanggal <strong>01-05-1980</strong> telah melahirkan seorang anak jenis kelamin Perempuan, anak ke 3 (tiga) dan diberi nama :</p>

	<div class="center">
		<h4>========== Elih Rosmiati ==========</h4>
	</div>

	<br>

	<p>Dengan disaksikan oleh :</p>
	
	<br>

	<div class="content">
		<div class="row">
			<div class="col-md-2"><span style="margin-left:-20px;">1.</span><span style="margin-left: 10px;">Nama</span></div>
			<div class="col-md-7">: OCIH</div>
		</div>
		<div class="row">
			<div class="col-md-2">Tgl. Lahir/Umur</div>
			<div class="col-md-7">: 52 Tahun</div>
		</div>
		<div class="row">
			<div class="col-md-2">Agama</div>
			<div class="col-md-7">: Islam</div>
		</div>
		<div class="row">
			<div class="col-md-2">Pekerjaan</div>
			<div class="col-md-7">: Mengurus Rumah Tangga</div>
		</div>
		<div class="row">
			<div class="col-md-2">Alamat</div>
			<div class="col-md-7">: Jl Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error sunt unde laudantium</div>
		</div>
		
		<br>

		<div class="row">
			<div class="col-md-2"><span style="margin-left:-20px;">2.</span><span style="margin-left: 10px;">Nama</span></div>
			<div class="col-md-7">: OCIH</div>
		</div>
		<div class="row">
			<div class="col-md-2">Tgl. Lahir/Umur</div>
			<div class="col-md-7">: 52 Tahun</div>
		</div>
		<div class="row">
			<div class="col-md-2">Agama</div>
			<div class="col-md-7">: Islam</div>
		</div>
		<div class="row">
			<div class="col-md-2">Pekerjaan</div>
			<div class="col-md-7">: Mengurus Rumah Tangga</div>
		</div>
		<div class="row">
			<div class="col-md-2">Alamat</div>
			<div class="col-md-7">: Jl Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error sunt unde laudantium</div>
		</div>
	</div>
	
	<br>
	<p>Demikian Surat Keterangan Kenal Lahir ini dibuat untuk dipergunakan sebagaimana mestinya, sesuai peruntukannya.</p>
	<br>

@endsection

@section('kiri')
	<br><p>Tanda tangan saksi :  </p><br>
	<br><p>1. .........</p><br>
	<br><p>2. .........</p><br>
@endsection

@section('kanan')
	<p>Dibuat Di &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Warnajati</p>
	<p><u>Pada Tanggal	&nbsp;: {{date('d M Y')}}</u></p>
	<br>
	<div class="center">
		<p>a.n Sekretaris Desa Warnajati</p>
		<p>Kasi Pelayanan</p>
		<br><br><br><br>
		<h4><u>DEDE Abdullah,S.HI</u></h4>
	</div>
@endsection