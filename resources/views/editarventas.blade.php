@extends('plantilla')

@section('titulo', 'Editar Venta')

@section('contenido')
<main>
    <div class="login-box">
        <h2>Editar Venta</h2>

        <form action="{{ route('ventas.update', $ventas['id']) }}" method="POST">
            @csrf
            @method('PUT')
           
            <br><br>

            <label>Tipo:</label>
            <input type="text" name="tipo" value="{{ $ventas['tipo'] ?? '' }}" required><br>

            <label>Descripción:</label>
            <input type="text" name="descripcion" value="{{ $ventas['descripcion'] ?? '' }}" required><br>

            <label>Precio:</label>
            <input type="number" step="1000" name="precio" value="{{ $ventas['precio'] ?? '' }}" required><br>

            <button type="submit" class="btn_editar">Actualizar Venta</button>
        </form>

        <a href="{{ route('ventas.index') }}">
            <button class="btn_eliminar">Volver</button>
        </a>
    </div>
</main>

@endsection
