@extends('plantilla')

@section('titulo', 'Crear Usuario')

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
        max-width:480px;
        background:#ffffff;
        padding:30px;
        border-radius:14px;
        box-shadow:0 6px 16px rgba(0,0,0,0.15);
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

    .acciones button,
    .acciones a{
        flex:1;
        text-align:center;
        padding:10px;
        border-radius:10px;
        font-weight:600;
        cursor:pointer;
        text-decoration:none;
        transition:transform 0.2s, background 0.3s;
    }

    .btn_guardar{
        background:#3B82F6;
        color:white;
        border:none;
    }

    .btn_guardar:hover{
        background:#2563EB;
        transform:scale(1.05);
    }

    .btn_volver{
        background:#e84444;
        color:white;
    }

    .btn_volver:hover{
        background:#c53030;
        transform:scale(1.05);
    }
</style>

<div class="contenedor-usuario">
    <div class="usuario-box">

        <h2>Crear Usuario</h2>

        <form action="{{ route('usuario.store') }}" method="POST">
            @csrf

            <label>Nombre</label>
            <input type="text" name="name" required>

            <label>Correo</label>
            <input type="email" name="email" required>

            <label>Contraseña</label>
            <input type="password" name="password" required>

            <label>Confirmar Contraseña</label>
            <input type="password" name="password_confirmation" required>

            <label>Seleccionar Vehículo</label>
            <select name="vehiculo_id">
                <option value="">-- Selecciona un vehículo --</option>
                @foreach ($vehiculos as $vehiculo)
                    <option value="{{ $vehiculo['id'] }}">
                        {{ $vehiculo['placa'] }} - {{ $vehiculo['marca'] }} ({{ $vehiculo['modelo'] }})
                    </option>
                @endforeach
            </select>

            <label>Rol</label>
            <select name="role_id" required>
                <option value="">-- Selecciona un rol --</option>
                @foreach ($roles as $rol)
                    <option value="{{ $rol['id'] }}">{{ ucfirst($rol['name']) }}</option>
                @endforeach
            </select>

            <div class="acciones">
                <button type="submit" class="btn_guardar">Registrar</button>
                <a href="{{ route('usuario.index') }}" class="btn_volver">Volver</a>
            </div>
        </form>

    </div>
</div>

@endsection
