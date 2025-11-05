@extends('plantilla')

@section('titulo', 'Vehículos')

@section('contenido')


<main>
    <div class="login-box">
        <h2>Crear Gasto</h2>

       <form action="{{ route('registrargasto.store') }}" method="POST" class="formulario">
    @csrf

    <label>tipo:</label>
    <input type="text" name="tipo" required>

    <label>descripcion:</label>
    <input type="text" name="descripcion" required>

    <label>precio:</label>
    <input type="number" step="1000" name="precio" required>

    <button type="submit" class="btn_editar">Registrar gasto</button>
</form>

        <br>
        <a href="{{ route('gastos.index') }}">
            <button class="btn_eliminar">Volver</button>
        </a>

    </div>
</main>


@endsection