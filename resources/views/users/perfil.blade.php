@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Mi Perfil</h2>
    <div class="card shadow-sm">
        <div class="card-body">
            <p><strong>Nombre:</strong> {{ Auth::user()->nombres }} {{ Auth::user()->apellidos }}</p>
            <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
            <p><strong>Rol:</strong> {{ Auth::user()->tipo_usuario ?? 'usuario' }}</p>

            {{-- Puedes agregar más campos o botones aquí --}}
        </div>
    </div>
</div>
@endsection
