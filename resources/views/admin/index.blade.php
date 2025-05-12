@extends('layouts.app')

{{-- Mostrar mensaje de éxito --}}
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

{{-- Mostrar mensaje de error --}}
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Dashboard de Administración</h2>

    <!-- Sección Usuarios -->
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Usuarios</h5>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($usuarios as $usuario)
                        <tr>
                            <td>{{ $usuario->nombres }} {{ $usuario->apellidos }}</td>
                            <td>{{ $usuario->email }}</td>
                            <td>{{ $usuario->tipo_usuario }}</td>
                            <td>
                                <!-- Formulario para cambiar el rol -->
                                <form action="{{ route('admin.modificarRol', $usuario->id) }}" method="POST">
                                    @csrf
                                    <select name="tipo_usuario" class="form-control">
                                        <option value="admin" {{ $usuario->tipo_usuario == 'admin' ? 'selected' : '' }}>Admin</option>
                                        <option value="usuario" {{ $usuario->tipo_usuario == 'usuario' ? 'selected' : '' }}>Usuario</option>
                                    </select>
                                    <button type="submit" class="btn btn-primary btn-sm mt-2">Modificar Rol</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Sección Descargas -->
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Descargas</h5>
        </div>
        <div class="card-body">
            <p><strong>Total de descargas:</strong> {{ $descargas->count() }}</p>
            <table class="table">
                <thead>
                    <tr>
                        <th>Usuario</th>
                        <th>Contrato</th>
                        <th>Fecha de Descarga</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($descargas as $descarga)
                        <tr>
                            <td>{{ $descarga->user->nombres }} {{ $descarga->user->apellidos }}</td>
                            <td>{{ $descarga->contrato->titulo }}</td>
                            <td>{{ \Carbon\Carbon::parse($descarga->fecha_de_descarga)->format('d/m/Y H:i') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Sección Categorías -->
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Categorías</h5>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categorias as $categoria)
                        <tr>
                            <td>{{ $categoria->titulo }}</td>
                            <td>
                                <!-- Formulario para modificar categoría -->
                                <form action="{{ route('admin.modificarCategoria', $categoria->id) }}" method="POST">
                                    @csrf
                                    <input type="text" name="titulo" value="{{ $categoria->titulo }}" class="form-control" required>
                                    <input type="text" name="descripcion" value="{{ $categoria->descripcion }}" class="form-control" required>
                                    <button type="submit" class="btn btn-primary btn-sm mt-2">Modificar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Formulario para agregar nueva categoría -->
            <form action="{{ route('admin.agregarCategoria') }}" method="POST">
                @csrf
                <input type="text" name="titulo" class="form-control mt-3" placeholder="Nuevo nombre de categoría" required>
                <input type="text" name="descripcion" class="form-control mt-3" placeholder="Nueva descripcion de categoría" required>
                <button type="submit" class="btn btn-success btn-sm mt-2">Agregar Categoría</button>
            </form>
        </div>
    </div>

    <!-- Sección Contratos -->
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Contratos</h5>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Categoría</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contratos as $contrato)
                        <tr>
                            <td>{{ $contrato->titulo }}</td>
                            <td>{{ $contrato->categoria->titulo }}</td>
                            <td>
                                <!-- Formulario para modificar contrato -->
                                <form action="{{ route('admin.modificarContrato', $contrato->id) }}" method="POST">
                                    @csrf
                                    <input type="text" name="titulo" value="{{ $contrato->titulo }}" class="form-control" required>
                                    <input type="text" name="descripcion" value="{{ $contrato->descripcion }}" class="form-control mt-2" required>
                                    <select name="categoria_id" class="form-control mt-2" required>
                                        @foreach ($categorias as $categoria)
                                            <option value="{{ $categoria->id }}" {{ $contrato->categoria_id == $categoria->id ? 'selected' : '' }}>{{ $categoria->titulo }}</option>
                                        @endforeach
                                    </select>
                                    <button type="submit" class="btn btn-primary btn-sm mt-2">Modificar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Formulario para agregar nuevo contrato -->
            <form action="{{ route('admin.agregarContrato') }}" method="POST">
                @csrf
                <input type="text" name="titulo" class="form-control mt-3" placeholder="Nuevo título de contrato" required>
                <textarea name="descripcion" class="form-control mt-2" placeholder="Descripción del contrato" required></textarea>
                <select name="categoria_id" class="form-control mt-2" required>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->titulo }}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-success btn-sm mt-3">Agregar Contrato</button>
            </form>
        </div>
    </div>
</div>
@endsection
