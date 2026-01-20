@extends('plantilla')

@section('titulo', 'Editar Usuario')

@section('contenido')

<style>
    .contenedor-usuario{
        display:flex;
        justify-content:center;
        align-items:center;
        margin-top:40px;
    }

    .usuario-box{
        width:100%;
        max-width:520px;
        background:#ffffff;
        padding:30px;
        border-radius:14px;
        box-shadow:0 6px 16px rgba(0,0,0,.15);
    }

    .usuario-box h2{
        text-align:center;
        margin-bottom:22px;
        color:#333;
    }

    .usuario-box label{
        display:block;
        font-weight:600;
        margin-top:14px;
        margin-bottom:6px;
        color:#444;
    }

    .usuario-box input,
    .usuario-box select{
        width:100%;
        padding:10px 12px;
        border-radius:8px;
        border:1px solid #ccc;
        font-size:14px;
        transition:border 0.3s;
    }

    .usuario-box input:focus,
    .usuario-box select:focus{
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

<div class="contenedor-usuario">
    <div class="usuario-box">

        <h2>Editar Usuario</h2>

        <form action="{{ route('usuario.update', ['usuario' => $usuario['id']]) }}" method="POST">
            @csrf
            @method('PUT')

            <label>Nombre</label>
            <input type="text" name="name" value="{{ $usuario['name'] ?? '' }}" required>

            <label>Correo</label>
            <input type="email" name="email" value="{{ $usuario['email'] ?? '' }}" required>

            <label>Vehículo asignado</label>
            <select name="vehiculo_id">
                <option value="">-- Selecciona un vehículo --</option>
                @foreach ($vehiculos as $vehiculo)
                    <option value="{{ $vehiculo['id'] }}"
                        {{ (!empty($usuario['vehiculo_id']) && $usuario['vehiculo_id'] == $vehiculo['id']) ? 'selected' : '' }}>
                        {{ $vehiculo['placa'] }} - {{ $vehiculo['marca'] }} ({{ $vehiculo['modelo'] }})
                    </option>
                @endforeach
            </select>

            <label>Rol asignado</label>
            <select name="role_id" required>
                <option value="">-- Selecciona un Rol --</option>
                @foreach ($roles as $rol)
                    <option value="{{ $rol['id'] }}"
                        {{ (!empty($usuario['role_id']) && $usuario['role_id'] == $rol['id']) ? 'selected' : '' }}>
                        {{ ucfirst($rol['name']) }}
                    </option>
                @endforeach
            </select>

            <div class="acciones">
                <button type="submit" class="btn_actualizar">Actualizar</button>
                <a href="{{ route('usuario.index') }}" class="btn_volver">Volver</a>
            </div>

        </form>

    </div>
</div>

@endsection
