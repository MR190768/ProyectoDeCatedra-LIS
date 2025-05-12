@extends('layouts.app')
<meta charset="utf-8">
<title>Acorpe - Sobre Nosotros</title>
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta content="Bufete de Abogados, Plantillas Legales" name="keywords">
<meta content="Conozca más sobre nuestro bufete y servicios jurídicos" name="description">
@section('content')
<!-- Encabezado de Página Start -->
<div class="container-fluid bg-page-header" style="margin-bottom: 90px;">
    <div class="container">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
            <h3 class="display-3 text-white text-uppercase">Nuestra Misión</h3>
            <div class="d-inline-flex text-white">
                <p class="m-0 text-uppercase"><a class="text-white" href="{{route('inicio')}}">Inicio</a></p>
                <i class="fa fa-angle-double-right pt-1 px-3"></i>
                <p class="m-0 text-uppercase">Acerca de nosotros</p>
            </div>
        </div>
    </div>
</div>
<!-- Encabezado de Página End -->

<!-- Sobre Nosotros Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-6">
                <img class="img-fluid rounded" src="{{asset('img/about.jpg')}}" alt="Equipo Acorpe">
            </div>
            <div class="col-lg-6 mt-4 mt-lg-0">
                <h2 class="position-relative text-center bg-white text-primary rounded p-3 mt-4 mb-4">Comprometidos con la Excelencia Legal</h2>
                <h6 class="text-uppercase">¿Quiénes Somos?</h6>
                <h1 class="mb-4">Su Socio Legal de Confianza</h1>
                <p>En Acorpe combinamos tradición jurídica con innovación tecnológica. Somos un bufete comprometido con facilitar el acceso a soluciones legales mediante:</p>
                <ul class="list-unstyled">
                    <li class="mb-3"><i class="fa fa-check text-primary mr-2"></i>Repositorio de plantillas legales gratuitas</li>
                    <li class="mb-3"><i class="fa fa-check text-primary mr-2"></i>Asesoría especializada en múltiples áreas del derecho</li>
                    <li class="mb-3"><i class="fa fa-check text-primary mr-2"></i>Plataforma digital accesible 24/7</li>
                    <li class="mb-3"><i class="fa fa-check text-primary mr-2"></i>Transparencia y ética profesional</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Sobre Nosotros End -->

<!-- Formulario de Cita Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="bg-primary rounded p-5">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <h2 class="text-white mb-4">Agende una Consulta Legal</h2>
                    <p class="text-white">Complete el formulario y un especialista se pondrá en contacto para coordinar su cita</p>
                    <div class="d-flex text-white mb-3">
                        <div class="mr-4">
                            <i class="fa fa-phone-alt fa-2x"></i>
                            <p class="mt-2">+503 2222-3333</p>
                        </div>
                        <div>
                            <i class="fa fa-envelope fa-2x"></i>
                            <p class="mt-2">consultas@acorpe.com</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="bg-white rounded p-5">
                        <form>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Nombre Completo" required>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Correo Electrónico" required>
                            </div>
                            <div class="form-group">
                                <select class="form-control" required>
                                    <option value="">Seleccione Área Legal</option>
                                    <option>Derecho Penal</option>
                                    <option>Derecho Civil</option>
                                    <option>Derecho Mercantil</option>
                                    <option>Otros</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" rows="4" placeholder="Describa brevemente su caso" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Enviar Solicitud</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Formulario de Cita End -->

<!-- Nuestros Valores Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <div class="bg-light rounded p-5">
                    <h2 class="mb-4">¿Por Qué Elegirnos?</h2>
                    <div class="d-flex mb-4">
                        <div class="btn-primary btn-lg-square px-3" style="border-radius: 50px;">
                            <h5 class="text-secondary m-0">01</h5>
                        </div>
                        <div class="ml-4">
                            <h5>Recursos Accesibles</h5>
                            <p class="m-0">Plantillas legales gratuitas y actualizadas</p>
                        </div>
                    </div>
                    <div class="d-flex mb-4">
                        <div class="btn-primary btn-lg-square px-3" style="border-radius: 50px;">
                            <h5 class="text-secondary m-0">02</h5>
                        </div>
                        <div class="ml-4">
                            <h5>Expertos Especializados</h5>
                            <p class="m-0">Abogados con amplia experiencia en cada área</p>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="btn-primary btn-lg-square px-3" style="border-radius: 50px;">
                            <h5 class="text-secondary m-0">03</h5>
                        </div>
                        <div class="ml-4">
                            <h5>Atención Personalizada</h5>
                            <p class="m-0">Seguimiento individualizado de cada caso</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="position-relative h-100 rounded overflow-hidden">
                    <img class="position-absolute w-100 h-100" src="{{asset('img/feature.jpg')}}" style="object-fit: cover;">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Nuestros Valores End -->
 @endsection