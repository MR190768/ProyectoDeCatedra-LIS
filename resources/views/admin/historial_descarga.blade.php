<table class="table table-bordered">
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
                <td>{{ $descarga->user->name }}</td>
                <td>{{ $descarga->contrato->titulo }}</td>
                <td>{{ $descarga->fecha_de_descarga }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
