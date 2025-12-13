@extends('plantilla')

@section('titulo', 'Editar Usuario')

@section('contenido')
<main>
    <div class="login-box">
        <h2>Editar Usuario</h2>

        <form action="{{ route('usuario.update', ['usuario' => $usuario['id']]) }}" method="POST" class="formulario">
            @csrf
            @method('PUT')

            <label>Nombre:</label>
            <input type="text" name="name" value="{{ $usuario['name'] ?? '' }}" required><br>

            <label>Correo:</label>
            <input type="email" name="email" value="{{ $usuario['email'] ?? '' }}" required><br>
        
            <label>Vehículo asignado:</label>
            <select name="vehiculo_id">
                <option value="">-- Selecciona un vehículo --</option>
                @foreach ($vehiculos as $vehiculo)
                    <option value="{{ $vehiculo['id'] }}"
                        @if (!empty($usuario['vehiculo_id']) && $usuario['vehiculo_id'] == $vehiculo['id'])
                            selected
                        @endif>
                        {{ $vehiculo['placa'] }} - {{ $vehiculo['marca'] }} ({{ $vehiculo['modelo'] }})
                    </option>
                @endforeach
            </select><br>

            <label>Rol asignado:</label>
            <select name="role_id" required>
                <option value="">-- Selecciona un Rol --</option>
                @foreach ($roles as $rol)
                    <option value="{{ $rol['id'] }}"
                        @if (!empty($usuario['role_id']) && $usuario['role_id'] == $rol['id'])
                            selected
                        @endif>
                        {{ $rol['name'] }}
                    </option>
                @endforeach
            </select><br><br>

            <button type="submit" class="btn_editar">Actualizar</button>
        </form>

        <br>
        <a href="{{ route('usuario.index') }}">
            <button class="btn_eliminar">Volver</button>
        </a>
    </div>
</main>
@endsection
