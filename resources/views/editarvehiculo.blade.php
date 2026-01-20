@extends('plantilla')

@section('titulo', 'Editar Vehículo')

@section('contenido')

<style>
    .contenedor-vehiculo{
        display:flex;
        justify-content:center;
        align-items:center;
        margin-top:40px;
    }

    .vehiculo-box{
        width:100%;
        max-width:520px;
        background:#ffffff;
        padding:30px;
        border-radius:14px;
        box-shadow:0 6px 16px rgba(0,0,0,.15);
    }

    .vehiculo-box h2{
        text-align:center;
        margin-bottom:22px;
        color:#333;
    }

    .vehiculo-box label{
        display:block;
        font-weight:600;
        margin-top:14px;
        margin-bottom:6px;
        color:#444;
    }

    .vehiculo-box input,
    .vehiculo-box select{
        width:100%;
        padding:10px 12px;
        border-radius:8px;
        border:1px solid #ccc;
        font-size:14px;
        transition:border 0.3s;
    }

    .vehiculo-box input:focus,
    .vehiculo-box select:focus{
        outline:none;
        border-color:#3B82F6;
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

<div class="contenedor-vehiculo">
    <div class="vehiculo-box">

        <h2>Editar Vehículo</h2>

        <form action="{{ route('vehiculo.update', $vehiculo['id']) }}" method="POST">
            @csrf
            @method('PUT')

            <label>Asignar usuario</label>
            <select name="user_id" required>
                <option value="">-- Selecciona un usuario --</option>
                @foreach ($usuarios as $usuario)
                    <option value="{{ $usuario['id'] }}"
                        {{ (!empty($vehiculo['user_id']) && $vehiculo['user_id'] == $usuario['id']) ? 'selected' : '' }}>
                        {{ $usuario['nombre'] ?? $usuario['name'] ?? 'Sin nombre' }} ({{ $usuario['email'] }})
                    </option>
                @endforeach
            </select>

            <label>Placa</label>
            <input type="text" name="placa" value="{{ $vehiculo['placa'] ?? '' }}" required>

            <label>Marca</label>
            <input type="text" name="marca" value="{{ $vehiculo['marca'] ?? '' }}" required>

            <label>Modelo</label>
            <input type="text" name="modelo" value="{{ $vehiculo['modelo'] ?? '' }}" required>

            <div class="acciones">
                <button type="submit" class="btn_actualizar">Actualizar Vehículo</button>
                <a href="{{ route('vehiculo.index') }}" class="btn_volver">Volver</a>
            </div>
        </form>

    </div>
</div>

@endsection
