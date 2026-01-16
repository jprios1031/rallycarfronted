@extends('plantilla')

@section('titulo', 'Vehículos')

@section('contenido')


<main>
    <div class="login-box">
        <h2>Crear Venta</h2>

       <form action="{{ route('ventas.store') }}" method="POST" class="formulario">
    @csrf

    <label>tipo:</label>
    <input type="text" name="tipo" required>

    <label>descripcion:</label>
    <input type="text" name="descripcion" required>
   <label>Cantidad:</label>
    <input type="number" name="cantidad" required>


    <label>precio:</label>
    <input type="number" step="1000" name="precio" required>

    <button type="submit" class="btn_editar">Registrar venta</button>
</form>

        <br>
        <a href="{{ route('ventas.index') }}">
            <button class="btn_eliminar">Volver</button>
        </a>

    </div>
</main>


@endsection