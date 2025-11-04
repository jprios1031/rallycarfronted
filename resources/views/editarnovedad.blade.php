@extends('plantilla')

@section('titulo', 'Editar Novedad')

@section('contenido')
<main>
    <div class="login-box">
        <h2>Editar Novedad</h2>

<form action="{{ route('novedad.update', ['novedad' => $novedad['id']]) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- === Vehículo asociado === -->
            <label>Vehículo asociado:</label>
            <select name="vehiculo_id" required>
                <option value="">-- Selecciona un vehículo --</option>
                @foreach ($vehiculos as $vehiculo)
                    <option value="{{ $vehiculo['id'] }}"
                        @if (!empty($novedad['vehiculo_id']) && $novedad['vehiculo_id'] == $vehiculo['id'])
                            selected
                        @endif>
                        {{ $vehiculo['placa'] }} - {{ $vehiculo['marca'] }} ({{ $vehiculo['modelo'] }})
                    </option>
                @endforeach
            </select>
            <br><br>

            <!-- === Campos de la novedad === -->
            <label>Título:</label>
            <input type="text" name="titulo" value="{{ $novedad['titulo'] ?? '' }}" required><br><br>

            <label>Descripción:</label>
            <textarea name="descripcion" required>{{ $novedad['descripcion'] ?? '' }}</textarea><br><br>

            <label>Fecha:</label>
            <input type="date" name="fecha" value="{{ $novedad['created_at'] ? date('Y-m-d', strtotime($novedad['created_at'])) : '' }}" required><br><br>

            <button type="submit">Actualizar Novedad</button>
        </form>

        <a href="{{ route('novedad.index') }}">
            <button style="background-color: #e84444ff; margin-top: 10px;">Volver</button>
        </a>
    </div>
</main>

<style>
input[type="text"],
input[type="date"],
textarea,
select {
    width: 100%;
    padding: 8px;
    margin-top: 4px;
    margin-bottom: 10px;
    border-radius: 6px;
    border: 1px solid #ccc;
}

button {
    padding: 10px 20px;
    border: none;
    border-radius: 6px;
    color: #fff;
    background-color: #4c6ef5;
    cursor: pointer;
}

button:hover {
    background-color: #3b5bdb;
}
</style>
@endsection
