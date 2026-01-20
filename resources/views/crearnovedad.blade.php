@extends('plantilla')

@section('titulo', 'Crear Novedad')

@section('contenido')

<style>
    .contenedor-novedad{
        max-width:1100px;
        margin:0 auto;
        padding:20px;
        display:flex;
        justify-content:center;
        align-items:flex-start;
    }

    .novedad-box{
        width:100%;
        max-width:520px;
        background:#fff;
        padding:30px;
        border-radius:14px;
        box-shadow:0 4px 12px rgba(0,0,0,.08);
    }

    .novedad-box h2{
        text-align:center;
        font-size:22px;
        font-weight:600;
        margin-bottom:25px;
    }

    .form-lineas{
        display:flex;
        flex-direction:column;
        gap:14px;
    }

    .form-lineas label{
        font-weight:600;
        font-size:14px;
    }

    .form-lineas input,
    .form-lineas select,
    .form-lineas textarea{
        padding:10px 12px;
        border-radius:10px;
        border:1px solid #d1d5db;
        font-size:14px;
        width:100%;
    }

    .form-lineas textarea{
        resize:vertical;
    }

    .acciones{
        margin-top:25px;
        display:flex;
        gap:12px;
    }

    .acciones button{
        width:100%;
    }
</style>

<div class="contenedor-novedad">

    <div class="novedad-box">

        <h2>Crear Novedad</h2>

        <form 
            action="{{ route('novedad.store') }}"
            method="POST"
            enctype="multipart/form-data"
            class="form-lineas"
        >
            @csrf

            <div>
                <label for="vehiculo_id">Vehículo</label>
                <select name="vehiculo_id" id="vehiculo_id" required>
                    @foreach($vehiculos as $vehiculo)
                        <option value="{{ $vehiculo['id'] }}">
                            {{ $vehiculo['placa'] ?? '-' }} ·
                            {{ $vehiculo['marca'] ?? '-' }} ·
                            {{ $vehiculo['modelo'] ?? '-' }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="titulo">Título</label>
                <input type="text" name="titulo" id="titulo" required>
            </div>

            <div>
                <label for="descripcion">Descripción</label>
                <textarea name="descripcion" id="descripcion" rows="5" required></textarea>
            </div>

            <div>
                <label for="imagenes">Imágenes</label>
                <input type="file" name="imagenes[]" id="imagenes" accept="image/*" multiple>
            </div>

            <div class="acciones">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Crear Novedad
                </button>

                <a href="{{ route('novedad.index') }}">
                    <button type="button" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Volver
                    </button>
                </a>
            </div>

        </form>

    </div>

</div>

@endsection
