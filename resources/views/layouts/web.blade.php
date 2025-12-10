<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>RegeneraMyPE - @yield('title', 'Inicio')</title>

  <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/maicons.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/vendor/animate/animate.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/vendor/owl-carousel/css/owl.carousel.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/vendor/fancybox/css/jquery.fancybox.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/theme.css') }}">

  <style>
    .navbar-brand img { height: 50px; }
    .navbar-nav .nav-link {
      font-size: 0.9rem;
      padding-left: 0.7rem !important;
      padding-right: 0.7rem !important;
    }
  </style>
</head>
<body>

  <div class="back-to-top"></div>

  <header>
    <div class="top-bar">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-8">
            <div class="d-inline-block">
              <span class="mai-mail fg-primary"></span> <a href="mailto:regenerapyme@gmail.com">regenerapyme@gmail.com</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container">
        <a href="{{ url('/') }}" class="navbar-brand d-flex align-items-center">
          <img src="{{ asset('assets/img/icons/logo.png') }}" alt="RegeneraMyPE">
          <span class="ml-2">Regenera<span class="text-primary">MyPE</span></span>
        </a>

        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse collapse" id="navbarContent">
          <ul class="navbar-nav ml-auto pt-3 pt-lg-0">
            <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
              <a href="{{ url('/') }}" class="nav-link">Inicio</a>
            </li>
            <li class="nav-item {{ request()->is('acerca-de') ? 'active' : '' }}">
              <a href="{{ url('/acerca-de') }}" class="nav-link">Acerca de</a>
            </li>
            <li class="nav-item {{ request()->is('equipo*') ? 'active' : '' }}">
              <a href="{{ url('/equipo') }}" class="nav-link">Equipo</a>
            </li>
            <li class="nav-item {{ request()->is('informacion-academica') ? 'active' : '' }}">
              <a href="{{ url('/informacion-academica') }}" class="nav-link">Información Académica</a>
            </li>
            <li class="nav-item {{ request()->is('temas-interes') ? 'active' : '' }}">
              <a href="{{ url('/temas-interes') }}" class="nav-link">Temas de Interés</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    
    @yield('banner')
    
  </header>

  <main>
    @yield('content')
  </main>

  <footer class="page-footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 py-3">
          <h3>Regenera<span class="fg-primary">MyPE</span></h3>
          <p class="mt-3">Gestión de la Cadena de Valor Empresarial en la MyPE</p>
        </div>
        <div class="col-lg-4 py-3">
          <h5>Información de Contacto</h5>
          <p><a href="https://www.uppuebla.edu.mx/" target="_blank">Universidad Politécnica de Puebla</a></p>
          <p>Email: regenerapyme@gmail.com</p>
        </div>
        <div class="col-lg-4 py-3">
          <h5>Enlaces</h5>
          <ul class="footer-menu">
            <li><a href="{{ url('/') }}">Inicio</a></li>
            <li><a href="{{ url('/acerca-de') }}">Acerca de</a></li>
            <li><a href="{{ url('/equipo') }}">Equipo</a></li>
            <li><a href="{{ url('/informacion-academica') }}">Información Académica</a></li>
            <li><a href="{{ url('/temas-interes') }}">Temas de Interés</a></li>
          </ul>
        </div>
      </div>

      <hr>

      <div class="row mt-4">
        <div class="col-md-12 text-center">
          <p>© 2025 Universidad Politécnica de Puebla · RegeneraMyPE</p>
        </div>
      </div>
    </div>
  </footer>

  <script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script>
  <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/owl-carousel/js/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/wow/wow.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/fancybox/js/jquery.fancybox.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/isotope/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('assets/js/google-maps.js') }}"></script>
  <script src="{{ asset('assets/js/theme.js') }}"></script>

</body>
</html>