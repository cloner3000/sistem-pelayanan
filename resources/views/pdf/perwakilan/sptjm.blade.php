<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>SPTJM | {{ucfirst($data->nama)}}</title>
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
			<h3 class="judul" style="margin-left: 30px;">
				SURAT PERNYATAAN TANGGUNG JAWAB (SPTJM)
			</h3>
			<h3 class="judul" style="margin-left: 20px;margin-top: -5px;">
				KEBENARAN SEBAGAI PASANGAN SUAMI ISTRI
			</h3>
		</div>
	</div>
	<br>
	<br>
	<div class="container">
		<span>Saya yang bertanda tangan dibawah ini:</span>
		<div class="row">
			<div class="col-md-3">
				<div style="margin-left: 20px;">
					<span>Nama</span>
					<br>
					<span>NIK</span>
					<br>
					<span>Tempat/Tanggal lahir</span>
					<br>
					<span>Pekerjaan</span>
					<br>
					<span>Alamat</span>
				</div>
			</div>
			<div class="col-md-9">
				<span>: {{ucfirst($data->nama)}}</span>
				<br>
				<span>: {{$data->nik}}</span>
				<br>
				<span>: {{ucfirst($data->tempat)}},{{(date('d',strtotime($data->tanggal)).' '.bulan(date('m',strtotime($data->tanggal))).' '.date('Y',strtotime($data->tanggal)))}}</span>
				<br>
				<span>: {{ucfirst($data->pekerjaan)}}</span>
				<br>
				<span>: {{$data->alamat}}</span>
			</div>
		</div>
		<div class="clear"></div>

		<br>

		<span>Menyatakan Bahwa:</span>
		<div class="row">
			<div class="col-md-3">
				<div style="margin-left: 20px;">
					<span>Nama</span>
					<br>
					<span>NIK</span>
					<br>
					<span>Tempat/Tanggal lahir</span>
					<br>
					<span>Pekerjaan</span>
					<br>
					<span>Alamat</span>
				</div>
			</div>
			<div class="col-md-9">
				<span>: {{ucfirst($data->nama1)}}</span>
				<br>
				<span>: {{$data->nik1}}</span>
				<br>
				<span>: {{ucfirst($data->tempat1)}},{{(date('d',strtotime($data->tanggal1)).' '.bulan(date('m',strtotime($data->tanggal1))).' '.date('Y',strtotime($data->tanggal1)))}}</span>
				<br>
				<span>: {{ucfirst($data->pekerjaan1)}}</span>
				<br>
				<span>: {{$data->alamat1}}</span>
			</div>
		</div>
		<div class="clear"></div>
		<br>

		<span>Adalah {{ucfirst($data->hubungan)}} dari</span>

		<div class="row">
			<div class="col-md-3">
				<div style="margin-left: 20px;">
					<span>Nama</span>
					<br>
					<span>NIK</span>
					<br>
					<span>Tempat/Tanggal lahir</span>
					<br>
					<span>Pekerjaan</span>
					<br>
					<span>Alamat</span>
				</div>
			</div>
			<div class="col-md-9">
				<span>: {{ucfirst($data->nama2)}}</span>
				<br>
				<span>: {{$data->nik2}}</span>
				<br>
				<span>: {{ucfirst($data->tempat2)}},{{(date('d',strtotime($data->tanggal2)).' '.bulan(date('m',strtotime($data->tanggal2))).' '.date('Y',strtotime($data->tanggal2)))}}</span>
				<br>
				<span>: {{ucfirst($data->pekerjaan2)}}</span>
				<br>
				<span>: {{$data->alamat2}}</span>
			</div>
		</div>
		<div class="clear"></div>

		<br>

		@if(!empty($data->name))
			<span>Dan memiliki Anak</span>

			<div class="row">
				<div class="col-md-3">
					<div style="margin-left: 20px;">
						<span>Nama</span>
						<br>
						<span>Tempat/Tanggal lahir</span>
						<br>
						<span>Pekerjaan</span>
						<br>
						<span>Alamat</span>
					</div>
				</div>
				<div class="col-md-9">
					<span>: {{ucfirst($data->nama_anak)}}</span>
					<br>
					<span>: {{ucfirst($data->tempat_anak)}},{{(date('d',strtotime($data->tempat_anak)).' '.bulan(date('m',strtotime($data->tempat_anak))).' '.date('Y',strtotime($data->tempat_anak)))}}</span>
					<br>
					<span>: {{ucfirst($data->pekerjaan_anak)}}</span>
					<br>
					<span>: {{$data->alamat_anak}}</span>
				</div>
			</div>
			<div class="clear"></div>
		@endif

		<br>
		<span>sebagaimana tercantum dalam Kartu Keluarga (KK) Nomor &nbsp;:&nbsp;{{$data->no_kk}}</span>
		<br><br>
		<span><span style="margin-left: 20px;">Demikian surat pernyataan ini saya buat dengan sebenar-benarnya dan apabila dikemudian hari </span>ternyata pernyataan saya ini tidak benar, maka saya bersedian diproses secara hukum sesuai dengan peraturan perundang-undangan dan sokumen yang diterbitkan dari pernyataan ini menjadi tidak sah.</span>
		<br>
		<br>
		<br>

		<div class="row">
			<div class="col-md-6">
				<br>
				<span>Saksi I</span>
				<br><br><br><br><br>
				<span>({{ucfirst($data->s1_nama)}})</span>
				<br>
				<span>NIK : {{$data->s1_nik}}</span>
			</div>
			<div class="col-md-6">
				<span>Warnajati, {{(date('d',strtotime($data->created_at)).' '.bulan(date('m',strtotime($data->created_at))).' '.date('Y',strtotime($data->created_at)))}}</span>
				<br>
				<span>Saya yang menyatakan,</span>
				<br><br><br><br><br>
				<span>({{ucfirst($data->nama)}})</span>
			</div>
		</div>
		<div class="clear"></div>
		<br>
		<br>

		<span>Saksi II</span>
		<br><br><br><br><br>
		<span>({{ucfirst($data->s2_nama)}})</span>
		<br>
		<span>NIK : {{$data->s2_nik}}</span>
		<br><br><br><br><br>

		<div class="container">
			<span>Keterangan :</span>
			<br>
			<span>Lampiran ini digunakan dalam hal perkawinan tidak dapat dibuktikan dengan akta perkawinan atau akta nikah.</span>
		</div>
	</div>
</body>
</html>