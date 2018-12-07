<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>{{$web->nama_website}} | @yield('judul')</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700|Raleway:300,400,400i,500,500i,700,800,900" rel="stylesheet">

  <link href="{{secure_asset('web/lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

  <link href="{{secure_asset('web/lib/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
  <link href="{{secure_asset('web/css/style.css')}}" rel="stylesheet">
  <link href="{{secure_asset('web/css/blog.css')}}" rel="stylesheet">

  <link href="{{secure_asset('web/css/responsive.css')}}" rel="stylesheet">
</head>

<body data-spy="scroll" data-target="#navbar-example">

  <div id="preloader"></div>
  
  <header>
    <div id="sticker" class="header-area" style="background-color: black;">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12">

            <nav class="navbar navbar-default navbar-fixed">
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
                  <li>
                    <a class="page-scroll" href="{{ route('/') }}#home">Home</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="{{ route('/') }}#tentang">Tentang</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="{{ route('/') }}#pelayanan">Pelayanan</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="{{ route('/') }}#struktur">Struktur Organisasi</a>
                  </li>
                  <li class="active">
                    <a class="page-scroll" href="{{ route('/') }}#struktur">Berita</a>
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

  @yield('isi')

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

  <script src="{{secure_asset('web/lib/jquery/jquery.min.js')}}"></script>
  <script src="{{secure_asset('web/lib/bootstrap/js/bootstrap.min.js')}}"></script>
  <script type="text/javascript">
     $(window).on('load', function() {
      var pre_loader = $('#preloader');
      pre_loader.fadeOut('slow', function() {
        $(this).remove();
      });
    });
  </script>
</body>

</html>