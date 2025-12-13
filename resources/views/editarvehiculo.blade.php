@extends('plantilla')

@section('titulo', 'Editar Vehículo')

@section('contenido')
<main>
    <div class="login-box">
        <h2>Editar vehículo</h2>

        <form action="{{ route('vehiculo.update', $vehiculo['id']) }}" method="POST" class="formulario">
            @csrf
            @method('PUT')

            <!-- Seleccionar usuario -->
            <label>Asignar usuario:</label>
            <select name="user_id" required>
                <option value="">-- Selecciona un usuario --</option>
                @foreach ($usuarios as $usuario)
                    <option value="{{ $usuario['id'] }}"
                        @if (!empty($vehiculo['user_id']) && $vehiculo['user_id'] == $usuario['id'])
                            selected
                        @endif>
                        {{ $usuario['nombre'] ?? $usuario['name'] ?? 'Sin nombre' }} ({{ $usuario['email'] }})
                    </option>
                @endforeach
            </select>
            <br><br>

            <!-- Campos del vehículo -->
            <label>Placa:</label>
            <input type="text" name="placa" value="{{ $vehiculo['placa'] ?? '' }}" required><br>

            <label>Marca:</label>
            <input type="text" name="marca" value="{{ $vehiculo['marca'] ?? '' }}" required><br>

            <label>Modelo:</label>
            <input type="text" name="modelo" value="{{ $vehiculo['modelo'] ?? '' }}" required><br>

            <button type="submit" class="btn_editar">Actualizar vehículo</button>
        </form>
        <br>

        <a href="{{ route('vehiculo.index') }}">
            <button class="btn_eliminar">Volver</button>
        </a>
    </div>
</main>

<style>
input[type="text"],
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
