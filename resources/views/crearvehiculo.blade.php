@extends('plantilla')

@section('titulo', 'Vehículos')

@section('contenido')


<main>
    <div class="login-box">
        <h2>Crear vehiculo</h2>

       <form action="{{ route('vehiculo.store') }}" method="POST" class="formulario">
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
        <br>
        @foreach($usuarios as $usuario)
            <option value="{{ $usuario['id'] }}">{{ $usuario['name'] }}</option>
        @endforeach
    </select>
    <br>
    <br>
<button type="submit" class="btn_editar">Registrar Vehículo</button>
</form>

        <br>
        <a href="{{ route('vehiculo.index') }}">
            <button class="btn_eliminar">Volver</button>
        </a>

    </div>
</main>


@endsection