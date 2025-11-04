@extends('plantilla')

@section('titulo', 'Vehículos')

@section('contenido')


<main>
    <div class="login-box">
        <h2>Crear Venta</h2>

       <form action="{{ route('registrarventa.store') }}" method="POST">
    @csrf

    <label>tipo:</label>
    <input type="text" name="tipo" required>

    <label>descripcion:</label>
    <input type="text" name="descripcion" required>

    <label>precio:</label>
    <input type="number" step="1000" name="precio" required>

    <button type="submit">Registrar venta</button>
</form>

        <br>
        <a href="{{ route('ventas.index') }}">
            <button style="background-color: #e84444ff;">Volver</button>
        </a>

    </div>
</main>


@endsection