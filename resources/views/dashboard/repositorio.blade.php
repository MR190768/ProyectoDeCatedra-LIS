@extends('layouts.app')
<meta charset="utf-8">
<title>Acorpe - Repositorio Legal</title>
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta content="Plantillas Legales, Documentos Jurídicos" name="keywords">
<meta content="Acceda a nuestro repositorio de plantillas legales gratuitas" name="description">
@section('content')
<!-- Encabezado de Página Start -->
<div class="container-fluid bg-page-header" style="margin-bottom: 90px;">
    <div class="container">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
            <h3 class="display-3 text-white text-uppercase">Repositorio Legal</h3>
            <div class="d-inline-flex text-white">
                <p class="m-0 text-uppercase"><a class="text-white" href="{{route('inicio')}}">Inicio</a></p>
                <i class="fa fa-angle-double-right pt-1 px-3"></i>
                <p class="m-0 text-uppercase">Plantillas</p>
            </div>
        </div>
    </div>
</div>
<!-- Encabezado de Página End -->

<!-- Contenido Principal Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="row">
            <!-- Sidebar de Categorías -->
            <div class="col-lg-3 mb-5">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0"><i class="fa fa-filter mr-2"></i>Filtrar por</h5>
                    </div>
                    <div class="card-body">
                        <h6 class="text-primary mb-3"><i class="fa fa-folder-open mr-2"></i>Categorías</h6>
                        <div class="list-group list-group-flush">
                            <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                Penal
                                <span class="badge badge-primary badge-pill">8</span>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                Civil
                                <span class="badge badge-primary badge-pill">12</span>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                Mercantil
                                <span class="badge badge-primary badge-pill">15</span>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                Laboral
                                <span class="badge badge-primary badge-pill">5</span>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                Familia
                                <span class="badge badge-primary badge-pill">7</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Listado de Plantillas -->
            <div class="col-lg-9">
                <!-- Barra de Búsqueda -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Buscar plantilla...">
                            <div class="input-group-append">
                                <button class="btn btn-primary">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Resultados -->
                <div class="row">
                    <!-- Plantilla Modificada -->
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-header bg-light">
                                <small class="text-primary"><i class="fa fa-file-contract mr-2"></i>Poder Legal</small>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Modelo de Poder - Imputados</h5>
                                <p class="card-text text-muted small">Documento para representación legal en casos de agrupaciones ilícitas</p>
                            </div>
                            <div class="card-footer bg-transparent">
                                <button class="btn btn-primary btn-sm btn-block" data-toggle="modal" data-target="#formModal">
                                    <i class="fa fa-magic mr-2"></i>Generar Documento
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- ... (Resto de plantillas originales sin cambios) ... -->
                </div>

                <!-- Paginación -->
                <!-- ... (Misma paginación original sin cambios) ... -->
            </div>
        </div>
    </div>
</div>

<!-- Modal de Generación de Documentos -->
<div class="modal fade" id="formModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">
                    <i class="fas fa-file-contract mr-2"></i>
                    Generar Documento Legal
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>

            <form id="documentoForm">
                <div class="modal-body">
                    <!-- Datos del Juzgado -->
                    <div class="form-group">
                        <label class="text-primary">
                            <i class="fas fa-balance-scale mr-2"></i>Juzgado Especializado
                        </label>
                        <input type="text" class="form-control"
                            placeholder="Ej: Juzgado Especializado de Instrucción de San Salvador"
                            id="juzgado" required>
                    </div>

                    <!-- Datos del Imputado -->
                    <div class="form-group">
                        <label class="text-primary">
                            <i class="fas fa-user-shield mr-2"></i>Nombre del Imputado
                        </label>
                        <input type="text" class="form-control"
                            placeholder="Nombre completo del imputado"
                            id="imputado" required>
                    </div>

                    <!-- Datos del Abogado -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-primary">
                                    <i class="fas fa-user-tie mr-2"></i>Nombre del Abogado
                                </label>
                                <input type="text" class="form-control"
                                    id="abogado" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-primary">
                                    <i class="fas fa-id-card mr-2"></i>NIT del Abogado
                                </label>
                                <input type="text" class="form-control"
                                    pattern="\d{4}-\d{6}-\d{3}-\d{1}"
                                    placeholder="Formato: 0302-220666-001-0"
                                    id="nit" required>
                            </div>
                        </div>
                    </div>

                    <!-- Fecha -->
                    <div class="form-group">
                        <label class="text-primary">
                            <i class="fas fa-calendar-alt mr-2"></i>Fecha del Documento
                        </label>
                        <input type="date" class="form-control"
                            id="fecha" required>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-file-download mr-2"></i>Generar Documento
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection