<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>{{$web->nama_website}} | Portal</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700|Raleway:300,400,400i,500,500i,700,800,900" rel="stylesheet">

  <link href="{{secure_asset('web/lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

  <link href="{{secure_asset('web/lib/nivo-slider/css/nivo-slider.css')}}" rel="stylesheet">
  <link href="{{secure_asset('web/lib/owlcarousel/owl.carousel.css')}}" rel="stylesheet">
  <link href="{{secure_asset('web/lib/owlcarousel/owl.transitions.css')}}" rel="stylesheet">
  <link href="{{secure_asset('web/lib/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
  <link href="{{secure_asset('web/lib/animate/animate.min.css')}}" rel="stylesheet">
  <link href="{{secure_asset('web/lib/venobox/venobox.css')}}" rel="stylesheet">

  <link href="{{secure_asset('web/css/nivo-slider-theme.css')}}" rel="stylesheet">

  <link href="{{secure_asset('web/css/style.css')}}" rel="stylesheet">

  <link href="{{secure_asset('web/css/responsive.css')}}" rel="stylesheet">
  <link href="{{secure_asset('web/css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet">

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
                  <li>
                    <a class="page-scroll" href="{{ route('berita') }}">Berita</a>
                  </li>
                  @guest
                  @else
                    @if(Auth::user()->roles->first()->name == 'Kepala Desa')
                      <li>
                        <a class="page-scroll" href="{{ route('kades.dashboard') }}">Dashboard</a>
                      </li>
                    @elseif(Auth::user()->roles->first()->name != 'User' )
                      <li>
                        <a class="page-scroll" href="{{ route('admin.dashboard') }}">Dashboard</a>
                      </li> 
                    @endif
                  @endguest

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
        {{-- uncoment this if you using local storage 
          <img src="{{secure_asset('storage/slider/'.$web->foto_slider)}}" alt="" title="#slider-direction-1" />
          <img src="{{secure_asset('storage/slider/'.$web->foto_slider1)}}" alt="" title="#slider-direction-2" /> 
        --}}
      
          <img src="https://docs.google.com/uc?id={{$web->foto_slider}}" alt="" title="#slider-direction-1" />
          <img src="https://docs.google.com/uc?id={{$web->foto_slider1}}" alt="" title="#slider-direction-2" />
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

  <div id="berita" class="about-area area-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="section-headline text-center">
            <h2>Berita Terbaru</h2>
          </div>
        </div>
      </div>
      <div class="row">
        
        <div class="carousel slide" id="berita-slide">
          <div class="carousel-inner">

            @foreach($news as $i => $news)

              @if($i == 0)
                <div class="item active">
                  <ul class="thumbnails">
                    
                    @foreach($news as $n)
                      <li class="col-sm-3">
                        <div class="fff">
                          <div class="thumbnail">
                            <a href="{{ route('detail',$n->slug) }}"><img src="{{ asset('storage/blog').'/'.$n->foto }}"></a>
                          </div>
                          <div class="caption">
                            <h6>{{$n->judul}}</h6>
                            <p>{{$n->deskripsi}}</p>
                            <a class="btn btn-mini" href="{{ route('detail',$n->slug) }}">» Selanjutnya</a>
                          </div>
                        </div>
                      </li>
                    @endforeach

                  </ul>
                </div>
              @else
                <div class="item">
                  <ul class="thumbnails">
                    
                    @foreach($news as $n)
                      <li class="col-sm-3">
                        <div class="fff">
                          <div class="thumbnail">
                            <a href="{{ route('detail',$n->slug) }}"><img src="{{ asset('storage/blog').'/'.$n->foto }}" alt=""></a>
                          </div>
                          <div class="caption">
                            <h6>{{$n->judul}}</h6>
                            <p>{{$n->deskripsi}}</p>
                            <a class="btn btn-mini" href="{{ route('detail',$n->slug) }}">» Selanjutnya</a>
                          </div>
                        </div>
                      </li>
                    @endforeach

                  </ul>
                </div>
              @endif

            @endforeach
          </div>

          <nav>
            <ul class="control-box pager">
              <li><a data-slide="prev" href="#berita-slide" class=""><i class="glyphicon glyphicon-chevron-left"></i></a></li>
              <li><a data-slide="next" href="#berita-slide" class=""><i class="glyphicon glyphicon-chevron-right"></i></a></li>
            </ul>
          </nav>
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
								  {{--
                    uncoment this if you use local storage 
                    <img src="{{secure_asset('storage/tentang/'.$web->foto_tentang)}}" alt=""> 
                  --}}
                  <img src="https://docs.google.com/uc?id={{$web->foto_tentang}}" alt="">
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
                  <input type="text" class="knob" value="0" data-rel="{{100*($acc/($acc+$pending))-1}}" data-linecap="round" data-width="175" data-bgcolor="#fff" data-fgcolor="#3EC1D5" data-thickness=".20" data-readonly="true" disabled>
                  <h4 class="progress-h4">Data Pelayanan Yang Telah Diproses</h4>
                </div>
              </div>
            </div>

            <div class="col-xs-12 col-sm-3 col-md-3 text-center">
              <div class="single-skill">
                <div class="progress-circular">
                  <input type="text" class="knob" value="0" data-rel="{{100*($pending/($acc+$pending))}}" data-linecap="round" data-width="175" data-bgcolor="#fff" data-fgcolor="#3EC1D5" data-thickness=".20" data-readonly="true" disabled>
                  <h4 class="progress-h4">Data Pelayanan Yang Belum Diproses</h4>
                </div>
              </div>
            </div>

            <div class="col-xs-12 col-sm-3 col-md-3 text-center">
              <div class="single-skill">
                <div class="progress-circular">
                  <input type="text" class="knob" value="0" data-rel="{{100*($p_thisMonth/$p_total)}}" data-linecap="round" data-width="175" data-bgcolor="#fff" data-fgcolor="#3EC1D5" data-thickness=".20" data-readonly="true" disabled>
                  <h4 class="progress-h4">Data Pengunjung Bulan Ini</h4>
                </div>
              </div>
            </div>

            <div class="col-xs-12 col-sm-3 col-md-3 text-center">
              <div class="single-skill">
                <div class="progress-circular">
                  <input type="text" class="knob" value="0" data-rel="{{100*(($p_total-$p_thisMonth)/$p_total)}}" data-linecap="round" data-width="175" data-bgcolor="#fff" data-fgcolor="#3EC1D5" data-thickness=".20" data-readonly="true" disabled>
                  <h4 class="progress-h4">Data Pengunjung Bulan Sebelumnya</h4>
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

          <div class="col-md-4 col-sm-4 col-xs-12">
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

          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="about-move">
              <div class="services-details">
                <div class="single-services">
                  
                  @guest
                    <a class="services-icon" data-toggle="modal" data-target="#warning">
                        <i class="fa fa-file"></i>
                    </a>
                  @else
                    <a class="services-icon" data-toggle="modal" data-target="#sk">
                        <i class="fa fa-file"></i>
                    </a>

                    <div class="modal fade" id="sk" role="dialog">
                      <div class="modal-dialog">
                        <div class="modal-content">

                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Form Surat Keterangan</h4>
                          </div>

                          <div class="modal-body">

                            <form method="POST" action="{{ route('user.sk.store') }}">
                              {{ csrf_field() }}
                              
                              <h5 class="text-left">NIK</h5>
                              <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
                                  <input name="nik" type="text" class="form-control" required>
                              </div>
                              <br>

                              <h5 class="text-left">Nama</h5>
                              <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                  <input name="nama" type="text" class="form-control"  required>
                              </div>
                              <br>

                              <h5 class="text-left">Pekerjaan</h5>
                              <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
                                <select class="form-control" name="pekerjaan">
                                  @foreach($ps as $p)
                                    <option value="{{$p->slug}}">{{$p->nama}}</option>
                                  @endforeach
                                </select>
                              </div>
                              <br>

                              <h5 class="text-left">Jenis Kelamin</h5>
                              <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-venus-mars"></i></span>
                                  <select class="form-control" name="jenis_kelamin">
                                    <option value="laki-laki">Laki-laki</option>
                                    <option value="perempuan">Perempuan</option>
                                  </select>
                              </div>
                              <br>

                              <h5 class="text-left">Tempat Lahir</h5>
                              <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                  <input name="tempat" type="text" class="form-control" required>
                              </div>
                              <br>

                              <h5 class="text-left">Tanggal Lahir</h5>
                              <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                  <input name="tanggal" type="text" id="sk_tl" class="form-control" required>
                              </div>
                              <br>

                              <h5 class="text-left">Agama</h5>
                              <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-address-card"></i></span>
                                  <input name="agama" type="text" class="form-control" required>
                              </div>
                              <br>

                              <h5 class="text-left">Alamat</h5>
                              <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-address-card"></i></span>
                                  <input name="alamat" type="text" class="form-control" required>
                              </div>
                              <br>

                              <h5 class="text-left">Kewarganegaraan</h5>
                              <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-flag"></i></span>
                                  <input name="kewarganegaraan" type="text" class="form-control" required>
                              </div>
                              <br>

                              <h5 class="text-left">Tujuan</h5>
                              <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
                                  <input name="keperluan" type="text" class="form-control" required>
                              </div>
                              <br>

                              <h5 class="text-left">Keterangan</h5>
                              <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
                                  <input name="keterangan" type="text" class="form-control" required>
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

                  <h4>Pendaftaran Surat Keterangan</h4>
                  <p>
                    Lebih mudah,cepat,dan fleksibel dalam mengajukan surat permohonan pendaftaran KTP via website.
                  </p>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-4 col-sm-4 col-xs-12">
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
                                            <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
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
                                            <span class="input-group-addon"><i class="fa fa-question"></i></span>
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
                                            <span class="input-group-addon"><i class="fa fa-question"></i></span>
                                            <input name="b_berat" type="number" class="form-control" required >
                                            <span class="input-group-addon">KG</span>
                                        </div>
                                        <br>

                                        <h5>Panjang</h5>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-question"></i></span>
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
                                            <select class="form-control" name="i_pekerjaan">
                                              @foreach($ps as $p)
                                                <option value="{{$p->slug}}">{{$p->nama}}</option>
                                              @endforeach
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
                                            <span class="input-group-addon"><i class="fa fa-flag"></i></span>
                                            <input name="i_kewarganegaraan" type="text" class="form-control" required >
                                        </div>
                                        <br>
                                        
                                        <h5>Kebangsaan</h5>
                                        <br>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-users"></i></span>
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
                                            <select class="form-control" name="a_pekerjaan">
                                              @foreach($ps as $p)
                                                <option value="{{$p->slug}}">{{$p->nama}}</option>
                                              @endforeach
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
                                            <span class="input-group-addon"><i class="fa fa-flag"></i></span>
                                            <input name="a_kewarganegaraan" type="text" class="form-control" required >
                                        </div>
                                        <br>
                                        <h5>Kebangsaan</h5>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-users"></i></span>
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
                                          <select class="form-control" name="p_pekerjaan">
                                            @foreach($ps as $p)
                                              <option value="{{$p->slug}}">{{$p->nama}}</option>
                                            @endforeach
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
                                            @foreach($ps as $p)
                                              <option value="{{$p->slug}}">{{$p->nama}}</option>
                                            @endforeach
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
                                          <select class="form-control" name="s2_pekerjaan">
                                            @foreach($ps as $p)
                                              <option value="{{$p->slug}}">{{$p->nama}}</option>
                                            @endforeach
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

        </div>
      </div>
      
      <div class="row text-center">
        <div class="services-contents">

          <div class="col-md-4 col-sm-4 col-xs-12 col-md-offset-4 col-sm-offset-4">
            <div class="about-move">
              <div class="services-details">
                <div class="single-services">
                  
                  @guest
                    <a class="services-icon" data-toggle="modal" data-target="#warning">
                        <i class="fa fa-phone"></i>
                    </a>
                  @else
                    <a class="services-icon" data-toggle="modal" data-target="#pengaduan">
                        <i class="fa fa-phone"></i>
                    </a>

                    <div class="modal fade" id="pengaduan" role="dialog">
                      <div class="modal-dialog">
                        <div class="modal-content">

                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Form Pengaduan</h4>
                          </div>

                          <div class="modal-body">

                            <form method="POST" action="{{ route('user.pengaduan.store') }}">
                              {{ csrf_field() }}

                              <h5 class="text-left">NIK</h5>
                              <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
                                  <input name="nik" type="text" class="form-control" required >
                              </div>
                              <br>

                              <h5 class="text-left">Nama</h5>
                              <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                  <input name="nama" type="text" class="form-control" required >
                              </div>
                              <br>
                              
                              <h5 class="text-left">Tanggal Lahir</h5>
                              <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                  <input name="tanggal_lahir" type="text" id="l_pengaduan" class="form-control" required>
                              </div>
                              <br>

                              <h5 class="text-left">Pekerjaan</h5>
                              <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
                                  <select class="form-control" name="pekerjaan">
                                    @foreach($ps as $p)
                                      <option value="{{$p->slug}}">{{$p->nama}}</option>
                                    @endforeach
                                  </select>
                              </div>
                              <br>
                              
                              <h5 class="text-left">Sasaran</h5>
                              <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-address-card"></i></span>
                                  <input name="sasaran" type="text" class="form-control" required >
                              </div>
                              <br>

                              <h5 class="text-left">Alamat</h5>
                              <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-address-card"></i></span>
                                  <input name="alamat" type="text" class="form-control" required >
                              </div>
                              <br>

                              <h5 class="text-left">Pengaduan</h5>
                              <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-address-card"></i></span>
                                  <textarea name="isi" class="form-control" required></textarea>
                              </div>
                              <br>

                              <h5 class="text-left">Alternatif</h5>
                              <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-address-card"></i></span>
                                  <textarea name="alternatif" class="form-control" required ></textarea>
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

                  <h4>Surat Pengaduan</h4>
                  <p>
                    Jika anda ingin mengajukan pengaduan silah kan klik dan isi form yang muncul.
                  </p>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
      <div class="row text-center">
        <div class="services-contents">

          <div class="col-md-4 col-sm-4 col-xs-12">
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
                                  @foreach($ps as $p)
                                    <option value="{{$p->slug}}">{{$p->nama}}</option>
                                  @endforeach
                                </select>
                            </div>
                            <br>

                            <h6>Tempat Lahir</h6>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                <input name="tempat" type="text" class="form-control" required >
                            </div>
                            <br>

                            <h6>Tanggal Lahir</h6>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
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
                                  @foreach($ps as $p)
                                    <option value="{{$p->slug}}">{{$p->nama}}</option>
                                  @endforeach
                                </select>
                            </div>
                            <br>

                            <h6>Tempat Lahir</h6>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                <input name="tempat1" type="text" class="form-control" required >
                            </div>
                            <br>

                            <h6>Tanggal Lahir</h6>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
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
                              <h5>Hubungan Pihak Pertama Dengan Pihak Kedua</h5>
                              <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-network-wired"></i></span>
                                  <select class="form-control" name="hubungan">
                                      <option value="suami" selected>Suami</option>
                                      <option value="istri">Istri</option>
                                  </select>
                              </div>

                              <h6>No Kartu Keluarga</h6>
                              <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
                                  <input name="no_kk" type="text" class="form-control" required >
                              </div>

                              <br>
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
                                  @foreach($ps as $p)
                                    <option value="{{$p->slug}}">{{$p->nama}}</option>
                                  @endforeach
                              </select>
                            </div>
                            <br>

                            <h6>Tempat Lahir</h6>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                <input name="tempat2" type="text" class="form-control" required >
                            </div>
                            <br>

                            <h6>Tanggal Lahir</h6>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
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
                    Untuk membuat surat pertanggung jawaban untuk keterangan pasangan yang sah, pilih menu ini dan isi form.
                  </p>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class=" about-move">
              <div class="services-details">
                <div class="single-services">
                  
                  @guest
                    <a class="services-icon" data-toggle="modal" data-target="#warning">
                        <i class="fa fa-ambulance"></i>
                    </a>
                  @else
                    <a class="services-icon" data-toggle="modal" data-target="#kematian">
                        <i class="fa fa-ambulance"></i>
                    </a>
                    <div class="modal fade" id="kematian" role="dialog">
                      <div class="modal-dialog modal-lg">
                      
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Form Surat Keterangan Kematian</h4>
                          </div>
                          <div class="modal-body">

                            <form method="POST" action="{{ route('user.skematian.store') }}">
                              {{ csrf_field() }}

                              <div class="panel panel-info">
                                <div class="panel-heading"><strong>Data Orang Meninggal</strong></div>
                                  <div class="panel-body">
                                    <div class="row">

                                      <div class="col-md-6">

                                        <h5 class="text-left">Nama</h5>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                            <input name="nama" type="text" class="form-control" required>
                                        </div>
                                        <br>
                                        
                                        <h5 class="text-left">NIK</h5>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
                                            <input name="nik" type="number" class="form-control" required>
                                        </div>
                                        <br>

                                        <h5 class="text-left">Jenis Kelamin</h5>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-venus-mars"></i></span>
                                            <select class="form-control" name="jenis_kelamin">
                                              <option value="laki-laki">Laki-laki</option>
                                              <option value="perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                        <br>
                                      </div>

                                      <div class="col-md-6">
                                        <h5 class="text-left">Tanggal Lahir</h5>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            <input name="tanggal_lahir" type="text" id="l_kematian" class="form-control" required>
                                        </div>
                                        <br>
                                      
                                        <h5 class="text-left">Agama</h5>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-map-signs"></i></span>
                                            <input name="agama" type="text" class="form-control" required>
                                        </div>
                                        <br>

                                        <h5 class="text-left">Alamat</h5>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-map-signs"></i></span>
                                            <input name="alamat" type="text" class="form-control" required>
                                        </div>
                                        <br>
                                      </div>

                                    </div>
                                  </div>
                                </div>

                                <div class="panel panel-info">
                                  <div class="panel-heading"><strong>Terjadinya Peristiwa</strong></div>
                                  <div class="panel-body">

                                    <h5 class="text-left">Tanggal</h5>
                                    <div class="input-group">
                                      <span class="input-group-addon"><i class="fa fa-map-signs"></i></span>
                                      <input name="waktu" type="text" id="w_kematian" class="form-control" required>
                                    </div>
                                    <br>

                                    <h5 class="text-left">Tempat</h5>
                                    <div class="input-group">
                                          <span class="input-group-addon"><i class="fa fa-map-signs"></i></span>
                                          <input name="tempat" type="text" class="form-control" required>
                                    </div>
                                    <br>

                                    <h5 class="text-left">Penyebab</h5>
                                    <div class="input-group">
                                      <span class="input-group-addon"><i class="fa fa-map-signs"></i></span>
                                      <input name="penyebab" type="text" class="form-control" required>
                                    </div>
                                    <br>

                                  </div>
                                </div>

                                <div class="panel panel-info">
                                  <div class="panel-heading"><strong>Pelapor</strong></div>
                                  <div class="panel-body">
                                    <div class="row">

                                      <div class="col-md-6">

                                        <h5 class="text-left">NIK</h5>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
                                            <input name="p_nik" type="number" class="form-control" required>
                                        </div>
                                        <br>

                                        <h5 class="text-left">Nama</h5>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                            <input name="p_nama" type="text" class="form-control" required>
                                        </div>
                                        <br>

                                        <h5 class="text-left">Tanggal Lahir</h5>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            <input name="p_tanggal" type="text" id="l_kematian_pelapor" class="form-control">
                                        </div>
                                        <br>

                                      </div>
                                      <div class="col-md-6">

                                        <h5 class="text-left">Tempat Lahir</h5>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                            <input name="p_tempat" type="text" class="form-control" required>
                                        </div>
                                        <br>

                                        <h5 class="text-left">Pekerjaan</h5>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
                                            <select class="form-control" name="p_pekerjaan">
                                              @foreach($ps as $p)
                                                <option value="{{$p->slug}}">{{$p->nama}}</option>
                                              @endforeach
                                            </select>
                                        </div>
                                        <br>

                                        <h5 class="text-left">Alamat</h5>
                                        <div class="input-group">
                                          <span class="input-group-addon"><i class="fa fa-map-signs"></i></span>
                                          <input name="p_alamat" type="text" class="form-control" required>
                                        </div>
                                        <br>

                                        <h5 class="text-left">Hubungan</h5>
                                        <div class="input-group">
                                          <span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
                                          <select class="form-control" name="p_hubungan">
                                            <option value="anak kandung">Anak Kandung</option>
                                          </select>
                                        </div>
                                        <br>

                                      </div>
                                    </div>
                                  </div>
                                </div>

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

                  <h4>Surat Keterangan Kematian</h4>
                  <p>
                    Untuk melaporkan seseorang meninggal silahakn pilih menu ini dan isi form.
                  </p>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class=" about-move">
              <div class="services-details">
                <div class="single-services">
                  
                  @guest
                    <a class="services-icon" data-toggle="modal" data-target="#warning">
                        <i class="fa fa-balance-scale"></i>
                    </a>
                  @else
                    <a class="services-icon" data-toggle="modal" data-target="#sktm">
                        <i class="fa fa-balance-scale"></i>
                    </a>
                    <div class="modal fade" id="sktm" role="dialog">
                      <div class="modal-dialog">
                      
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Form Surat Keterangan Tidak Mampu</h4>
                          </div>
                          <div class="modal-body">

                            <form method="POST" action="{{ route('user.sktm.store') }}">
                            {{ csrf_field() }}
                            
                            <h5 class="text-left">NIK</h5>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
                                <input name="nik" type="text" class="form-control" required>
                            </div>
                            <br>

                            <h5 class="text-left">Nama</h5>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input name="nama" type="text" class="form-control"  required>
                            </div>
                            <br>

                            <h5 class="text-left">Jenis Kelamin</h5>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-venus-mars"></i></span>
                                <select name="jenis_kelamin" class="form-control"  required>
                                  <option value="laki-laki">Laki-laki</option>
                                  <option value="perempuan">Perempuan</option>
                                </select>
                            </div>
                            <br>

                            <h5 class="text-left">Pekerjaan</h5>
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
                              <select class="form-control" name="pekerjaan">
                                  @foreach($ps as $p)
                                    <option value="{{$p->slug}}">{{$p->nama}}</option>
                                  @endforeach
                              </select>
                            </div>
                            <br>

                            <h5 class="text-left">Tempat Lahir</h5>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                <input name="tempat" type="text" class="form-control" required>
                            </div>
                            <br>

                            <h5 class="text-left">Tanggal Lahir</h5>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                <input name="tanggal" type="text" id="sktm_tl" class="form-control" required>
                            </div>
                            <br>

                            <h5 class="text-left">Agama</h5>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-address-card"></i></span>
                                <input name="agama" type="text" class="form-control" required>
                            </div>
                            <br>

                            <h5 class="text-left">Alamat</h5>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-address-card"></i></span>
                                <input name="alamat" type="text" class="form-control" required>
                            </div>
                            <br>

                            <h5 class="text-left">Kewarganegaraan</h5>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-flag"></i></span>
                                <input name="kewarganegaraan" type="text" class="form-control" required>
                            </div>
                            <br>

                            <h5 class="text-left">Tujuan</h5>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
                                <input name="keperluan" type="text" class="form-control" required>
                            </div>
                            <br>

                            <h5 class="text-left">Nama Ayah</h5>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input name="n_ayah" type="text" class="form-control" required>
                            </div>
                            <br>

                            <h5 class="text-left">Nama Ibu</h5>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input name="n_ibu" type="text" class="form-control" required>
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

                  <h4>Surat Keterangan Tidak Mampu</h4>
                  <p>
                    Untuk mengajukan surat keterangan tidak mampu silahkan pilih pelayanan ini.
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
                    {{-- 
                      <img src="{{secure_asset('storage/struktur/'.$s->foto)}}" style="height: 250px;width: 100%;"> 
                      --}}
                    <img src="https://docs.google.com/uc?id={{$s->foto}}" style="height: 250px;width: 100%;"> 
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

    <div class="container">
      <div class="row" style="margin-top: 10px;margin-bottom: 10px;">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <strong>Copyright &copy; {{date('Y')}} <a href="{{ route('/') }}">{{$web->nama_website}}</a>. Developed by 
            <a href="mailto:dekiakbar@linuxmail.org"> Deki</a>.
          </strong>
        </div>
      </div>
    </div>

  </footer>

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <script src="{{secure_asset('web/lib/jquery/jquery.min.js')}}"></script>
  <script src="{{secure_asset('web/lib/bootstrap/js/bootstrap.min.js')}}"></script>
  <script src="{{secure_asset('web/lib/owlcarousel/owl.carousel.min.js')}}"></script>
  <script src="{{secure_asset('web/lib/venobox/venobox.min.js')}}"></script>
  <script src="{{secure_asset('web/lib/knob/jquery.knob.js')}}"></script>
  <script src="{{secure_asset('web/lib/wow/wow.min.js')}}"></script>
  <script src="{{secure_asset('web/lib/parallax/parallax.js')}}"></script>
  <script src="{{secure_asset('web/lib/easing/easing.min.js')}}"></script>
  <script src="{{secure_asset('web/lib/nivo-slider/js/jquery.nivo.slider.js')}}" type="text/javascript"></script>
  <script src="{{secure_asset('web/lib/appear/jquery.appear.js')}}"></script>
  <script src="{{secure_asset('web/lib/isotope/isotope.pkgd.min.js')}}"></script>
  <script src="{{secure_asset('web/js/main.js')}}"></script>
  <script src="{{ secure_asset('web/js/moment.js') }}" type="text/javascript"></script>
  <script src="{{ secure_asset('web/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
  <script type="text/javascript">
    $(function () {
        $('#l_bayi,#l_ibu,#p_ibu,#l_ayah,#p_ayah,#tl,#tl1,#tl2,#l_pengaduan,#sk_tl,#sktm_tl').datetimepicker({
           format:'DD-MM-YYYY HH:mm:ss',
        });
    });
  </script>
</body>

</html>
