@extends('plantilla')

@section('titulo', 'Crear Usuario')

@section('contenido')
<main>
    <div class="login-box">
        <h2>Crear Usuario</h2>

   <form action="{{ route('usuario.store') }}" method="POST">
    @csrf
    <label>Nombre:</label>
    <input type="text" name="name" required><br><br>

    <label>Correo:</label>
    <input type="email" name="email" required><br><br>

    <label>Contraseña:</label>
    <input type="password" name="password" required><br><br>

    <label>Confirmar Contraseña:</label>
    <input type="password" name="password_confirmation" required><br><br>

    <label>Seleccionar Vehículo:</label>
    <select name="vehiculo_id">
        <option value="">-- Selecciona un vehículo --</option>
        @foreach ($vehiculos as $vehiculo)
            <option value="{{ $vehiculo['id'] }}">
                {{ $vehiculo['placa'] }} - {{ $vehiculo['marca'] }} ({{ $vehiculo['modelo'] }})
            </option>
        @endforeach
    </select>
    <br><br>

    <label>Rol:</label>
    <select name="role_id" required>
        <option value="">-- Selecciona un rol --</option>
        @foreach ($roles as $rol)
            <option value="{{ $rol['id'] }}">{{ ucfirst($rol['name']) }}</option>
        @endforeach
    </select>
    <br><br>

    <button type="submit">Registrar</button>
</form>

        <br>
        <a href="{{ route('usuario.index') }}">
            <button style="background-color: #e84444ff;">Volver</button>
        </a>
    </div>
</main>
@endsection
