@extends('plantilla')

@section('titulo', 'Editar Gasto')

@section('contenido')

<style>
    .contenedor-editar{
        display:flex;
        justify-content:center;
        align-items:center;
        margin-top:40px;
    }

    .editar-box{
        width:100%;
        max-width:460px;
        background:#ffffff;
        padding:30px;
        border-radius:14px;
        box-shadow:0 6px 16px rgba(0,0,0,.15);
    }

    .editar-box h2{
        text-align:center;
        margin-bottom:22px;
        color:#333;
    }

    .editar-box label{
        display:block;
        font-weight:600;
        margin-top:14px;
        margin-bottom:6px;
        color:#444;
    }

    .editar-box input{
        width:100%;
        padding:10px 12px;
        border-radius:8px;
        border:1px solid #ccc;
        font-size:14px;
        transition:border 0.3s;
    }

    .editar-box input:focus{
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

<div class="contenedor-editar">
    <div class="editar-box">

        <h2>Editar Gasto</h2>

        <form action="{{ route('gastos.update', $gastos['id']) }}" method="POST">
            @csrf
            @method('PUT')

            <label>Tipo</label>
            <input type="text" name="tipo" value="{{ $gastos['tipo'] ?? '' }}" required>

            <label>Descripción</label>
            <input type="text" name="descripcion" value="{{ $gastos['descripcion'] ?? '' }}" required>

            <label>Precio</label>
            <input type="number" step="1000" name="precio" value="{{ $gastos['precio'] ?? '' }}" required>

            <div class="acciones">
                <button type="submit" class="btn_actualizar">Actualizar Gasto</button>
                <a href="{{ route('gastos.index') }}" class="btn_volver">Volver</a>
            </div>

        </form>

    </div>
</div>

@endsection
