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

      <div class="row text-center">
        <div class="services-contents">
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="about-move">
              <div class="services-details">
                <div class="single-services">
                  <a class="services-icon" href="#">
											<i class="fa fa-id-card"></i>
										</a>
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
                  <a class="services-icon" href="#">
											<i class="fa fa-sticky-note"></i>
										</a>
                  <h4>Surat Kelahiran</h4>
                  <p>
                    Untukmengajukan Surat keterangan kelahiran anda dapat klik menu ini dan mohon isi form yang telah disediakan. 
                  </p>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class=" about-move">
              <div class="services-details">
                <div class="single-services">
                  <a class="services-icon" href="#">
											<i class="fa fa-gavel"></i>
										</a>
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
                  <a class="services-icon" href="#">
											<i class="fa fa-truck"></i>
										</a>
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
            <div class="col-md-3 col-sm-3 col-xs-12">
              <div class="single-team-member">
                <div class="team-img">
                  <a href="#">
                      <img src="{{asset('storage/struktur/'.$s->foto)}}" alt="">
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
</body>

</html>
