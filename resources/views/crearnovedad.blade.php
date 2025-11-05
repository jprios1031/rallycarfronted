@extends('plantilla')

@section('titulo', 'Crear Novedad')

@section('contenido')
<main>
    <div style="display:flex; justify-content:center; align-items:center; min-height:80vh;">
        <form action="{{ route('novedad.store') }}" method="POST" enctype="multipart/form-data"
           class="formulario">

            @csrf
            <h2>Crear Novedad</h2>

            {{-- Seleccionar vehículo --}}
            <label for="vehiculo_id">Vehículo</label>
            <select name="vehiculo_id" id="vehiculo_id" required>
                @foreach($vehiculos as $vehiculo)
                <option value="{{ $vehiculo['id'] }}">{{ $vehiculo['placa'] }} - {{ $vehiculo['marca'] }}</option>
                @endforeach
            </select>

            {{-- Título --}}
            <label for="titulo">Título</label>
            <input type="text" name="titulo" id="titulo" required>

            {{-- Descripción --}}
            <label for="descripcion">Descripción</label>
            <textarea name="descripcion" id="descripcion" rows="3" required></textarea>

            {{-- Imagen --}}
            <label for="imagen">Imagen</label>
                <input type="file" name="imagenes[]" id="imagenes" accept="image/*" multiple>
            <label for="imagen">Imagen</label>
                <input type="file" name="imagenes[]" id="imagenes" accept="image/*" multiple>
                <label for="imagen">Imagen</label>
                <input type="file" name="imagenes[]" id="imagenes" accept="image/*" multiple>
                
            {{-- Botones --}}
            <div style="display:flex; gap:10px; margin-top:10px;">
                <button type="submit" style="background-color:#4CAF50; color:white; padding:8px;">Crear Novedad</button>
                <a href="{{ route('dashboard') }}">
                    <button type="button" style="background-color:#e84444ff; color:white; padding:8px;">Volver al Dashboard</button>
                </a>
            </div>
        </form>
    </div>
</main>
@endsection