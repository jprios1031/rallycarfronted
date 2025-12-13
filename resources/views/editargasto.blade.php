@extends('plantilla')

@section('titulo', 'Editar Venta')

@section('contenido')
<main>
    <div>
        <h2>Editar Gasto</h2>

        <form action="{{ route('gastos.update', $gastos['id']) }}" method="POST" class="formulario">
            @csrf
            @method('PUT')
           
            <br><br>

            <label>Tipo:</label>
            <input type="text" name="tipo" value="{{ $gastos['tipo'] ?? '' }}" required><br>

            <label>Descripción:</label>
            <input type="text" name="descripcion" value="{{ $gastos['descripcion'] ?? '' }}" required><br>

            <label>Precio:</label>
            <input type="number" step="1000" name="precio" value="{{ $gastos['precio'] ?? '' }}" required><br>
            <br>

            <button type="submit" class="btn_editar">Actualizar Gasto</button>

        </form>
<br>
        <a href="{{ route('gastos.index') }}">
            <button class="btn_eliminar">Volver</button>
        </a>
    </div>
</main>

@endsection
