<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Surat Keterangan Pindah</title>
	<style type="text/css" media="screen">
		.judul{
			margin-bottom: 5px;
			text-align: center;
		}
		.header{
			border:1px solid;
		}
		.header li{
			list-style: none;
			margin-left: -30px;
		}
		.row {
			margin-right: -15px;
			margin-left: -15px;
		}
		.clear{
			clear: both;
		}
		.border{
			border:1px solid;
		}
		table {
			border-collapse: collapse;
			text-align: center;
			width: 100%;
		}
		table, th, td {
			border: 1px solid black;
		}
		.spacing{
			height: 100px;
		}
		.center{
			margin: auto;
			text-align: center;
		}
		.col-xs-1, .col-sm-1, .col-md-1, .col-lg-1, .col-xs-2, .col-sm-2, .col-md-2, .col-lg-2, .col-xs-3, .col-sm-3, 
		.col-md-3, .col-lg-3, .col-xs-4, .col-sm-4, .col-md-4, .col-lg-4, .col-xs-5, .col-sm-5, .col-md-5, .col-lg-5, 
		.col-xs-6, .col-sm-6, .col-md-6, .col-lg-6, .col-xs-7, .col-sm-7, .col-md-7, .col-lg-7, .col-xs-8, .col-sm-8, 
		.col-md-8, .col-lg-8, .col-xs-9, .col-sm-9, .col-md-9, .col-lg-9, .col-xs-10, .col-sm-10, .col-md-10, 
		.col-lg-10, .col-xs-11, .col-sm-11, .col-md-11, .col-lg-11, .col-xs-12, .col-sm-12, .col-md-12, .col-lg-12 {
			position: relative;
			min-height: 1px;
			padding-right: 15px;
			padding-left: 15px;
		}
		.col-md-1, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-10, 
		.col-md-11, .col-md-12 {
			float: left;
		}
		.col-md-12 {
			width: 100%;
		}
		.col-md-11 {
			width: 91.66666667%;
		}
		.col-md-10 {
			width: 83.33333333%;
		}
		.col-md-9 {
			width: 75%;
		}
		.col-md-8 {
			width: 66.66666667%;
		}
		.col-md-7 {
			width: 58.33333333%;
		}
		.col-md-6 {
			width: 50%;
		}
		.col-md-5 {
			width: 41.66666667%;
		}
		.col-md-4 {
			width: 33.33333333%;
		}
		.col-md-3 {
			width: 25%;
		}
		.col-md-2 {
			width: 16.66666667%;
		}
		.col-md-1 {
			width: 8.33333333%;
		}			
	</style>
</head>
<body>
	<div class="container tengah">
		<div class="tengah" style="text-align: center;">
			<h3 class="judul" style="margin-left: 40px;">SURAT PENGANTAR PINDAH</h3>
			<h3 class="judul" style="margin-left: 20px;margin-top: -5px;">
				<u>ANTAR KABUPATEN/KOTA ATAU ANTAR PROVINSI</u>
			</h3>
			<span>NOMOR:.......................</span>
		</div>
	</div>
	<br>
	<br>

	<div class="container">
		<p>Yang bertanda tangan di bawah ini, menerangkan Permohonan Pindah Penduduk WNI dengan data sebagai berikut :</p>
		
		<div class="row">
			<div class="col-md-5">
				<span>1. NIK</span>
				<br>
				<span>2. Nama Lengkap</span>
				<br>
				<span>3. Nomor Kartu Keluarga</span>
				<br>
				<span>4. Nama Kepala Keluarga</span>
				<br>
				<span>5. Alamat Sekarang</span>
				<br>
				<span>6. Alamat Tujuan Pindah</span>
				<br>
				<span>7. Jumlah Keluarga Yang Pindah</span>
			</div>
			<div class="col-md-7">
				<span>: {{$data->nik}}</span>
				<br>
				<span>: {{$data->nama}}</span>
				<br>
				<span>: {{$data->no_kk}}</span>
				<br>
				<span>: {{$data->kepala_keluarga}}</span>
				<br>
				<span>: {{$data->alamat_sekarang}}</span>
				<br>
				<span>: {{$data->alamat_tujuan}}</span>
				<br>
				<span>: {{$data->jumlah_pindah}} Orang</span>
			</div>
		</div>
		<div class="clear"></div>
		<br>
		<p>Adapun Permohonan Pindah Penduduk WNI yang bersangkutan sebagaimana terlampir. Demikian Surat Pengantar Pindah ini dibuat agar digunakan sebagaimana mestinya.</p>
		<br>
		<br>
		<br>
		<br>
		<div style="float: right;">
			<span>Warnajati,{{$data->created_at->format('d-m-Y')}}</span>
			<br>
			<span style="margin-left: 20px;">Camat Cibadak,</span>
			<br>
			<br>
			<br>
			<br>
			<br>
			<span style="margin-left: 20px;">______________</span>
			<br>
		</div>
	</div>
</body>
</html>