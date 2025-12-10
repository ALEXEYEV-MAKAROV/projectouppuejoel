@extends('layouts.public')

@section('title', 'RegeneraMyPE - Gestión de la Cadena de Valor Empresarial en la MyPE')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/vendor/owl-carousel/css/owl.carousel.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/fancybox/css/jquery.fancybox.css') }}">
@endpush

@section('content')
<div class="page-section pt-5">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6 py-3">
        <div class="subhead">RegeneraMyPE</div>
        <h2 class="title-section">Gestión de la Cadena de Valor Empresarial en la <span class="fg-primary">MyPE</span></h2>

        <p>Proyecto del Cuerpo Académico de la Universidad Politécnica de Puebla enfocado en el fortalecimiento de la micro y pequeña empresa a través de la investigación aplicada, vinculación academia-empresa y desarrollo de soluciones contextualizadas.</p>

        <p>Trabajamos en establecer puentes entre directores de MyPE's con la academia (docentes y estudiantes), asumiendo los retos que impone la nueva normalidad mexicana.</p>

        <a href="{{ route('about') }}" class="btn btn-primary mt-4">Conocer Más</a>
      </div>
      <div class="col-lg-6 py-3">
        <div class="about-img">
          <img src="{{ asset('assets/img/about.jpg') }}" alt="RegeneraMyPE">
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
          <a href="{{ route('informacion-academica') }}" class="btn btn-sm btn-outline-primary mt-3">Ver más</a>
        </div>
      </div>

      <div class="col-md-6 col-lg-5 py-3">
        <div class="card-service text-center h-100">
          <div class="img-fluid mb-4">
            <img src="{{ asset('assets/img/icons/graphics_design.svg') }}" alt="">
          </div>
          <h5>Temas de Interés</h5>
          <p class="text-muted">Artículos, noticias y contenido relevante sobre gestión empresarial y desarrollo de MyPE's.</p>
          <a href="{{ route('temas-interes') }}" class="btn btn-sm btn-outline-primary mt-3">Ver más</a>
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

    @php
      $teamMembers = \App\Models\TeamMember::where('is_active', true)
                                           ->orderBy('sort_order')
                                           ->get();
    @endphp

    <div class="owl-carousel team-carousel mt-5">
      @foreach($teamMembers as $member)
      <div class="team-wrap">
        <div class="team-profile">
          @if($member->photo_path)
            <img src="{{ asset('storage/' . $member->photo_path) }}" alt="{{ $member->name }}">
          @else
            <img src="{{ asset('assets/img/person/default.jpg') }}" alt="{{ $member->name }}">
          @endif
        </div>
        <div class="team-content">
          <h5>{{ $member->name }}</h5>
          <div class="text-sm fg-grey">{{ $member->area }}</div>

          <div class="social-button">
            <a href="{{ route('team.show', $member->slug) }}"><span class="mai-eye"></span></a>
            @if($member->email)
            <a href="mailto:{{ $member->email }}"><span class="mai-mail"></span></a>
            @endif
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('assets/vendor/owl-carousel/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/vendor/wow/wow.min.js') }}"></script>
<script src="{{ asset('assets/vendor/fancybox/js/jquery.fancybox.min.js') }}"></script>
<script src="{{ asset('assets/vendor/isotope/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('assets/js/google-maps.js') }}"></script>
@endpush