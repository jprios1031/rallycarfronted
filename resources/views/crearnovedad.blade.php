@extends('plantilla')

@section('titulo', 'Crear Novedad')

@section('contenido')
<main>
    <div>
        <form action="{{ route('novedad.store') }}" 
              method="POST" 
              enctype="multipart/form-data"
              class="formulario">

            @csrf
            <h2>Crear Novedad</h2>
            <label for="vehiculo_id">Vehículo</label>
            <select name="vehiculo_id" id="vehiculo_id" required>
                @foreach($vehiculos as $vehiculo)
                 <option value="{{ $vehiculo['id'] }}">
                    {{ $vehiculo['placa'] ?? '-' }} - 
                    {{ $vehiculo['marca'] ?? '-' }} - 
                    {{ $vehiculo['modelo'] ?? '-' }}
                </option>

                @endforeach
            </select>

            <label for="titulo">Título</label>
            <input type="text" name="titulo" id="titulo" required>
            <label for="descripcion">Descripción</label>
            <br>
            <textarea name="descripcion" id="descripcion" rows="5" required></textarea>
            <br>
            <label for="imagenes">Imágenes</label>
            <input type="file" name="imagenes[]" id="imagenes" accept="image/*" multiple>
            <label for="imagenes">Imágenes</label>
            <input type="file" name="imagenes[]" id="imagenes" accept="image/*" multiple>
            <label for="imagenes">Imágenes</label>
            <input type="file" name="imagenes[]" id="imagenes" accept="image/*" multiple>

            <div style="display:flex; gap:10px; margin-top:10px;">
                <button type="submit">
                    Crear Novedad
                </button>

                <a href="{{ route('dashboard') }}" 
                   style="background-color:#e84444ff; color:white; padding:8px; text-decoration:none; display:inline-block;">
                    Volver al Dashboard
                </a>
            </div>
        </form>
    </div>
</main>
@endsection
