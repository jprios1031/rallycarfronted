@extends('plantilla')

@section('titulo', 'Vehículos')

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
        max-width:460px;
        background:#ffffff;
        padding:30px;
        border-radius:14px;
        box-shadow:0 6px 16px rgba(0,0,0,0.15);
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

<div class="contenedor-vehiculo">
    <div class="vehiculo-box">

        <h2>Crear Vehículo</h2>

        <form action="{{ route('vehiculo.store') }}" method="POST">
            @csrf

            <label>Marca</label>
            <input type="text" name="marca" required>

            <label>Modelo</label>
            <input type="text" name="modelo" required>

            <label>Placa</label>
            <input type="text" name="placa" required>

            <label>Usuario</label>
            <select name="user_id" required>
                <option value="">Seleccione un usuario</option>
                @foreach($usuarios as $usuario)
                    <option value="{{ $usuario['id'] }}">{{ $usuario['name'] }}</option>
                @endforeach
            </select>

            <div class="acciones">
                <button type="submit" class="btn_guardar">Registrar Vehículo</button>
                <a href="{{ route('vehiculo.index') }}" class="btn_volver">Volver</a>
            </div>

        </form>

    </div>
</div>

@endsection
