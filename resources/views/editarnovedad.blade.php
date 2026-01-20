@extends('plantilla')

@section('titulo', 'Editar Novedad')

@section('contenido')

<style>
    .contenedor-novedad{
        display:flex;
        justify-content:center;
        align-items:center;
        margin-top:40px;
    }

    .novedad-box{
        width:100%;
        max-width:520px;
        background:#ffffff;
        padding:30px;
        border-radius:14px;
        box-shadow:0 6px 16px rgba(0,0,0,.15);
    }

    .novedad-box h2{
        text-align:center;
        margin-bottom:22px;
        color:#333;
    }

    .novedad-box label{
        display:block;
        font-weight:600;
        margin-top:14px;
        margin-bottom:6px;
        color:#444;
    }

    .novedad-box input,
    .novedad-box select,
    .novedad-box textarea{
        width:100%;
        padding:10px 12px;
        border-radius:8px;
        border:1px solid #ccc;
        font-size:14px;
        transition:border 0.3s;
    }

    .novedad-box input:focus,
    .novedad-box select:focus,
    .novedad-box textarea:focus{
        outline:none;
        border-color:#3B82F6;
    }

    .novedad-box textarea{
        resize:vertical;
        min-height:100px;
    }

    .acciones{
        display:flex;
        gap:12px;
        margin-top:25px;
    }

    .btn_actualizar{
        flex:1;
        background:#3B82F6;
        color:white;
        border:none;
        border-radius:10px;
        font-weight:600;
        padding:10px;
        cursor:pointer;
        transition:transform 0.2s, background 0.3s;
    }

    .btn_actualizar:hover{
        background:#2563EB;
        transform:scale(1.05);
    }

    .btn_volver{
        flex:1;
        background:#e84444;
        color:white;
        border:none;
        border-radius:10px;
        text-align:center;
        padding:10px;
        font-weight:600;
        text-decoration:none;
        transition:transform 0.2s, background 0.3s;
    }

    .btn_volver:hover{
        background:#c53030;
        transform:scale(1.05);
    }
</style>

<div class="contenedor-novedad">
    <div class="novedad-box">

        <h2>Editar Novedad</h2>

        <form action="{{ route('novedad.update', ['novedad' => $novedad['id']]) }}" method="POST">
            @csrf
            @method('PUT')

            <label>Vehículo asociado</label>
            <select name="vehiculo_id" required>
                <option value="">-- Selecciona un vehículo --</option>
                @foreach ($vehiculos as $vehiculo)
                    <option value="{{ $vehiculo['id'] }}"
                        {{ (!empty($novedad['vehiculo_id']) && $novedad['vehiculo_id'] == $vehiculo['id']) ? 'selected' : '' }}>
                        {{ $vehiculo['placa'] }} - {{ $vehiculo['marca'] }} ({{ $vehiculo['modelo'] }})
                    </option>
                @endforeach
            </select>

            <label>Título</label>
            <input type="text" name="titulo" value="{{ $novedad['titulo'] ?? '' }}" required>

            <label>Descripción</label>
            <textarea name="descripcion" required>{{ $novedad['descripcion'] ?? '' }}</textarea>

            <label>Fecha</label>
            <input type="date" name="fecha"
                   value="{{ $novedad['created_at'] ? date('Y-m-d', strtotime($novedad['created_at'])) : '' }}"
                   required>

            <div class="acciones">
                <button type="submit" class="btn_actualizar">Actualizar Novedad</button>
                <a href="{{ route('novedad.index') }}" class="btn_volver">Volver</a>
            </div>

        </form>

    </div>
</div>

@endsection
