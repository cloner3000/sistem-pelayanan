<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Surat Pengaduan | {{$data->nama}}</title>
	<style type="text/css" media="screen">
		h1,h2,h3,h4,h5,h6{
			padding: none;
			margin:none;
		}
		p{
			margin-top: 0px;
			padding-top: 0px;
			margin-bottom: 0px;
			padding-bottom: 0px;
		}
		.ttd{
			margin-top: 50px;
		}
		.judul{
			margin-bottom: 5px;
			margin-top: 10px;
			text-align: center;
		}
		.header li{
			list-style: none;
			margin-left: -30px;
		}
		.row {
			margin-right: -15px;
			margin-left: -15px;
		}
		.row:after{
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

		img{
			width:80px;
			height: auto;
		}

		hr{
			border-bottom: 3px solid;
		}
		.content{
			padding-left: 30px;
		}	
	</style>
</head>
<body>
	<div class="container">
		<br>
		<div class="row">
			<div class="col-md-8"></div>
			<div class="col-md-4">
				Sukabumi, {{date('d ',strtotime($data->created_at)).bulan(date('m',strtotime($data->created_at))).date(' Y',strtotime($data->created_at))}}
			</div>
		</div>
		<br><br><br>
		<p>Dengan Hormat,</p>
		<br>
		<p>Saya yang bertanda tangan dibawah ini ingin menyampaikan pengaduan/aspirasi sebagai berikut :</p>
		<br>

		<div class="content">
			<div class="row">
				<div class="col-md-3">Nama Lengkap</div>
				<div class="col-md-5">: <strong>{{ucfirst($data->nama)}}</strong></div>
			</div>
			<div class="row">
				<div class="col-md-3">NIK</div>
				<div class="col-md-5">: {{$data->nik}}</div>
			</div>
			<div class="row">
				<div class="col-md-3">Tanggal lahir</div>
				<div class="col-md-5">: {{date('d-m-Y',strtotime($data->tanggal_lahir))}}</div>
			</div>
			<div class="row">
				<div class="col-md-3">Pekerjaan</div>
				<div class="col-md-5">: {{ucfirst($data->pekerjaan)}}</div>
			</div>
			<div class="row">
				<div class="col-md-3">Alamat</div>
				<div class="col-md-7">: {{$data->alamat}}</div>
			</div>
			<div class="row">
				<div class="col-md-3">Sasaran</div>
				<div class="col-md-7">: {{$data->sasaran}}</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-3">Isi Pengaduan</div>
				<div class="col-md-8">: {{$data->isi}}</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-3">Alternatif Pengaduan</div>
				<div class="col-md-8">: {{$data->alternatif}}</div>
			</div>
		</div>
		
		<br><br><br><br>
		<div class="row">
			<div class="col-md-7"></div>
			<div class="col-md-4">
				<p class="center">Sukabumi,{{date('d ',strtotime($data->created_at)).bulan(date('m',strtotime($data->created_at))).date(' Y',strtotime($data->created_at))}}</p>
				<br>
				<p class="center">Pengadu,</p>
				<br><br><br><br><br><br>
				<p class="center"><strong>{{ucfirst($data->nama)}}</strong></p>
			</div>
		</div>
	</div>
</body>
</html>
