<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>KTP | {{$data->nama}}</title>
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
		.right{
			width:85%;
		}
	</style>
</head>
<body>
	<div class="container">
		<h3 class="judul">FORMULIR PERMOHONAN KARTU TANDA PENDUDUK (KTP)</h3>
		<ul class="header">
			<li>Perhatian :</li>
			<li>1.Harap diisi dengan HURUF CETAK dan menggunakan TINTA HITAM</li>
			<li>2.Untuk kolom pilihan, harap diberi tanda (X) pada kotak pilihan</li>
			<li>3.Setelah Formulir ini diidi dan ditandatangani, harap diserahkan kembali ke kantor Desa Warnajati</li>
		</ul>
		
		<div class="row">
			<div class="col-md-4">
				<span>PEMERINTAH PROVINSI</span>
				<br>
				<span>PEMERINTAH KABUPATEN</span>
				<br>
				<span>KECAMATAN</span>
				<br>
				<span>DESA</span>
				<br>
				<span>PERMOHONAN KTP</span>
			</div>
			<div class="col-md-3">
				<span>3</span><span>2</span>
				<br>
				<span>0</span><span>2</span>
				<br>
				<span>1</span><span>1</span>
				<br>
				<span>-</span>
				<br>
				<span>-</span>
			</div>
			<div class="col-md-5">
				<span>JAWA BARAT</span>
				<br>
				<span>SUKABUMI</span>
				<br>
				<span>CIBADAK</span>
				<br>
				<span>WARNAJATI</span>
			</div>
		</div>
		<div class="clear"></div>
		<br>
		<br>
		<div class="row">
			<div class="col-md-3">
				<span>Nama Lengkap Pemohon</span>
				<br>
				<span>No KK Semula</span>
				<br>
				<span>NIK Pemohon</span>
				<br>
				<span>Alamat Pemohon</span>
			</div>
			<div class="col-md-9">
				<span>{{$data->nama}}</span>
				<br>
				<span>{{$data->nik}}</span>
				<br>
				<span>{{$data->no_kk}}</span>
				<br>
				<span>{{$data->alamat}}</span>
			</div>
		</div>
		<div class="clear"></div>
		<br>
		<br>
		<div class="row">
			<div class="col-md-6">
				<table>
					<thead>
						<tr>
							<th>Pas Photo</th>
							<th>Cap Jempol</th>
							<th>Specimen Tanda Tangan</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="spacing"></td>
							<td class="spacing"></td>
							<td class="spacing"></td>
						</tr>
					</tbody>

				</table>
			</div>
			<div class="col-md-6 ">
				<div class="right center">
					<span>Warnajati, {{(date('d',strtotime($data->created_at)).' '.bulan(date('m',strtotime($data->created_at))).' '.date('Y',strtotime($data->created_at)))}}</span>
					<br>
					<span>Pemohon</span>
					<br>
					<br>
					<br>
					<span>(  {{$data->nama}}  )</span>
					<br>
					<br>
					<span>Mengetahui</span>
					<br>
					<span>a.n Kepala Desa Warnajati</span>
					<br>
					<span>{{$user->roles->first()->deskripsi}},</span>
					<br>
					<br>
					<br>
					<span>(  {{$user->name}}  )</span>
				</div>
			</div>
		</div>
	</div>
</body>
</html>