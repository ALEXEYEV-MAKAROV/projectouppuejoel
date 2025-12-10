@extends('layouts.public')

@section('title', 'Equipo Académico - RegeneraMyPE')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/vendor/owl-carousel/css/owl.carousel.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/fancybox/css/jquery.fancybox.css') }}">
@endpush

@section('page-banner')
<div class="page-banner bg-img bg-img-parallax overlay-dark" style="background-image: url({{ asset('assets/img/bg_image_3.jpg') }});">
  <div class="container h-100">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-lg-8">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
            <li class="breadcrumb-item active" aria-current="page">Equipo Académico</li>
          </ol>
        </nav>
        <h1 class="fg-white text-center">Equipo Académico</h1>
      </div>
    </div>
  </div>
</div>
@endsection

@section('content')
<div class="page-section">
  <div class="container">
    <div class="text-center">
      <div class="subhead">RegeneraMyPE</div>
      <h2 class="title-section">
        Gestión de la Cadena de Valor Empresarial en la MyPE
      </h2>
      <p class="text-muted" style="max-width: 800px; margin: 0 auto;">
        Universidad Politécnica de Puebla
      </p>
    </div>

    <div class="row justify-content-center mt-5">
      
      @forelse($members as $member)
      <div class="col-md-6 col-lg-3 py-3">
        <div class="card-blog">
          <div class="header">
            <div class="avatar">
              @if($member->photo_path)
                <img src="{{ asset('storage/' . $member->photo_path) }}" alt="{{ $member->name }}">
              @else
                <img src="{{ asset('assets/img/person/default.jpg') }}" alt="{{ $member->name }}">
              @endif
            </div>
            <div class="entry-footer">
              <div class="post-author">{{ $member->name }}</div>
              <div class="post-date">{{ $member->area }}</div>
            </div>
          </div>
          <div class="body">
            <div class="post-title"><a href="{{ route('team.show', $member->slug) }}">Ver Perfil</a></div>
            <div class="post-excerpt">{{ $member->excerpt ?? 'Miembro del equipo académico' }}</div>
          </div>
          <div class="footer">
            <a href="{{ route('team.show', $member->slug) }}">Ver Perfil Completo <span class="mai-chevron-forward text-sm"></span></a>
          </div>
        </div>
      </div>
      @empty
      <div class="col-12">
        <div class="alert alert-info text-center">
          <p class="mb-0">No hay miembros del equipo disponibles en este momento.</p>
        </div>
      </div>
      @endforelse

    </div>

    <div class="text-center mt-5">
      <p class="text-muted">
        Este equipo académico trabaja en el fortalecimiento del tejido empresarial regional mediante la vinculación efectiva entre la academia y las micro y pequeñas empresas.
      </p>
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