@extends('plantilla')

@section('titulo', 'Editar Usuario')

@section('contenido')
<main>
    <div class="login-box">
        <h2>Editar Usuario</h2>
        <form action="{{ route('usuario.update', ['id' => $usuario['id']]) }}" method="POST">
            @csrf
            @method('PUT')

            <label>Nombre:</label>
            <input type="text" name="name" value="{{ $usuario['name'] ?? '' }}" required><br>

            <label>Correo:</label>
            <input type="email" name="email" value="{{ $usuario['email'] ?? '' }}" required><br>

            <label>Vehículo asignado:</label>
            <select name="vehiculo_id" required>
                <option value="">-- Selecciona un vehículo --</option>
                @foreach ($vehiculos as $vehiculo)
                    <option value="{{ $vehiculo['id'] }}"
                        @if (!empty($usuario['vehiculo_id']) && $usuario['vehiculo_id'] == $vehiculo['id'])
                            selected
                        @endif>
                        {{ $vehiculo['placa'] }} - {{ $vehiculo['marca'] }} ({{ $vehiculo['modelo'] }})
                    </option>
                @endforeach
            </select><br><br>

            <button type="submit">Actualizar</button>
        </form>

        <a href="{{ route('usuario.index') }}">
            <button style="background-color: #e84444ff;">Volver</button>
        </a>
    </div>
</main>
@endsection
