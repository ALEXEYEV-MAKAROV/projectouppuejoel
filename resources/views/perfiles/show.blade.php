@extends('layouts.public')

@section('title', $member->name . ' - Perfil Académico')

@section('page-banner')
<div class="page-banner bg-img bg-img-parallax overlay-dark" style="background-image: url({{ asset('assets/img/bg_image_3.jpg') }});">
  <div class="container h-100 d-flex justify-content-center align-items-center">
    <h1 class="fg-white text-center">{{ $member->name }}</h1>
  </div>
</div>
@endsection

@section('content')
<div class="page-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 text-center">
        @if($member->photo_path)
          <img src="{{ asset('storage/' . $member->photo_path) }}" class="rounded-circle mb-4 shadow" width="250" alt="{{ $member->name }}">
        @else
          <img src="{{ asset('assets/img/person/default.jpg') }}" class="rounded-circle mb-4 shadow" width="250" alt="{{ $member->name }}">
        @endif
        
        <h4>{{ $member->area }}</h4>
        <p class="text-muted">{{ $member->institution ?? 'Universidad Politécnica de Puebla' }}</p>
        
        @if($member->orcid_url)
        <div class="mt-3 mb-3">
          <p class="mb-2"><strong>ORCID:</strong></p>
          <a href="{{ $member->orcid_url }}" target="_blank" class="btn btn-sm btn-outline-success">
            <span class="mai-link"></span> {{ str_replace('https://orcid.org/', '', $member->orcid_url) }}
          </a>
        </div>
        @endif

        @if($member->researcher_id)
        <div class="mt-3 mb-3">
          <p class="mb-2"><strong>Researcher ID:</strong></p>
          <span class="badge badge-info">{{ $member->researcher_id }}</span>
        </div>
        @endif

        @if($member->email)
        <div class="mt-3 mb-3">
          <p class="mb-2"><strong>Correo:</strong></p>
          <a href="mailto:{{ $member->email }}" class="text-primary">
            {{ $member->email }}
          </a>
        </div>
        @endif
      </div>

      <div class="col-lg-8">
        <h3 class="mb-3">Perfil Académico</h3>
        
        @if($member->excerpt)
        <div class="alert alert-light border-left border-primary mb-4">
          <p class="mb-0"><em>{{ $member->excerpt }}</em></p>
        </div>
        @endif

        @if($member->profile_body)
        <div class="profile-content">
          {!! nl2br(e($member->profile_body)) !!}
        </div>
        @else
        <p>Miembro del equipo académico del proyecto "Gestión de la Cadena de Valor Empresarial en la MyPE".</p>
        @endif

        <div class="mt-5">
          <h4 class="mb-3">Contribución en RegeneraMyPE</h4>
          <p>
            Como parte del equipo académico del proyecto "Gestión de la Cadena de Valor Empresarial en la MyPE", 
            {{ $member->name }} contribuye activamente en el desarrollo de estrategias y soluciones para el 
            fortalecimiento de micro y pequeñas empresas en la región.
          </p>
        </div>

        <div class="alert alert-info mt-4" role="alert">
          <strong>Colaboración:</strong> Para más información sobre proyectos de investigación, servicio social, 
          estancias o estadías, puede contactar a través de 
          <a href="mailto:{{ $member->email ?? 'regenerapyme@gmail.com' }}" class="alert-link">
            {{ $member->email ?? 'regenerapyme@gmail.com' }}
          </a>
        </div>

        <div class="mt-4">
          <a href="{{ route('team') }}" class="btn btn-outline-primary">
            <span class="mai-arrow-back"></span> Volver al Equipo
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection