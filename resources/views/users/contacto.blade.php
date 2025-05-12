@extends('layouts.app')
<meta charset="utf-8">
<title>Acorpe - Contacto</title>
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta content="Contacto Legal, Abogados El Salvador" name="keywords">
<meta content="Información de contacto de nuestro bufete legal" name="description">

@section('content')
<!-- Encabezado de Página Start -->
<div class="container-fluid bg-page-header" style="margin-bottom: 90px;">
    <div class="container">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
            <h3 class="display-3 text-white text-uppercase">Contacto</h3>
            <div class="d-inline-flex text-white">
                <p class="m-0 text-uppercase"><a class="text-white" href="{{route('inicio')}}">Inicio</a></p>
                <i class="fa fa-angle-double-right pt-1 px-3"></i>
                <p class="m-0 text-uppercase">Contacto</p>
            </div>
        </div>
    </div>
</div>
<!-- Encabezado de Página End -->

<!-- Contacto Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="row">
            <!-- Información de Contacto -->
            <div class="col-lg-6 mb-5 mb-lg-0">
                <div class="mb-5">
                    <h4 class="text-primary mb-4"><i class="fa fa-map-marker-alt mr-2"></i>Nuestra Ubicación</h4>
                    <p>Soyapango, San Salvador, El Salvador</p>
                </div>

                <div class="mb-5">
                    <h4 class="text-primary mb-4"><i class="fa fa-users mr-2"></i>Abogados Disponibles</h4>
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="card border-0 shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title">Lic. María Rodríguez</h5>
                                    <p class="card-text text-muted">Penalista</p>
                                    <p class="card-text">
                                        <i class="fa fa-phone-alt mr-2"></i>+503 7888-9999<br>
                                        <i class="fa fa-envelope mr-2"></i>m.rodriguez@acorpe.com
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="card border-0 shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title">Lic. Carlos Martínez</h5>
                                    <p class="card-text text-muted">Civilista</p>
                                    <p class="card-text">
                                        <i class="fa fa-phone-alt mr-2"></i>+503 7666-7777<br>
                                        <i class="fa fa-envelope mr-2"></i>c.martinez@acorpe.com
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-5">
                    <h4 class="text-primary mb-4"><i class="fa fa-clock mr-2"></i>Horario de Atención</h4>
                    <p class="mb-1">Lunes a Viernes: 8:00 AM - 5:00 PM</p>
                    <p>Sábados: 8:00 AM - 12:00 PM</p>
                </div>
            </div>

            <!-- Mapa -->
            <div class="col-lg-6" style="min-height: 400px;">
                <div class="position-relative h-100 rounded overflow-hidden">
                    <iframe style="width: 100%; height: 100%; border:0;"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3876.123966434643!2d-89.1523116857181!3d13.710490601346934!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f6333964964813d%3A0xb5ef9b5d3abf2065!2sSoyapango!5e0!3m2!1ses!2ssv!4v1658961233124!5m2!1ses!2ssv"
                        allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contacto End -->
@endsection