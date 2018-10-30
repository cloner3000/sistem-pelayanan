<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>{{$web->nama_website}} | Portal</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700|Raleway:300,400,400i,500,500i,700,800,900" rel="stylesheet">

  <link href="{{asset('web/lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

  <link href="{{asset('web/lib/nivo-slider/css/nivo-slider.css')}}" rel="stylesheet">
  <link href="{{asset('web/lib/owlcarousel/owl.carousel.css')}}" rel="stylesheet">
  <link href="{{asset('web/lib/owlcarousel/owl.transitions.css')}}" rel="stylesheet">
  <link href="{{asset('web/lib/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
  <link href="{{asset('web/lib/animate/animate.min.css')}}" rel="stylesheet">
  <link href="{{asset('web/lib/venobox/venobox.css')}}" rel="stylesheet">

  <link href="{{asset('web/css/nivo-slider-theme.css')}}" rel="stylesheet">

  <link href="{{asset('web/css/style.css')}}" rel="stylesheet">

  <link href="{{asset('web/css/responsive.css')}}" rel="stylesheet">
  <link href="{{asset('web/css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet">

</head>

<body data-spy="scroll" data-target="#navbar-example">

  <div id="preloader"></div>

  <header>
    <div id="sticker" class="header-area">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12">

            <nav class="navbar navbar-default">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".bs-example-navbar-collapse-1" aria-expanded="false">
										<span class="sr-only">Toggle navigation</span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
                <a class="navbar-brand page-scroll sticky-logo" href="index.html">
                  <h1>{{$web->nama_website}}</h1>
								</a>
              </div>
              <div class="collapse navbar-collapse main-menu bs-example-navbar-collapse-1" id="navbar-example">
                <ul class="nav navbar-nav navbar-right">
                  <li class="active">
                    <a class="page-scroll" href="#home">Home</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="#tentang">Tentang</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="#pelayanan">Pelayanan</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="#struktur">Struktur Organisasi</a>
                  </li>
                  @guest
                    <li>
                      <a class="page-scroll" href="{{ route('login') }}">Login</a>
                    </li>
                  @else
                    <li>
                      <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout').submit();">
                        Logout
                      </a>

                      <form id="logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                      </form>
                    </li>
                  @endguest
                </ul>
              </div>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </header>

  <div id="home" class="slider-area">
    <div class="bend niceties preview-2">
      <div id="ensign-nivoslider" class="slides">
        <img src="{{asset('storage/slider/'.$web->foto_slider)}}" alt="" title="#slider-direction-1" />
        <img src="{{asset('storage/slider/'.$web->foto_slider1)}}" alt="" title="#slider-direction-2" />
      </div>

      <div id="slider-direction-1" class="slider-direction slider-one">
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="slider-content">
                <div class="layer-1-2 hidden-xs wow slideInDown" data-wow-duration="2s" data-wow-delay=".2s">
                  <h2 class="title1" style="color: white">{{$web->judul_slider}}</h2>
                </div>
                <div class="layer-1-3 wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s">
                  <h4 class="title2" style="color: white">{{$web->deskripsi_slider}}</h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div id="slider-direction-2" class="slider-direction slider-two">
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="slider-content text-center">
                <div class="layer-1-2 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                  <h2 class="title1" style="color: white">{{$web->judul_slider1}}</h2>
                </div>
                <div class="layer-1-3 wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s">
                  <h4 class="title2" style="color: white">{{$web->deskripsi_slider1}}</h4>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

  <div id="tentang" class="about-area area-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="section-headline text-center">
            <h2>Tentang {{$web->nama_website}}</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="well-left">
            <div class="single-well">
              <a href="#">
								  <img src="{{asset('storage/tentang/'.$web->foto_tentang)}}" alt="">
								</a>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="well-middle">
            <div class="single-well">
              {!!$web->tentang!!}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="our-skill-area fix hidden-sm">
    <div class="test-overly"></div>
    <div class="skill-bg area-padding-2">
      <div class="container">
        <div class="row">
          <div class="skill-text">
            <div class="col-xs-12 col-sm-3 col-md-3 text-center">
              <div class="single-skill">
                <div class="progress-circular">
                  <input type="text" class="knob" value="0" data-rel="{{100*($ktp/($spp+$sptjm+$skk+$ktp))}}" data-linecap="round" data-width="175" data-bgcolor="#fff" data-fgcolor="#3EC1D5" data-thickness=".20" data-readonly="true" disabled>
                  <h4 class="progress-h4">Data Formulir KTP</h4>
                </div>
              </div>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-3 text-center">
              <div class="single-skill">
                <div class="progress-circular">
                  <input type="text" class="knob" value="0" data-rel="{{100*($spp/($spp+$sptjm+$skk+$ktp))}}" data-linecap="round" data-width="175" data-bgcolor="#fff" data-fgcolor="#3EC1D5" data-thickness=".20" data-readonly="true" disabled>
                  <h4 class="progress-h4">Data Formulir Surat Pindah</h4>
                </div>
              </div>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-3 text-center">
              <div class="single-skill">
                <div class="progress-circular">
                  <input type="text" class="knob" value="0" data-rel="{{100*($skk/($spp+$sptjm+$skk+$ktp))}}" data-linecap="round" data-width="175" data-bgcolor="#fff" data-fgcolor="#3EC1D5" data-thickness=".20" data-readonly="true" disabled>
                  <h4 class="progress-h4">Daftar Formulir Surat Kelahiran</h4>
                </div>
              </div>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-3 text-center">
              <div class="single-skill">
                <div class="progress-circular">
                  <input type="text" class="knob" value="0" data-rel="{{100*($sptjm/($spp+$sptjm+$skk+$ktp))}}" data-linecap="round" data-width="175" data-bgcolor="#fff" data-fgcolor="#3EC1D5" data-thickness=".20" data-readonly="true" disabled>
                  <h4 class="progress-h4">Daftar Formulir Surat Menikah</h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="pelayanan" class="services-area area-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="section-headline services-head text-center">
            <h2>Pelayanan</h2>
          </div>
        </div>
      </div>

      <div class="modal fade" id="warning" role="dialog">
        <div class="modal-dialog">
        
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Perhatian</h4>
            </div>
            <div class="modal-body">
              <p>Untuk melakukan pengajuan layanan anda harus login terlebih dahulu, jika anda belum memiliki akun anda dapat mendaftar di kantor desa dan menghubungi admin desa.</p>
            </div>
            <div class="modal-footer">
              <div class="pull-left">
                <a class="btn btn-primary" href="{{ route('login') }}">Login</a>
              </div>
              <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
            </div>
          </div>
          
        </div>
      </div>

      <div class="row text-center">
        <div class="services-contents">
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="about-move">
              <div class="services-details">
                <div class="single-services">
                  
                  @guest
                    <a class="services-icon" data-toggle="modal" data-target="#warning">
                        <i class="fa fa-id-card"></i>
                    </a>
                  @else
                    <a class="services-icon" data-toggle="modal" data-target="#ktp">
                        <i class="fa fa-id-card"></i>
                    </a>

                    <div class="modal fade" id="ktp" role="dialog">
                      <div class="modal-dialog">
                        <div class="modal-content">

                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Form Pengajuan KTP</h4>
                          </div>

                          <div class="modal-body">

                            <form method="POST" action="{{ route('user.ktp.store') }}">
                              {{ csrf_field() }}

                              <h5 class="text-left">Provinsi</h5>
                              <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-address-card"></i></span>
                                  <select name="provinsi" class="form-control">
                                    <option value="jawa barat" selected>Jawa Barat</option>
                                  </select>
                              </div>
                              <br>

                              <h5 class="text-left">Kota / Kabupaten</h5>
                              <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-address-card"></i></span>
                                  <select name="kabupaten" class="form-control">
                                    <option value="sukabumi" selected>Sukabumi</option>
                                  </select>
                              </div>
                              <br>

                              <h5 class="text-left">Kecamatan</h5>
                              <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-address-card"></i></span>
                                  <select name="kecamatan" class="form-control">
                                    <option value="cibadak" selected>Cibadak</option>
                                  </select>
                              </div>
                              <br>

                              <h5 class="text-left">Desa</h5>
                              <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-address-card"></i></span>
                                  <select name="desa" class="form-control">
                                    <option value="warnajati" selected>Warnajati</option>
                                  </select>
                              </div>
                              <br>

                              <h5 class="text-left">Prmohonan</h5>
                              <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-address-card"></i></span>
                                  <select name="permohonan" class="form-control">
                                    <option value="baru">Baru</option>
                                    <option value="perpanjangan">Perpanjangan</option>
                                    <option value="penggantian">Penggantian</option>
                                  </select>
                              </div>
                              <br>
                              
                              <h5 class="text-left">NIK</h5>
                              <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
                                <input name="nik" type="text" class="form-control" placeholder="NIK" required>
                              </div>
                              <br>

                              <h5 class="text-left">Nama</h5>
                              <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                  <input name="nama" type="text" class="form-control" placeholder="Nama" required>
                              </div>
                              <br>

                              <h5 class="text-left">No Kartu Keluarga</h5>
                              <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
                                  <input name="no_kk" type="text" class="form-control" placeholder="No Kartu Keluarga" required>
                              </div>
                              <br>

                              <h5 class="text-left">Alamat</h5>
                              <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-address-card"></i></span>
                                  <input name="alamat" type="text" class="form-control" placeholder="Alamat" required>
                              </div>
                              <br>

                              <div class="modal-footer d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary">Kirim</button>
                              </div>
                            </form>

                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                    </div>

                  @endguest

                  <h4>Pendaftaran KTP</h4>
                  <p>
                    Lebih mudah,cepat,dan fleksibel dalam mengajukan surat permohonan pendaftaran KTP via website.
                  </p>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="about-move">
              <div class="services-details">
                <div class="single-services">
                  
                  @guest
                    <a class="services-icon" data-toggle="modal" data-target="#warning">
  											<i class="fa fa-sticky-note"></i>
  									</a>
                  @else
                    <a class="services-icon" data-toggle="modal" data-target="#skk">
                        <i class="fa fa-sticky-note"></i>
                    </a>

                    <div class="modal fade" id="skk" role="dialog">
                      <div class="modal-dialog modal-lg">
                      
                        <div class="modal-content">

                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Form Surat Keterangan Kelahiran</h4>
                          </div>

                          <div class="modal-body">

                            <form method="POST" action="{{ route('user.skk.store') }}">
                              {{ csrf_field() }}
                              
                              <div class="panel panel-info">
                                <div class="panel-heading"><strong>Daerah</strong></div>
                                  <div class="panel-body">
                                    <div class="row">
                                      <div class="col-md-6">
                                      
                                        <h5>Pemerintah Desa / Kelurahan</h5>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-home"></i></span>
                                            <input name="kabupaten" type="text" class="form-control" required >
                                        </div>
                                        <br>

                                        <h5>Kecamatan</h5>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-home"></i></span>
                                            <input name="kecamatan" type="text" class="form-control" required >
                                        </div>
                                        <br>

                                        <h5>Kabupaten / Kota</h5>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-globe"></i></span>
                                            <input name="desa" type="text" class="form-control" required >
                                        </div>
                                        <br>
                                      </div>
                                      <div class="col-md-6">

                                        <h5>Nama Kepala Keluarga</h5>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                            <input name="nama_kepala_keluarga" type="text" class="form-control" required >
                                        </div>
                                        <br>

                                        <h5>No Kartu Keluarga</h5>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-address-card"></i></span>
                                            <input name="no_kk" type="text" class="form-control" required >
                                        </div>
                                        <br>
                                      </div>
                                    </div>
                                  </div>
                              </div>

                              <div class="panel panel-info">
                                <div class="panel-heading"><strong>BAYI</strong></div>
                                <div class="panel-body">
                                    <div class="row">
                                      <div class="col-md-6">
                                        <h5>Nama</h5>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                            <input name="b_nama" type="text" class="form-control" required >
                                        </div>
                                        <br>

                                        <h5>Jenis Kelamin</h5>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-venus-mars"></i></span>
                                            <select class="form-control" name="b_jenis_kelamin">
                                              <option value="laki-laki">Laki-laki</option>
                                              <option value="perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                        <br>

                                        <h5>Tempat Lahir</h5>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-map"></i></span>
                                            <input name="b_tempat" type="text" class="form-control" required >
                                        </div>
                                        <br>

                                        <h5>Tanggal Lahir</h5>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            <input name="b_tanggal" type="text" id="l_bayi" class="form-control" required >
                                        </div>
                                        <br>

                                      </div>
                                      <div class="col-md-6">
                                        <h5>Jenis Kelahiran</h5>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-hospital"></i></span>
                                            <input name="b_jenis_kelahiran" type="text" class="form-control" required >
                                        </div>
                                        <br>

                                        <h5>Kelahiran Ke</h5>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-child"></i></span>
                                            <input name="b_kelahiran_ke" type="number" class="form-control" required >
                                        </div>
                                        <br>

                                        <h5>Berat</h5>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-weight-hanging"></i></span>
                                            <input name="b_berat" type="number" class="form-control" required >
                                            <span class="input-group-addon">KG</span>
                                        </div>
                                        <br>

                                        <h5>Panjang</h5>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-ruler"></i></span>
                                            <input name="b_panjang" type="number" class="form-control" required >
                                            <span class="input-group-addon">CM</span>
                                        </div>
                                        <br>
                                      </div>
                                    </div>
                                </div>
                              </div>

                              <div class="panel panel-primary">
                                <div class="panel-heading"><strong>IBU</strong></div>
                                <div class="panel-body">
                                    <div class="row">
                                      <div class="col-md-6">
                                      
                                        <h5>NIK</h5>
                                        <br>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
                                            <input name="i_nik" type="number" class="form-control" required >
                                        </div>
                                        <br>
                                        
                                        <h5>Nama</h5>
                                        <br>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                            <input name="i_nama" type="text" class="form-control" required >
                                        </div>
                                        <br>
                                        
                                        <h5>Tanggal Lahir</h5>
                                        <br>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            <input name="i_tanggal_lahir" id="l_ibu" type="text" class="form-control" required >
                                        </div>
                                        <br>
                                        
                                        <h5>Pekerjaan</h5>
                                        <br>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
                                            {{-- <input name="i_pekerjaan" type="text" class="form-control" required }"> 
                                            --}}
                                            <select class="form-control" name="i_pekerjaan">
                                              <option value="pns">Pegawai Negeri Sipil</option>
                                              <option value="wiraswasta">Wiraswasta</option>
                                              <option value="pelajar">Pelajar</option>
                                              <option value="mahasiswa">Mahasiswa</option>
                                              <option value="karyawan">Karyawan</option>
                                              <option value="programmer">Programmer</option>
                                              <option value="ibu rumah tangga">Ibu Rumah Tangga</option>
                                              <option value="lain-lain">Lain-Lain</option>
                                            </select>
                                        </div>
                                        <br>
                                      </div>
                                      <div class="col-md-6">
                                      
                                        <h5>Alamat</h5>
                                        <br>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-map-signs"></i></span>
                                            <input name="i_alamat" type="text" class="form-control" required >
                                        </div>
                                        <br>
                                        
                                        <h5>Kewarganegaraan</h5>
                                        <br>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-id-card-alt"></i></span>
                                            <input name="i_kewarganegaraan" type="text" class="form-control" required >
                                        </div>
                                        <br>
                                        
                                        <h5>Kebangsaan</h5>
                                        <br>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-id-card-alt"></i></span>
                                            <input name="i_kebangsaan" type="text" class="form-control" required >
                                        </div>
                                        <br>
                                        
                                        <h5>Tanggal Pernikahan</h5>
                                        <br>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            <input name="i_tanggal_perkawinan" id="p_ibu" type="text" class="form-control" required>
                                        </div>
                                        <br>

                                      </div>
                                    </div>
                                </div>
                              </div>

                              <div class="panel panel-success">
                                <div class="panel-heading"><strong>AYAH</strong></div>
                                <div class="panel-body">
                                    <div class="row">
                                      <div class="col-md-6">
                                        <h5>NIK</h5>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
                                            <input name="a_nik" type="number" class="form-control" required >
                                        </div>
                                        <br>
                                        <h5>Nama</h5>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                            <input name="a_nama" type="text" class="form-control" required >
                                        </div>
                                        <br>
                                        <h5>Tanggal Lahir</h5>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            <input name="a_tanggal_lahir" type="text" id="l_ayah" class="form-control" required >
                                        </div>
                                        <br>
                                        <h5>Pekerjaan</h5>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
                                            {{-- <input name="a_pekerjaan" type="text" class="form-control" required }"> --}}
                                            <select class="form-control" name="a_pekerjaan">
                                              <option value="pns">Pegawai Negeri Sipil</option>
                                              <option value="wiraswasta">Wiraswasta</option>
                                              <option value="pelajar">Pelajar</option>
                                              <option value="mahasiswa">Mahasiswa</option>
                                              <option value="karyawan">Karyawan</option>
                                              <option value="programmer">Programmer</option>
                                              <option value="lain-lain">Lain-Lain</option>
                                            </select>
                                        </div>
                                        <br>
                                      </div>
                                      <div class="col-md-6">
                                        <h5>Alamat</h5>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-map-signs"></i></span>
                                            <input name="a_alamat" type="text" class="form-control" required >
                                        </div>
                                        <br>
                                        <h5>Kewarganegaraan</h5>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-id-card-alt"></i></span>
                                            <input name="a_kewarganegaraan" type="text" class="form-control" required >
                                        </div>
                                        <br>
                                        <h5>Kebangsaan</h5>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-id-card-alt"></i></span>
                                            <input name="a_kebangsaan" type="text" class="form-control" required >
                                        </div>
                                        <br>
                                        <h5>Tanggal Pernikahan</h5>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            <input name="a_tanggal_perkawinan" type="text" id="p_ayah" class="form-control" required >
                                        </div>
                                        <br>

                                      </div>
                                    </div>
                                </div>
                              </div>

                              <div class="panel panel-info">
                                <div class="panel-heading"><strong>PELAPOR</strong></div>
                                <div class="panel-body">
                                    <div class="row">
                                      <div class="col-md-6">
                                      <h5>NIK</h5>
                                      <div class="input-group">
                                          <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
                                          <input name="p_nik" type="number" class="form-control" required >
                                      </div>
                                      <br>
                                      <h5>Nama</h5>
                                      <div class="input-group">
                                          <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                          <input name="p_nama" type="text" class="form-control" required >
                                      </div>
                                      <br>
                                      <h5>Umur</h5>
                                      <div class="input-group">
                                          <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                          <input name="p_umur" type="text" class="form-control" required >
                                      </div>
                                      <br>
                                      </div>
                                      <div class="col-md-6">
                                        <h5>Jenis Kelamin</h5>
                                      <div class="input-group">
                                          <span class="input-group-addon"><i class="fa fa-venus-mars"></i></span>
                                          {{-- <input name="p_jenis_kelamin" type="text" class="form-control" required }"> --}}
                                          <select class="form-control" name="p_jenis_kelamin">
                                            <option value="laki-laki">Laki-laki</option>
                                            <option value="perempuan">Perempuan</option>
                                          </select>
                                      </div>
                                      <br>
                                      <h5>Pekerjaan</h5>
                                      <div class="input-group">
                                          <span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
                                          {{-- <input name="p_pekerjaan" type="text" class="form-control" required }"> --}}
                                          <select class="form-control" name="p_pekerjaan">
                                            <option value="pns">Pegawai Negeri Sipil</option>
                                            <option value="wiraswasta">Wiraswasta</option>
                                            <option value="pelajar">Pelajar</option>
                                            <option value="mahasiswa">Mahasiswa</option>
                                            <option value="karyawan">Karyawan</option>
                                            <option value="programmer">Programmer</option>
                                            <option value="ibu rumah tangga">Ibu Rumah Tangga</option>
                                            <option value="lain-lain">Lain-Lain</option>
                                          </select>
                                      </div>
                                      <br>
                                      <h5>Alamat</h5>
                                      <div class="input-group">
                                          <span class="input-group-addon"><i class="fa fa-map-signs"></i></span>
                                          <input name="p_alamat" type="text" class="form-control" required >
                                      </div>
                                      <br>
                                      </div>
                                    </div>
                                </div>
                              </div>

                              <div class="panel panel-primary">
                                <div class="panel-heading"><strong>SAKSI I</strong></div>
                                <div class="panel-body">
                                    <div class="row">
                                      <div class="col-md-6">
                                        <h5>NIK</h5>
                                      <div class="input-group">
                                          <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
                                          <input name="s1_nik" type="number" class="form-control" required >
                                      </div>
                                      <br>
                                      <h5>Nama</h5>
                                      <div class="input-group">
                                          <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                          <input name="s1_nama" type="text" class="form-control" required >
                                      </div>
                                      <br>
                                      <h5>Umur</h5>
                                      <div class="input-group">
                                          <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                          <input name="s1_umur" type="text" class="form-control" required >
                                      </div>
                                      <br>
                                      </div>
                                      <div class="col-md-6">
                                      <h5>Pekerjaan</h5>
                                      <div class="input-group">
                                          <span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
                                          <select class="form-control" name="s1_pekerjaan">
                                            <option value="pns">Pegawai Negeri Sipil</option>
                                            <option value="wiraswasta">Wiraswasta</option>
                                            <option value="pelajar">Pelajar</option>
                                            <option value="mahasiswa">Mahasiswa</option>
                                            <option value="karyawan">Karyawan</option>
                                            <option value="programmer">Programmer</option>
                                            <option value="ibu rumah tangga">Ibu Rumah Tangga</option>
                                            <option value="lain-lain">Lain-Lain</option>
                                          </select>
                                      </div>
                                      <br>
                                      <h5>Alamat</h5>
                                      <div class="input-group">
                                          <span class="input-group-addon"><i class="fa fa-map-signs"></i></span>
                                          <input name="s1_alamat" type="text" class="form-control" required >
                                      </div>
                                      <br>
                                      </div>
                                    </div>
                                </div>
                              </div>

                              <div class="panel panel-success">
                                <div class="panel-heading"><strong>SAKSI II</strong></div>
                                <div class="panel-body">
                                    <div class="row">
                                      <div class="col-md-6">
                                        <h5>NIK</h5>
                                      <div class="input-group">
                                          <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
                                          <input name="s2_nik" type="number" class="form-control" required >
                                      </div>
                                      <br>
                                      <h5>Nama</h5>
                                      <div class="input-group">
                                          <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                          <input name="s2_nama" type="text" class="form-control" required >
                                      </div>
                                      <br>
                                      <h5>Umur</h5>
                                      <div class="input-group">
                                          <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                          <input name="s2_umur" type="text" class="form-control" required >
                                      </div>
                                      <br>
                                      </div>
                                      <div class="col-md-6">
                                      <h5>Pekerjaan</h5>
                                      <div class="input-group">
                                          <span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
                                          {{-- <input name="s2_pekerjaan" type="text" class="form-control" required }"> --}}
                                          <select class="form-control" name="s2_pekerjaan">
                                            <option value="pns">Pegawai Negeri Sipil</option>
                                            <option value="wiraswasta">Wiraswasta</option>
                                            <option value="pelajar">Pelajar</option>
                                            <option value="mahasiswa">Mahasiswa</option>
                                            <option value="karyawan">Karyawan</option>
                                            <option value="programmer">Programmer</option>
                                            <option value="ibu rumah tangga">Ibu Rumah Tangga</option>
                                            <option value="lain-lain">Lain-Lain</option>
                                          </select>
                                      </div>
                                      <br>
                                      <h5>Alamat</h5>
                                      <div class="input-group">
                                          <span class="input-group-addon"><i class="fa fa-map-signs"></i></span>
                                          <input name="s2_alamat" type="text" class="form-control" required >
                                      </div>
                                      <br>
                                      </div>
                                    </div>
                                </div>
                              </div>

                              <div class="modal-footer d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                              </div>
                            </form>

                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                        
                      </div>
                    </div>                    
                  @endguest

                  <h4>Surat Kelahiran</h4>
                  <p>
                    Untuk mengajukan Surat keterangan kelahiran anda dapat klik menu ini dan mohon isi form yang telah disediakan. 
                  </p>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class=" about-move">
              <div class="services-details">
                <div class="single-services">
                  
                  @guest
                    <a class="services-icon" data-toggle="modal" data-target="#warning">
  											<i class="fa fa-gavel"></i>
  									</a>
                  @else
                     <a class="services-icon" href="#" data-toggle="modal" data-target="#sptjm">
                        <i class="fa fa-gavel"></i>
                    </a>
                    <div class="modal fade" id="sptjm" role="dialog">
                      <div class="modal-dialog">
                      
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Form Surat Pernyataan Tanggung Jawab Mutlak (SPTJM)</h4>
                          </div>
                          <div class="modal-body">

                          <form method="POST" action="{{ route('user.sptjm.store') }}">
                            {{ csrf_field() }}
                            <h5>Saya yang bertandatangan dibawah ini:</h5>
                            <h6>NIK</h6>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
                                <input name="nik" type="text" class="form-control"  required >
                            </div>
                            <br>

                            <h6>Nama</h6>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input name="nama" type="text" class="form-control"  required >
                            </div>
                            <br>

                            <h6>Pekerjaan</h6>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
                                <select class="form-control" name="pekerjaan">
                                  <option value="pns">Pegawai Negeri Sipil</option>
                                  <option value="wiraswasta">Wiraswasta</option>
                                  <option value="pelajar">Pelajar</option>
                                  <option value="mahasiswa">Mahasiswa</option>
                                  <option value="karyawan">Karyawan</option>
                                  <option value="programmer">Programmer</option>
                                  <option value="ibu rumah tangga">Ibu Rumah Tangga</option>
                                  <option value="lain-lain">Lain-Lain</option>
                                </select>
                            </div>
                            <br>

                            <h6>Tempat Lahir</h6>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-map-marked-alt"></i></span>
                                <input name="tempat" type="text" class="form-control" required >
                            </div>
                            <br>

                            <h6>Tanggal Lahir</h6>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-calendar-alt"></i></span>
                                <input name="tanggal" type="text" id="tl" class="form-control" required >
                            </div>
                            <br>

                            <h6>Alamat</h6>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-address-card"></i></span>
                                <input name="alamat" type="text" class="form-control" required >
                            </div>
                            <br>

                            <hr>
                              <h5>menyatakan bahwa :</h5>
                            <hr>

                            <h6>NIK</h6>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
                                <input name="nik1" type="text" class="form-control" required >
                            </div>
                            <br>

                            <h6>Nama</h6>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input name="nama1" type="text" class="form-control"  required >
                            </div>
                            <br>

                            <h6>Pekerjaan</h6>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
                                <select class="form-control" name="pekerjaan1">
                                  <option value="pns">Pegawai Negeri Sipil</option>
                                  <option value="wiraswasta">Wiraswasta</option>
                                  <option value="pelajar">Pelajar</option>
                                  <option value="mahasiswa">Mahasiswa</option>
                                  <option value="karyawan">Karyawan</option>
                                  <option value="programmer">Programmer</option>
                                  <option value="ibu rumah tangga">Ibu Rumah Tangga</option>
                                  <option value="lain-lain">Lain-Lain</option>
                                </select>
                            </div>
                            <br>

                            <h6>Tempat Lahir</h6>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-map-marked-alt"></i></span>
                                <input name="tempat1" type="text" class="form-control" required >
                            </div>
                            <br>

                            <h6>Tanggal Lahir</h6>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-calendar-alt"></i></span>
                                <input name="tanggal1" type="text" id="tl1" class="form-control" required >
                            </div>
                            <br>

                            <h6>Alamat</h6>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-address-card"></i></span>
                                <input name="alamat1" type="text" class="form-control" required >
                            </div>
                            <br>
                            
                            <hr>
                              <h5>adalah suami/istri dari:</h5>
                            <hr>

                            <h6>NIK</h6>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
                                <input name="nik2" type="text" class="form-control" required >
                            </div>
                            <br>

                            <h6>Nama</h6>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input name="nama2" type="text" class="form-control"  required >
                            </div>
                            <br>

                            <h6>Pekerjaan</h6>
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
                              <select class="form-control" name="pekerjaan2">
                                <option value="pns">Pegawai Negeri Sipil</option>
                                <option value="wiraswasta">Wiraswasta</option>
                                <option value="pelajar">Pelajar</option>
                                <option value="mahasiswa">Mahasiswa</option>
                                <option value="karyawan">Karyawan</option>
                                <option value="programmer">Programmer</option>
                                <option value="ibu rumah tangga">Ibu Rumah Tangga</option>
                                <option value="lain-lain">Lain-Lain</option>
                              </select>
                            </div>
                            <br>

                            <h6>Tempat Lahir</h6>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-map-marked-alt"></i></span>
                                <input name="tempat2" type="text" class="form-control" required >
                            </div>
                            <br>

                            <h6>Tanggal Lahir</h6>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-calendar-alt"></i></span>
                                <input name="tanggal2" type="text" id="tl2" class="form-control" required >
                            </div>
                            <br>

                            <h6>Alamat</h6>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-address-card"></i></span>
                                <input name="alamat2" type="text" class="form-control" required >
                            </div>
                            <br>

                            <hr>
                              <h5>Saksi I :</h5>
                            <hr>

                            <h6>NIK</h6>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
                                <input name="s1_nik" type="text" class="form-control" required >
                            </div>
                            <br>

                            <h6>Nama</h6>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input name="s1_nama" type="text" class="form-control"  required >
                            </div>
                            <br>
                            
                            <hr>
                              <h5>Saksi II :</h5>
                            <hr>

                            <h6>NIK</h6>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
                                <input name="s2_nik" type="text" class="form-control" required >
                            </div>
                            <br>

                            <h6>Nama</h6>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input name="s2_nama" type="text" class="form-control"  required >
                            </div>
                            <br>

                            <div class="modal-footer d-flex justify-content-center">
                              <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                            <br>

                          </form>

                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                        
                      </div>
                    </div>
                  @endguest

                  <h4>Surat Pertanggung Jawaban</h4>
                  <p>
                    will have to make sure the prototype looks finished by inserting text or photo.make sure the prototype looks finished by.
                  </p>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class=" about-move">
              <div class="services-details">
                <div class="single-services">
                  
                  @guest
                    <a class="services-icon" data-toggle="modal" data-target="#warning">
  											<i class="fa fa-truck"></i>
  									</a>
                  @else
                    <a class="services-icon" data-toggle="modal" data-target="#spp">
                        <i class="fa fa-truck"></i>
                    </a>
                    <div class="modal fade" id="spp" role="dialog">
                      <div class="modal-dialog">
                      
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Form Surat Pengantar Pindah</h4>
                          </div>
                          <div class="modal-body">

                            <form method="POST" action="{{ route('user.spp.store') }}">
                              {{ csrf_field() }}
                              <h5>NIK</h5>
                              <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
                                  <input name="nik" type="text" class="form-control" required>
                              </div>
                              <br>

                              <h5>Nama</h5>
                              <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                  <input name="nama" type="text" class="form-control" required>
                              </div>
                              <br>

                              <h5>No Kartu Keluarga</h5>
                              <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-id-card-alt"></i></span>
                                  <input name="no_kk" type="text" class="form-control" required>
                              </div>
                              <br>

                              <h5>Nama Kepala Keluarga</h5>
                              <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
                                  <input name="kepala_keluarga" type="text" class="form-control" required>
                              </div>
                              <br>

                              <h5>Alamat Sekarang</h5>
                              <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-address-card"></i></span>
                                  <input name="alamat_sekarang" type="text" class="form-control" required>
                              </div>
                              <br>

                              <h5>Alamat Tujuan</h5>
                              <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-map-signs"></i></span>
                                  <input name="alamat_tujuan" type="text" class="form-control" required>
                              </div>
                              <br>

                              <h5>Jumlah</h5>
                              <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-users"></i></span>
                                  <input name="jumlah_pindah" type="number" class="form-control" required>
                              </div>
                              <br>

                              <div class="modal-footer d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                              </div>
                            </form>

                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                        
                      </div>
                    </div>
                  @endguest

                  <h4>Surat Pengantar Pindah</h4>
                  <p>
                    will have to make sure the prototype looks finished by inserting text or photo.make sure the prototype looks finished by.
                  </p>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>

  <div class="wellcome-area">
    <div class="well-bg">
      <div class="test-overly"></div>
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="wellcome-text">
              <div class="well-text text-center">
                <h2>Visi Dan Misi</h2>
                <div class="row" style="color: white;">

                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <h4 style="color: white;">Visi</h4>
                    {!!$web->visi!!}   
                  </div>

                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <h4 style="color: white;">Misi</h4>
                    {!!$web->misi!!}   
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="struktur" class="our-team-area area-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="section-headline text-center">
            <h2>Struktur Organisasi</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="team-top">

          @foreach($strukturs as $s)
            <div class="col-md-3 col-sm-3 col-xs-12" >
              <div class="single-team-member">
                <div class="team-img">
                  <a href="#">
                    <img src="{{asset('storage/struktur/'.$s->foto)}}" style="height: 250px;width: 100%;">
                  </a>
                  <div class="team-social-icon text-center">
                    <ul>
                      <li style="margin-left: 20px;">
                        <a href="{{$s->fb}}">
                          <i class="fa fa-facebook"></i>
                        </a>
                      </li>
                      <li>
                        <a href="{{$s->twitter}}">
                          <i class="fa fa-twitter"></i>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="team-content text-center">
                  <h6>{{$s->nama}}</h6>
                  <p>{{$s->jabatan}}</p>
                </div>
              </div>
            </div>
          @endforeach
          
        </div>
      </div>
    </div>
  </div>

  <footer>
    <div class="footer-area">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="footer-content">
              <div class="footer-head">
                <div class="footer-logo">
                  <h2><span>{{$web->nama_website}}</span></h2>
                </div>

                <p>{{$web->tentang1}}</p>
                <div class="footer-icons">
                  <ul>
                    <li>
                      <a href="{{$web->fb}}"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li>
                      <a href="{{$web->twitter}}"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li>
                      <a href="{{$web->ig}}"><i class="fa fa-google"></i></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="footer-content">
              <div class="footer-head">
                <h4>informasi</h4>
                <p>
                  Untuk informasi lebih lanjut hubungi kontak di bawah ini.
                </p>
                <div class="footer-contacts">
                  <p><span>Tel:</span> {{$web->tlp}}</p>
                  <p><span>Email:</span> {{$web->email}}</p>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </footer>

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <script src="{{asset('web/lib/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('web/lib/bootstrap/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('web/lib/owlcarousel/owl.carousel.min.js')}}"></script>
  <script src="{{asset('web/lib/venobox/venobox.min.js')}}"></script>
  <script src="{{asset('web/lib/knob/jquery.knob.js')}}"></script>
  <script src="{{asset('web/lib/wow/wow.min.js')}}"></script>
  <script src="{{asset('web/lib/parallax/parallax.js')}}"></script>
  <script src="{{asset('web/lib/easing/easing.min.js')}}"></script>
  <script src="{{asset('web/lib/nivo-slider/js/jquery.nivo.slider.js')}}" type="text/javascript"></script>
  <script src="{{asset('web/lib/appear/jquery.appear.js')}}"></script>
  <script src="{{asset('web/lib/isotope/isotope.pkgd.min.js')}}"></script>

  <script src="{{asset('web/contactform/contactform.js')}}"></script>

  <script src="{{asset('web/js/main.js')}}"></script>
  <script src="{{ asset('web/js/moment.js') }}" type="text/javascript"></script>
  <script src="{{ asset('web/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
  <script type="text/javascript">
    $(function () {
        $('#l_bayi,#l_ibu,#p_ibu,#l_ayah,#p_ayah,#tl,#tl1,#tl2').datetimepicker({
           format:'DD-MM-YYYY HH:mm:ss',
        });
    });
  </script>
</body>

</html>
