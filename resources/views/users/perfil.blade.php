@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Mi Perfil</h2>
    <div class="card shadow-sm">
        <div class="card-body">
            <p><strong>Nombre:</strong> {{ Auth::user()->nombres }} {{ Auth::user()->apellidos }}</p>
            <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
            <p><strong>Rol:</strong> {{ Auth::user()->tipo_usuario ?? 'usuario' }}</p>

            <h4 class="mt-4">Mis Descargas</h4>
            <table class="table table-bordered mt-3">
                <thead>
                    <tr>
                        <th>Contrato</th>
                        <th>Fecha de Descarga</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($descargas as $descarga)
                        <tr>
                            <td>{{ $descarga->contrato->titulo }}</td>
                            <td>{{ \Carbon\Carbon::parse($descarga->fecha_de_descarga)->format('d/m/Y H:i') }}</td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" class="text-center">No has realizado ninguna descarga aún.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
