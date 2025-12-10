@extends('layouts.public')

@section('title', 'Información Académica - RegeneraMyPE')

@section('custom-styles')
<style>
  .publication-card {
    border-left: 4px solid #007bff;
    transition: transform 0.3s ease;
  }
  .publication-card:hover {
    transform: translateX(5px);
  }
  .year-header {
    border-bottom: 3px solid #007bff;
    padding-bottom: 10px;
    margin-bottom: 20px;
  }
</style>
@endsection

@section('page-banner')
<div class="page-banner bg-img bg-img-parallax overlay-dark" style="background-image: url({{ asset('assets/img/bg_image_3.jpg') }});">
  <div class="container h-100">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-lg-8">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
            <li class="breadcrumb-item active" aria-current="page">Información Académica</li>
          </ol>
        </nav>
        <h1 class="fg-white text-center">Información Académica</h1>
      </div>
    </div>
  </div>
</div>
@endsection

@section('content')
<div class="page-section">
  <div class="container">
    <div class="text-center mb-5">
      <div class="subhead">Publicaciones y Resultados</div>
      <h2 class="title-section">Investigación Aplicada</h2>
      <p class="text-muted" style="max-width: 800px; margin: 0 auto;">
        Resultados de investigaciones de campo empresariales desarrolladas por nuestro equipo académico
      </p>
    </div>

    @php
      $publicationsByYear = $publications->groupBy('publication_year')->sortKeysDesc();
    @endphp

    @forelse($publicationsByYear as $year => $yearPublications)
    <!-- Publicaciones por año -->
    <div class="row mb-5">
      <div class="col-12">
        <h3 class="year-header text-primary">{{ $year }}</h3>
        
        @foreach($yearPublications as $publication)
        <div class="card publication-card shadow-sm mb-3">
          <div class="card-body">
            <h5 class="card-title">{{ $publication->title }}</h5>
            
            @if($publication->authors || $publication->publication_info || $publication->issn)
            <p class="mb-2">
              @if($publication->authors)
                <strong>Autores:</strong> {{ $publication->authors }}<br>
              @endif
              @if($publication->publication_info)
                <strong>Publicación:</strong> {{ $publication->publication_info }}<br>
              @endif
              @if($publication->issn)
                <strong>ISSN:</strong> {{ $publication->issn }}
              @endif
            </p>
            @endif
            
            @if($publication->description)
            <p class="card-text">
              {{ $publication->description }}
            </p>
            @endif
            
            <div class="mt-3">
              @if($publication->primary_link)
              <a href="{{ $publication->primary_link }}" target="_blank" class="btn btn-sm btn-outline-primary">
                <span class="mai-document"></span> Ver documento
              </a>
              @endif
              
              @if($publication->secondary_link)
              <a href="{{ $publication->secondary_link }}" target="_blank" class="btn btn-sm btn-outline-secondary ml-2">
                <span class="mai-link"></span> Enlace alternativo
              </a>
              @endif
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
    @empty
    <div class="row mb-5">
      <div class="col-12">
        <div class="alert alert-info text-center">
          <p class="mb-0">No hay publicaciones disponibles en este momento.</p>
        </div>
      </div>
    </div>
    @endforelse

    <!-- Líneas de investigación activas -->
    <div class="row mt-5">
      <div class="col-12">
        <h3 class="mb-4">Líneas de Investigación Activas</h3>
        <div class="row">
          <div class="col-md-6 mb-4">
            <div class="card h-100 border-left-primary">
              <div class="card-body">
                <h5 class="card-title"><span class="mai-cash text-primary"></span> Gestión Financiera</h5>
                <p class="card-text">Investigación sobre modelos de financiamiento, crowdfunding y gestión fiscal para MyPE's.</p>
              </div>
            </div>
          </div>
          <div class="col-md-6 mb-4">
            <div class="card h-100 border-left-primary">
              <div class="card-body">
                <h5 class="card-title"><span class="mai-trending-up text-primary"></span> Marketing y Mercadotecnia</h5>
                <p class="card-text">Desarrollo de estrategias de marketing digital, endomarketing y mercadotecnia de servicios.</p>
              </div>
            </div>
          </div>
          <div class="col-md-6 mb-4">
            <div class="card h-100 border-left-primary">
              <div class="card-body">
                <h5 class="card-title"><span class="mai-settings text-primary"></span> Procesos y Operaciones</h5>
                <p class="card-text">Optimización de procesos productivos, mejora continua y gestión de calidad.</p>
              </div>
            </div>
          </div>
          <div class="col-md-6 mb-4">
            <div class="card h-100 border-left-primary">
              <div class="card-body">
                <h5 class="card-title"><span class="mai-analytics text-primary"></span> Transformación Digital</h5>
                <p class="card-text">Implementación de tecnologías digitales y procesos de transformación organizacional.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Llamado a la acción -->
    <div class="row mt-5">
      <div class="col-12">
        <div class="card bg-light">
          <div class="card-body text-center py-5">
            <h4>¿Interesado en colaborar en proyectos de investigación?</h4>
            <p class="mb-4">Nuestro equipo académico está disponible para colaboraciones de investigación, dirección de tesis y proyectos aplicados con el sector empresarial</p>
            <a href="mailto:regenerapyme@gmail.com" class="btn btn-primary">Contactar</a>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
@endsection