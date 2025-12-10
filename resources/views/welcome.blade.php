@extends('layouts.web')

@section('title', 'Inicio')

@section('content')

    <div class="page-section pt-5">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6 py-3">
            <div class="subhead">RegeneraMyPE</div>
            <h2 class="title-section">Gestión de la Cadena de Valor Empresarial en la <span class="fg-primary">MyPE</span></h2>

            <p>Proyecto del Cuerpo Académico de la Universidad Politécnica de Puebla enfocado en el fortalecimiento y desarrollo de la micro y pequeña empresa (MyPE) mexicana.</p>

            <p>Trabajamos en establecer puentes entre directores de MyPE's con la academia (docentes y estudiantes), asumiendo los retos que impone la nueva normalidad mexicana.</p>

            <a href="{{ url('/acerca-de') }}" class="btn btn-primary mt-4">Conocer Más</a>
          </div>
          <div class="col-lg-6 py-3">
            <div class="about-img">
              <img src="{{ asset('assets/img/about.jpg') }}" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="page-section">
      <div class="container">
        <div class="text-center">
          <div class="subhead">Nuestros Servicios</div>
          <h2 class="title-section">Áreas de Apoyo</h2>
        </div>

        <div class="row justify-content-center mt-5">
          <div class="col-md-6 col-lg-5 py-3">
            <div class="card-service text-center h-100">
              <div class="img-fluid mb-4">
                <img src="{{ asset('assets/img/icons/web_development.svg') }}" alt="">
              </div>
              <h5>Información Académica</h5>
              <p class="text-muted">Publicaciones, líneas de investigación, proyectos de titulación y material académico disponible.</p>
              <a href="{{ url('/informacion-academica') }}" class="btn btn-sm btn-outline-primary mt-3">Ver más</a>
            </div>
          </div>

          <div class="col-md-6 col-lg-5 py-3">
            <div class="card-service text-center h-100">
              <div class="img-fluid mb-4">
                <img src="{{ asset('assets/img/icons/graphics_design.svg') }}" alt="">
              </div>
              <h5>Temas de Interés</h5>
              <p class="text-muted">Artículos, noticias y contenido relevante sobre gestión empresarial y desarrollo de MyPE's.</p>
              <a href="{{ url('/temas-interes') }}" class="btn btn-sm btn-outline-primary mt-3">Ver más</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="page-section">
      <div class="container">
        <div class="text-center">
          <div class="subhead">Nuestro Equipo</div>
          <h2 class="title-section">Equipo Académico</h2>
        </div>

        <div class="owl-carousel team-carousel mt-5">
            {{-- 
               NOTA: Por ahora dejamos estos datos fijos tal cual venían en tu HTML.
               Más adelante, cambiaremos esto por un @foreach($members as $member)
               para que jale los datos reales de la base de datos.
            --}}

          <div class="team-wrap">
            <div class="team-profile">
              <img src="{{ asset('assets/img/person/araceli.jpg') }}" alt="">
            </div>
            <div class="team-content">
              <h5>Dra. Araceli Ortíz Carranco</h5>
              <div class="text-sm fg-grey">Administración y Mercadotecnia</div>
              <div class="social-button">
                <a href="#"><span class="mai-eye"></span></a>
                <a href="mailto:regenerapyme@gmail.com"><span class="mai-mail"></span></a>
              </div>
            </div>
          </div>

          <div class="team-wrap">
            <div class="team-profile">
              <img src="{{ asset('assets/img/person/gonzalo.jpg') }}" alt="">
            </div>
            <div class="team-content">
              <h5>Dr. José Gonzalo Ramírez Rosas</h5>
              <div class="text-sm fg-grey">Contabilidad e Impuestos</div>
              <div class="social-button">
                <a href="#"><span class="mai-eye"></span></a>
                <a href="mailto:regenerapyme@gmail.com"><span class="mai-mail"></span></a>
              </div>
            </div>
          </div>

          <div class="team-wrap">
            <div class="team-profile">
              <img src="{{ asset('assets/img/person/lozada.webp') }}" alt="">
            </div>
            <div class="team-content">
              <h5>Dr. Jorge Lozada Lechuga</h5>
              <div class="text-sm fg-grey">Estadística Avanzada y Biotecnología</div>
              <div class="social-button">
                <a href="#"><span class="mai-eye"></span></a>
                <a href="mailto:regenerapyme@gmail.com"><span class="mai-mail"></span></a>
              </div>
            </div>
          </div>

          <div class="team-wrap">
            <div class="team-profile">
              <img src="{{ asset('assets/img/person/salvador.jpg') }}" alt="">
            </div>
            <div class="team-content">
              <h5>Dr. Salvador Arroyo Díaz</h5>
              <div class="text-sm fg-grey">Transformación Digital</div>
              <div class="social-button">
                <a href="#"><span class="mai-eye"></span></a>
                <a href="mailto:regenerapyme@gmail.com"><span class="mai-mail"></span></a>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
@endsection