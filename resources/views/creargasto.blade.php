@extends('plantilla')

@section('titulo', 'Crear Gasto')

@section('contenido')

<style>
    .contenedor-gasto{
        max-width:1100px;
        margin:0 auto;
        padding:20px;
        display:flex;
        justify-content:center;
        align-items:flex-start;
    }

    .gasto-box{
        width:100%;
        max-width:460px;
        background:#fff;
        padding:30px;
        border-radius:14px;
        box-shadow:0 4px 12px rgba(0,0,0,.08);
    }

    .gasto-box h2{
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

    .form-lineas input{
        padding:10px 12px;
        border-radius:10px;
        border:1px solid #d1d5db;
        font-size:14px;
        width:100%;
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

<div class="contenedor-gasto">

    <div class="gasto-box">

        <h2>Crear Gasto</h2>

        <form action="{{ route('gastos.store') }}" method="POST" class="form-lineas">
            @csrf

            <div>
                <label>Tipo</label>
                <input type="text" name="tipo" required>
            </div>

            <div>
                <label>Descripción</label>
                <input type="text" name="descripcion" required>
            </div>

            <div>
                <label>Precio</label>
                <input type="number" step="1000" name="precio" required>
            </div>

            <div class="acciones">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Registrar
                </button>

                <a href="{{ route('gastos.index') }}">
                    <button type="button" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Volver
                    </button>
                </a>
            </div>

        </form>

    </div>

</div>

@endsection
