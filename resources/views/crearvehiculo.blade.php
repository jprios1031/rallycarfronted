@extends('plantilla')

@section('titulo', 'Vehículos')

@section('contenido')


<main>
    <div class="login-box">
        <h2>Crear vehiculo</h2>

       <form action="{{ route('vehiculo.store') }}" method="POST">
    @csrf

    <label>Marca:</label>
    <input type="text" name="marca" required>

    <label>Modelo:</label>
    <input type="text" name="modelo" required>

    <label>Placa:</label>
    <input type="text" name="placa" required>

    <label>Usuario:</label>
    <select name="user_id" required>
        <option value="">Seleccione un usuario</option>
        @foreach($usuarios as $usuario)
            <option value="{{ $usuario['id'] }}">{{ $usuario['name'] }}</option>
        @endforeach
    </select>

    <button type="submit">Registrar Vehículo</button>
</form>

        <br>
        <a href="{{ route('vehiculo.index') }}">
            <button style="background-color: #e84444ff;">Volver</button>
        </a>

    </div>
</main>


@endsection