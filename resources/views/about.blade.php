@extends('layouts.public')

@section('title', 'Acerca de - RegeneraMyPE')

@section('page-banner')
<div class="page-banner bg-img bg-img-parallax overlay-dark" style="background-image: url({{ asset('assets/img/bg_image_3.jpg') }});">
  <div class="container h-100">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-lg-8">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
            <li class="breadcrumb-item active" aria-current="page">Acerca de</li>
          </ol>
        </nav>
        <h1 class="fg-white text-center">Acerca de RegeneraMyPE</h1>
      </div>
    </div>
  </div>
</div>
@endsection

@section('content')
<!-- Sección: ¿Quiénes Somos? -->
<div class="page-section">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6 py-3">
        <div class="subhead">¿Quiénes Somos?</div>
        <h2 class="title-section">Gestión de la Cadena de Valor Empresarial en la <span class="fg-primary">MyPE</span></h2>

        <p>RegeneraMyPE es un proyecto del Cuerpo Académico de la Universidad Politécnica de Puebla enfocado en el fortalecimiento y desarrollo de la micro y pequeña empresa (MyPE) mexicana.</p>
        
        <p>Nuestro trabajo se centra en establecer vínculos efectivos entre los directores de micro y pequeñas empresas con la academia (docentes y estudiantes), generando espacios de colaboración que permitan asumir los retos que impone la nueva normalidad mexicana.</p>

        <p>A través de la investigación aplicada, la transferencia de conocimiento y el desarrollo de soluciones contextualizadas, buscamos fortalecer las capacidades de gestión y competitividad del sector productivo regional.</p>
      </div>
      <div class="col-lg-6 py-3">
        <div class="about-img">
          <img src="{{ asset('assets/img/about.jpg') }}" alt="RegeneraMyPE" class="img-fluid rounded shadow">
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Sección: Nuestro Símbolo -->
<div class="page-section bg-light">
  <div class="container">
    <div class="text-center mb-5">
      <div class="subhead">Nuestro Logotipo</div>
      <h2 class="title-section">El Tlacuache: Símbolo de Permanencia y Unión</h2>
    </div>

    <div class="row align-items-center">
      <div class="col-lg-5 text-center mb-4 mb-lg-0">
        <img src="{{ asset('assets/img/icons/logo.png') }}" alt="Tlacuache" class="img-fluid rounded shadow">
      </div>
      <div class="col-lg-7">
        <p class="lead">El tlacuache es el único marsupial nativo de México y representa los valores fundamentales de nuestro proyecto:</p>
        
        <ul class="list-unstyled mt-4">
          <li class="mb-3">
            <h5><span></span> Permanencia</h5>
            <p>Habitan la Tierra desde hace unos 60 millones de años y no han cambiado su morfología.</p>
          </li>
          <li class="mb-3">
            <h5><span></span> Innovación</h5>
            <p>La palabra tlacuache viene del náhuatl "tlacuatzin" que significa "Pequeño que come fuego". En la mitología mesoamericana, fue quien robó el fuego para dárselo a los hombres.</p>
          </li>
          <li class="mb-3">
            <h5><span></span> Conexión</h5>
            <p>Fue el primer mamífero mexicano que viajó a Europa oculto en los barcos que transportaban frutos desde el Nuevo Mundo.</p>
          </li>
          <li class="mb-3">
            <h5><span></span> Resiliencia</h5>
            <p>En las culturas mesoamericanas fue venerado a la altura de otros animales como el puma, muestra de su importancia en la cosmovisión ancestral.</p>
          </li>
        </ul>

        <div class="alert alert-info mt-4">
          <strong>Simbolismo:</strong> Este marsupial simboliza la unión entre lo físico y la cosmovisión ancestral mexicana. Es esta unión la que deseamos establecer entre los directores de la MyPE con la academia, teniendo presencia y asumiendo los retos de la nueva normalidad.
        </div>
      </div>
    </div>
  </div>
</div>
@endsection