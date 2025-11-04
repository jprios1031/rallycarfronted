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

            <button type="submit">Actualizar Venta</button>
        </form>

        <a href="{{ route('ventas.index') }}">
            <button style="background-color: #e84444ff; margin-top: 10px;">Volver</button>
        </a>
    </div>
</main>

<style>
input[type="text"],
input[type="number"],
select {
    width: 100%;
    padding: 8px;
    margin-top: 4px;
    margin-bottom: 10px;
    border-radius: 6px;
    border: 1px solid #ccc;
}

button {
    padding: 10px 20px;
    border: none;
    border-radius: 6px;
    color: #fff;
    background-color: #4c6ef5;
    cursor: pointer;
}

button:hover {
    background-color: #3b5bdb;
}
</style>
@endsection
