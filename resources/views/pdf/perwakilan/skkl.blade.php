@extends('pdf.perwakilan.master')
@section('judul','Surat Keterangan Kelahiran | '.$data->nama)

@section('nomor')
	<h5><u>SURAT KETERANGAN KENAL LAHIR</u></h5>
	<p>Nomor : 474.1/{{$data->id}}/{{romawi(date('m',strtotime($data->created_at)))}}/{{date('Y',strtotime($data->created_at))}}</p>
@endsection

@section('isi')
	<p>Sekretaris Desa Warnajati Kecamatan Cibadak Kabupaten Sukabumi menerangkan bahwa :</p>
	<br>

	<div class="content">
		<div class="row">
			<div class="col-md-2">Nama</div>
			<div class="col-md-9">: <strong>{{$data->i_nik}}</strong></div>
		</div>
		<div class="row">
			<div class="col-md-2">Tgl. Lahir/Umur</div>
			<div class="col-md-9">: {{(date('d',strtotime($data->i_tanggal_lahir)).' '.bulan(date('m',strtotime($data->i_tanggal_lahir))).' '.date('Y',strtotime($data->i_tanggal_lahir)))}}</div>
		</div>
		<div class="row">
			<div class="col-md-2">Pekerjaan</div>
			<div class="col-md-9">: {{ucfirst($data->i_pekerjaan) }}</div>
		</div>
		<div class="row">
			<div class="col-md-2">Alamat</div>
			<div class="col-md-9">: {{$data->i_alamat}}</div>
		</div>

		<br><p>Isteri dari :</p><br>
		
		<div class="row">
			<div class="col-md-2">Nama</div>
			<div class="col-md-9">: <strong>{{$data->a_nama}}</strong></div>
		</div>
		<div class="row">
			<div class="col-md-2">Tgl. Lahir/Umur</div>
			<div class="col-md-9">: {{(date('d',strtotime($data->a_tanggal_lahir)).' '.bulan(date('m',strtotime($data->a_tanggal_lahir))).' '.date('Y',strtotime($data->a_tanggal_lahir)))}}</div>
		</div>
		<div class="row">
			<div class="col-md-2">Pekerjaan</div>
			<div class="col-md-9">: {{ucfirst($data->a_pekerjaan) }}</div>
		</div>
		<div class="row">
			<div class="col-md-2">Alamat</div>
			<div class="col-md-9">: {{$data->a_alamat}}</div>
		</div>
	</div>

	<br><p>Pada Tanggal <strong>{{(date('d',strtotime($data->tanggal)).' '.bulan(date('m',strtotime($data->tanggal))).' '.date('Y',strtotime($data->tanggal)))}}</strong> telah melahirkan seorang anak jenis kelamin Perempuan, anak ke {{$data->b_kelahiran_ke}} dan diberi nama :</p>

	<div class="center">
		<h4>========== {{$data->b_nama}} ==========</h4>
	</div>

	<br>

	<p>Dengan disaksikan oleh :</p>
	
	<br>

	<div class="content">
		<div class="row">
			<div class="col-md-2"><span style="margin-left:-20px;">1.</span><span style="margin-left: 10px;">Nama</span></div>
			<div class="col-md-7">: {{$data->s1_nama}}</div>
		</div>
		<div class="row">
			<div class="col-md-2">Tgl. Lahir/Umur</div>
			<div class="col-md-7">:{{$data->s1_umur}}</div>
		</div>
		<div class="row">
			<div class="col-md-2">Pekerjaan</div>
			<div class="col-md-7">: {{$data->s1_pekerjaan}}</div>
		</div>
		<div class="row">
			<div class="col-md-2">Alamat</div>
			<div class="col-md-7">: {{$data->s1_alamat}}</div>
		</div>
		
		<br>

		<div class="row">
			<div class="col-md-2"><span style="margin-left:-20px;">2.</span><span style="margin-left: 10px;">Nama</span></div>
			<div class="col-md-7">: {{$data->s2_nama}}</div>
		</div>
		<div class="row">
			<div class="col-md-2">Tgl. Lahir/Umur</div>
			<div class="col-md-7">: {{$data->s2_umur}}</div>
		</div>
		<div class="row">
			<div class="col-md-2">Pekerjaan</div>
			<div class="col-md-7">: {{$data->s2_pekerjaan}}</div>
		</div>
		<div class="row">
			<div class="col-md-2">Alamat</div>
			<div class="col-md-7">: {{$data->s2_alamat}}</div>
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
	<p><u>Pada Tanggal	&nbsp;: {{(date('d',strtotime($data->created_at)).' '.bulan(date('m',strtotime($data->created_at))).' '.date('Y',strtotime($data->created_at)))}}</u></p>
	<br>
	<div class="center">
		<p>a.n Kepala Desa Warnajati</p>
		<p>{{$user->roles->first()->name}}</p>
		<br><br><br><br>
		<h4><u>{{$user->name}}</u></h4>
	</div>
@endsection