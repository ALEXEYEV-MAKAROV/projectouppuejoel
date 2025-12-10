@extends('layouts.public')

@section('title', 'Temas de Interés - RegeneraMyPE')

@section('custom-styles')
<style>
  .topic-card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    height: 100%;
    border-left: 4px solid #007bff;
  }
  .topic-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 20px rgba(0,0,0,0.1);
  }
  .topic-icon {
    font-size: 48px;
    color: #007bff;
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
            <li class="breadcrumb-item active" aria-current="page">Temas de Interés</li>
          </ol>
        </nav>
        <h1 class="fg-white text-center">Temas de Interés</h1>
      </div>
    </div>
  </div>
</div>
@endsection

@section('content')
<div class="page-section">
  <div class="container">
    <div class="text-center mb-5">
      <div class="subhead">Recursos y Material</div>
      <h2 class="title-section">Contenido para MyPE's</h2>
      <p class="text-muted" style="max-width: 800px; margin: 0 auto;">
        Presentaciones y material educativo sobre temas relevantes para la gestión de micro y pequeñas empresas
      </p>
    </div>

    <div class="row">
      @forelse($topics as $topic)
      <div class="col-md-6 col-lg-4 py-3">
        <div class="card topic-card shadow-sm">
          <div class="card-body">
            <div class="mb-3 topic-icon">
              @if($topic->icon_class)
                <span class="{{ $topic->icon_class }}"></span>
              @else
                <span class="mai-document-outline"></span>
              @endif
            </div>
            <h5 class="card-title">{{ $topic->title }}</h5>
            
            @if($topic->description)
            <p class="card-text">{{ $topic->description }}</p>
            @endif
            
            @if($topic->resource_url)
            <a href="{{ $topic->resource_url }}" target="_blank" class="btn btn-sm btn-outline-primary">
              <span class="mai-document"></span> Ver Recurso
            </a>
            @endif
          </div>
        </div>
      </div>
      @empty
      <div class="col-12">
        <div class="alert alert-info text-center">
          <p class="mb-0">No hay temas de interés disponibles en este momento.</p>
        </div>
      </div>
      @endforelse
    </div>

    <!-- Sección de contacto -->
    <div class="row mt-5">
      <div class="col-12">
        <div class="card bg-light">
          <div class="card-body text-center py-5">
            <h4>¿Necesitas más información sobre alguno de estos temas?</h4>
            <p class="mb-4">Nuestro equipo académico está disponible para proporcionar orientación y material especializado</p>
            <a href="mailto:regenerapyme@gmail.com" class="btn btn-primary">Contactar</a>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
@endsection