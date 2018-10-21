<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>SKK | {{$data->b_nama}}</title>
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
			text-align: left;
			width: 100%;
		}
		table {
			border: 1px solid black;
		}
		td{
			text-align: left;
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
		.width-30{
			width: 30%;
		}
		.width{
			width: 70%;
		}	
		td{
			font-size: 13px;
		}		
	</style>
</head>
<body>
	<div class="container">
		<div class="col-md-4">
			<span>Pemerintah Desa / Kelurahan</span>
			<br>
			<span>Kecamatan</span>
			<br>
			<span>Kabupaten / Kota</span>
			<br>
		</div>
		<div class="col-md-8">
			<span>: Warnajati</span>
			<br>
			<span>: Cibadak</span>
			<br>
			<span>: Sukabumi</span>
			<br>
		</div>
		<div class="clear"></div>
	</div>

	<div class="container tengah">
		<div class="tengah" style="text-align: center;">
			<h3 class="judul" style="margin-left: 30px;">
				SURAT KETERANGAN KELAHIRAN
			</h3>
		</div>
	</div>
	<br>

	<div class="container">
		<div class="col-md-4">
			<span>Nama Kepala Keluarga</span>
			<br>
			<span>No Kartu Keluarga</span>
		</div>
		<div class="col-md-8">
			<span>: {{$data->a_nama}}</span>
			<br>
			<span>: {{$data->a_nik}}</span>
		</div>
		<div class="clear"></div>
	</div>

	<div class="container">

		<table>
			<tr>
				<td colspan="2"><strong>BAYI / ANAK</strong></td>
			</tr>
			<tr>
				<td class="width-30">1. Nama</td>
				<td class="width-70">: {{$data->b_nama}}</td>
			</tr>
			<tr>
				<td class="width-30">2. Jenis Kelamin</td>
				<td class="width-70">: {{$data->b_jenis_kelamin}}</td>
			</tr>
			<tr>
				<td class="width-30">3. Hari</td>
				<td class="width-70">: {{date('D',strtotime($data->tanggal))}}</td>
			</tr>
			<tr>
				<td class="width-30">4. Tempat Tanggal Lahir</td>
				<td class="width-70">: {{$data->b_tempat}},{{date('d-m-Y',strtotime($data->tanggal))}}</td>
			</tr>
			<tr>
				<td class="width-30">5. Pukul</td>
				<td class="width-70">l</td>
			</tr>
			<tr>
				<td class="width-30">6. Jenis Kelahiran</td>
				<td class="width-70">: {{$data->b_jenis_kelahiran}}</td>
			</tr>
			<tr>
				<td class="width-30">7. Kelahiran Ke</td>
				<td class="width-70">: {{$data->b_kelahiran_ke}}</td>
			</tr>
			<tr>
				<td class="width-30">8. Berat / Panjang</td>
				<td class="width-70">: {{$data->b_berat}} KG, {{$data->b_berat}} CM</td>
			</tr>
		</table>

		<table>
			<tr>
				<td colspan="2"><strong>IBU</strong></td>
			</tr>
			<tr>
				<td class="width-30">1. NIK</td>
				<td class="width-70">: {{$data->i_nik}}</td>
			</tr>
			<tr>
				<td class="width-30">2. Nama Lengkap</td>
				<td class="width-70">: {{$data->i_nama}}</td>
			</tr>
			<tr>
				<td class="width-30">3. Tanggal Lahir / Umur</td>
				<td class="width-70">: {{date('d-m-Y',strtotime($data->i_tanggal_lahir))}}</td>
			</tr>
			<tr>
				<td class="width-30">4. Pekerjaan</td>
				<td class="width-70">: {{$data->i_pekerjaan }}</td>
			</tr>
			<tr>
				<td class="width-30">5. Alamat</td>
				<td class="width-70">: {{$data->i_alamat}}</td>
			</tr>
			<tr>
				<td class="width-30">6. Kewarganegaraan</td>
				<td class="width-70">: {{$data->i_kewarganegaraan}}</td>
			</tr>
			<tr>
				<td class="width-30">7. Kebangsan</td>
				<td class="width-70">: {{$data->i_kebangsaan }}</td>
			</tr>
			<tr>
				<td class="width-30">8. Tgl Pencatatan Perkawinan</td>
				<td class="width-70">: {{date('d-m-Y',strtotime($data->i_tanggal_perkawinan))}}</td>
			</tr>
		</table>

		<table>
			<tr>
				<td colspan="2"><strong>AYAH</strong></td>
			</tr>
			<tr>
				<td class="width-30">1. NIK</td>
				<td class="width-70">: {{$data->a_nik}}</td>
			</tr>
			<tr>
				<td class="width-30">2. Nama Lengkap</td>
				<td class="width-70">: {{$data->a_nama}}</td>
			</tr>
			<tr>
				<td class="width-30">3. Tanggal Lahir / Umur</td>
				<td class="width-70">: {{date('d-m-Y',strtotime($data->a_tanggal_lahir))}}</td>
			</tr>
			<tr>
				<td class="width-30">4. Pekerjaan</td>
				<td class="width-70">: {{$data->a_pekerjaan }}</td>
			</tr>
			<tr>
				<td class="width-30">5. Alamat</td>
				<td class="width-70">: {{$data->a_alamat}}</td>
			</tr>
			<tr>
				<td class="width-30">6. Kewarganegaraan</td>
				<td class="width-70">: {{$data->a_kewarganegaraan}}</td>
			</tr>
			<tr>
				<td class="width-30">7. Kebangsan</td>
				<td class="width-70">: {{$data->a_kebangsaan }}</td>
			</tr>
			<tr>
				<td class="width-30">8. Tgl Pencatatan Perkawinan</td>
				<td class="width-70">: {{date('d-m-Y',strtotime($data->a_tanggal_perkawinan))}}</td>
			</tr>
		</table>

		<table>
			<tr>
				<td colspan="2"><strong>PELAPOR</strong></td>
			</tr>
			<tr>
				<td class="width-30">1. NIK</td>
				<td class="width-70">: {{$data->p_nik}}</td>
			</tr>
			<tr>
				<td class="width-30">2. Nama Lengkap</td>
				<td class="width-70">: {{$data->p_nama}}</td>
			</tr>
			<tr>
				<td class="width-30">3. Umur</td>
				<td class="width-70">: {{$data->p_umur}}</td>
			</tr>
			<tr>
				<td class="width-30">4. Jenis Kelamin</td>
				<td class="width-70">: {{$data->p_jenis_kelamin }}</td>
			</tr>
			<tr>
				<td class="width-30">5. Pekerjaan</td>
				<td class="width-70">: {{$data->p_pekerjaan}}</td>
			</tr>
			<tr>
				<td class="width-30">6. Alamat</td>
				<td class="width-70">: {{$data->p_alamat}}</td>
			</tr>
		</table>

		<table>
			<tr>
				<td colspan="2"><strong>SAKSI I</strong></td>
			</tr>
			<tr>
				<td class="width-30">1. NIK</td>
				<td class="width-70">: {{$data->s1_nik}}</td>
			</tr>
			<tr>
				<td class="width-30">2. Nama Lengkap</td>
				<td class="width-70">: {{$data->s1_nama}}</td>
			</tr>
			<tr>
				<td class="width-30">3. Umur</td>
				<td class="width-70">: {{$data->s1_umur}}</td>
			</tr>
			<tr>
				<td class="width-30">4. Pekerjaan</td>
				<td class="width-70">: {{$data->s1_pekerjaan}}</td>
			</tr>
			<tr>
				<td class="width-30">5. Alamat</td>
				<td class="width-70">: {{$data->s1_alamat}}</td>
			</tr>
		</table>

		<table>
			<tr>
				<td colspan="2"><strong>SAKSI II</strong></td>
			</tr>
			<tr>
				<td class="width-30">1. NIK</td>
				<td class="width-70">: {{$data->s2_nik}}</td>
			</tr>
			<tr>
				<td class="width-30">2. Nama Lengkap</td>
				<td class="width-70">: {{$data->s2_nama}}</td>
			</tr>
			<tr>
				<td class="width-30">3. Umur</td>
				<td class="width-70">: {{$data->s2_umur}}</td>
			</tr>
			<tr>
				<td class="width-30">4. Pekerjaan</td>
				<td class="width-70">: {{$data->s2_pekerjaan}}</td>
			</tr>
			<tr>
				<td class="width-30">5. Alamat</td>
				<td class="width-70">: {{$data->s2_alamat}}</td>
			</tr>
		</table>
		<br>
		<br>
		<div class="row" style="font-size: 13px;">
			<div class="col-md-7">
				<span><strong><u>Persyaratan :</u></strong></span>
				<br>
				<div style="margin-left: 10px;">
					<span>1. Foto Copy KK terbatu</span>
					<br>
					<span>2. Foto Copy KTP Orang Tua</span>
					<br>
					<span>3. Foto Copy Surat Nikah</span>
					<br>
					<span>4. Surat Keterangan Pengakuan Nikah Diatas Materai, Ada Saksi dan Diketahui Oleh Kepala Desa / Kelurahan Bagi Yang Tidak Ada Surat Nikah</span>
					<br>
					<span>5. Keterangan Lahir Asli Dari Bidan / Rumah Sakit</span>
					<br>
					<span>6. Foto Copy KTP 2(dua) Orang Saksi</span>
					<br>
					<span>7. Surat Kuasa Diatas MAterai 6000 Bagi Yang Permohonannya Dikuasakan</span>
					<br>
				</div>
			</div>
			<div class="col-md-5">
				<div style="text-align: center;">
					<span>Warnajati,{{$data->created_at->format('d-m-Y')}}</span>
					<br>
					<span>Pelapor</span>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<span>{{$data->p_nama}}</span>
				</div>
			</div>
		</div>

	</div>
</body>
</html>