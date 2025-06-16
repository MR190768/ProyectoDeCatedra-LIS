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
                            @foreach($categorias as $categoria)
                                <a href="{{ route('repositorio.categoria', $categoria->id) }}"
                                class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                    {{ $categoria->titulo }}
                                    <span class="ml-2 badge badge-primary badge-pill">{{ $categoria->contratos_count }}</span>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <!-- Listado de Contratos -->
            <div class="col-lg-9">
                <!-- Barra de Búsqueda -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Buscar contrato...">
                            <div class="input-group-append">
                                <button class="btn btn-primary"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Resultados -->
                <div class="row">
                    @forelse ($contratos as $contrato)
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="card border-0 shadow-sm h-100">
                                <div class="card-header bg-light">
                                    <small class="text-primary">
                                        <i class="fa fa-file-contract mr-2"></i>{{ $contrato->categoria->nombre }}
                                    </small>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">{{ $contrato->titulo }}</h5>
                                    <p class="card-text text-muted small">{{ $contrato->descripcion }}</p>
                                </div>
                                @auth
                                    <button class="btn btn-primary btn-sm btn-block generar-contrato"
                                        data-id="{{ $contrato->id }}"
                                        data-titulo="{{ $contrato->titulo }}"
                                        data-tipo="{{ $contrato->titulo }}"  {{-- nuevo --}}
                                        data-toggle="modal"
                                        data-target="#formModal">
                                        <i class="fa fa-magic mr-2"></i>Generar Documento
                                    </button>
                                @endauth
                                @guest
                                    <a href="{{route('login')}}"  class="btn btn-primary btn-sm btn-block generar-contrato">
                                        Iniciar sesión
                                    </a>

                                @endguest
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <p class="text-muted">No hay contratos disponibles para esta categoría.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal para Generar Contrato -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="{{ route('contrato.generar') }}" method="POST" target="_blank">
            @csrf
            <input type="hidden" name="contrato_id" id="contrato_id">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="formModalLabel">
                        <i class="fas fa-file-contract mr-2"></i>Generar Documento Legal
                    </h5>
                    <button type="button" class="close text-white" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="formulario-dinamico" class="row">
                        {{-- Los campos se generan dinámicamente con JS --}}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Cancelar
                    </button>
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-file-pdf mr-2"></i>Generar PDF
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>


<script>
const camposPorTipo = {
    'PoderFamiliar': [
        'Juzgado', 'Nombre', 'Edad', 'Domicilio', 'Departamento', 'DUI',
        'Parentesco', 'Nombre del imputado', 'Delito', 'Nombre de abogada/o',
        'Alias de abogada/o', 'Domicilio de abogada/o', 'Departamento', 'TID',
        'DUI Abogado/a', 'NIT', 'Día', 'Mes', 'Año'
    ],
    'PoderImputado': [
        'Juzgado', 'Nombre Abogado/a', 'Alias Abogado/a', 'TID',
        'NIT', 'Nombre del imputado', 'Nombre del que otorga poder',
        'Día', 'Mes', 'Año'
    ]
};

document.querySelectorAll('.generar-contrato').forEach(btn => {
    btn.addEventListener('click', function () {
        const contratoId = this.dataset.id;
        const titulo = this.dataset.titulo;
        const tipo = this.dataset.tipo;

        document.getElementById('contrato_id').value = contratoId;
        document.getElementById('formModalLabel').innerText = titulo;

        const formContainer = document.getElementById('formulario-dinamico');
        formContainer.innerHTML = '';

        const campos = camposPorTipo[tipo];
        campos.forEach(campo => {
            formContainer.innerHTML += `
                <div class="col-md-6 mb-3">
                    <label>${campo}</label>
                    <input type="text" name="datos[]" class="form-control" required>
                </div>
            `;
        });
    });
});

</script>
@endsection

