@extends('plantilla')

@section('titulo', 'Ventas')

@section('contenido')

<style>
    .contenedor-venta{
        display:flex;
        justify-content:center;
        align-items:center;
        margin-top:40px;
    }

    .venta-box{
        width:100%;
        max-width:460px;
        background:#ffffff;
        padding:30px;
        border-radius:14px;
        box-shadow:0 6px 16px rgba(0,0,0,.15);
    }

    .venta-box h2{
        text-align:center;
        margin-bottom:22px;
        color:#333;
    }

    .venta-box label{
        display:block;
        font-weight:600;
        margin-top:14px;
        margin-bottom:6px;
        color:#444;
    }

    .venta-box input{
        width:100%;
        padding:10px 12px;
        border-radius:8px;
        border:1px solid #ccc;
        font-size:14px;
        transition:border 0.3s;
    }

    .venta-box input:focus{
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

<div class="contenedor-venta">
    <div class="venta-box">

        <h2>Crear Venta</h2>

        <form action="{{ route('ventas.store') }}" method="POST">
            @csrf

            <label>Tipo</label>
            <input type="text" name="tipo" required>

            <label>Descripción</label>
            <input type="text" name="descripcion" required>

            <label>Cantidad</label>
            <input type="number" name="cantidad" min="1" required>

            <label>Precio</label>
            <input type="number" step="1000" name="precio" required>

            <div class="acciones">
                <button type="submit" class="btn_guardar">Registrar Venta</button>
                <a href="{{ route('ventas.index') }}" class="btn_volver">Volver</a>
            </div>

        </form>

    </div>
</div>

@endsection
