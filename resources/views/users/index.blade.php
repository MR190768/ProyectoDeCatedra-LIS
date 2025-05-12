@extends('layouts.app')
<meta charset="utf-8">
<title>Acorpe - Bufete de Abogados</title>
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta content="Plantillas Legales, Bufete de Abogados" name="keywords">
<meta content="Repositorio de plantillas legales y servicios jurídicos" name="description">
@section('content')

<!-- Carrusel Start -->
<div class="container-fluid p-0 mb-5 pb-5">
    <div id="header-carousel" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item position-relative active" style="height: 70vh; min-height: 400px;">
                <img class="position-absolute w-100 h-100" src="{{asset('img/carousel-1.jpg')}}" style="object-fit: cover;">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <div class="p-3" style="max-width: 900px;">
                        <h3 class="display-4 text-white mb-4">Expertos en Soluciones Legales</h3>
                        <p class="text-light mb-5">Más de 20 años brindando asesoría jurídica de excelencia</p>
                        <a class="btn btn-primary py-3 px-5 mt-2" href="{{route('repositorio')}}">Acceder a Plantillas</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item position-relative" style="height: 70vh; min-height: 400px;">
                <img class="position-absolute w-100 h-100" src="{{asset('img/carousel-2.jpg')}}" style="object-fit: cover;">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <div class="p-3" style="max-width: 900px;">
                        <h3 class="display-4 text-white mb-4">Asesoría Legal Especializada</h3>
                        <p class="text-light mb-5">Protegiendo tus derechos con profesionalismo y ética</p>
                        <a class="btn btn-primary py-3 px-5 mt-2" href="{{route('contacto')}}">Contactar Abogado</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Carrusel End -->

<!-- Sobre Nosotros Start -->
<div class="container-fluid py-1">
    <div class="container py-1">
        <div class="row">
            <div class="col-lg-5">
                <img class="img-fluid rounded" src="img/about.jpg" alt="Equipo Acorpe">
            </div>
            <div class="col-lg-7 mt-4 mt-lg-0">
            <h2 class="text-center bg-white text-primary rounded p-3 mt-4 mb-4 d-none d-lg-block" style="top: 0; width: 350px; margin-left: calc(50% - 175px); z-index: 10;">20+ Años de Experiencia</h2>
                <h6 class="text-uppercase">Nuestra Firma</h6>
                <h1 class="mb-4">Servicios Legales Confiables y Efectivos</h1>
                <p>En Acorpe nos dedicamos a brindar soluciones jurídicas integrales y de calidad. Nuestro repositorio de plantillas legales está diseñado para apoyar a la comunidad en sus necesidades legales básicas, mientras que nuestro equipo de abogados especializados está disponible para asesoramiento personalizado.</p>
                <a href="{{route('about')}}" class="btn btn-primary mt-2">Conózcanos</a>
            </div>
        </div>
    </div>
</div>
<!-- Sobre Nosotros End -->

<!-- Especialidades Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-3">
                <h6 class="text-uppercase">Nuestras Áreas</h6>
                <h1 class="mb-4">Especialidades Legales</h1>
                <p>Contamos con expertise en diversas ramas del derecho para ofrecer soluciones integrales</p>
            </div>
            <div class="col-lg-9 pt-5 pt-lg-0">
                <div class="row">
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <div class="card-body text-center">
                                <i class="fa fa-gavel fa-3x text-primary mb-3"></i>
                                <h5>Derecho Penal</h5>
                                <p>Defensa y asesoría en procesos penales y delitos</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <div class="card-body text-center">
                                <i class="fa fa-balance-scale fa-3x text-primary mb-3"></i>
                                <h5>Derecho Civil</h5>
                                <p>Contratos, sucesiones, familia y propiedad</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <div class="card-body text-center">
                                <i class="fa fa-briefcase fa-3x text-primary mb-3"></i>
                                <h5>Derecho Mercantil</h5>
                                <p>Asesoría corporativa y negocios</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Especialidades End -->

<!-- Abogados Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="text-center pb-2">
            <h6 class="text-uppercase">Nuestro Equipo</h6>
            <h1 class="mb-4">Abogados Especializados</h1>
        </div>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card text-center">
                    <img class="card-img-top" src="{{asset('img/team-1.jpg')}}" alt="Abogado 1">
                    <div class="card-body">
                        <h5 class="card-title">Lic. Conan Alvarado Rodríguez</h5>
                        <p class="card-text">Especialista en Derecho Penal</p>
                        <a href="{{route('contacto')}}" class="btn btn-primary">Contactar</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card text-center">
                    <img class="card-img-top" src="{{asset('img/team-2.jpg')}}" alt="Abogado 2">
                    <div class="card-body">
                        <h5 class="card-title">Lic. Carlos Martínez</h5>
                        <p class="card-text">Especialista en Derecho Civil</p>
                        <a href="{{route('contacto')}}" class="btn btn-primary">Contactar</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card text-center">
                    <img class="card-img-top" src="{{asset('img/team-3.jpg')}}" alt="Abogado 3">
                    <div class="card-body">
                        <h5 class="card-title">Lic. Ana Jiménez</h5>
                        <p class="card-text">Especialista en Derecho Mercantil</p>
                        <a href="{{route('contacto')}}" class="btn btn-primary">Contactar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Abogados End -->
 @endsection