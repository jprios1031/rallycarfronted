@extends('plantilla')

@section('titulo', 'Lista de Gastos')

@section('contenido')

<style>
    .contenedor-gastos{
        max-width:1100px;
        margin:0 auto;
        padding:20px;
        display:flex;
        flex-direction:column;
        align-items:center;
    }

    /* Barra superior */
    .barra-superior{
        width:100%;
        display:grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap:20px;
        margin-bottom:30px;
    }

    .barra-superior .bloque{
        background:#fff;
        padding:20px;
        border-radius:12px;
        box-shadow:0 2px 8px rgba(0,0,0,.08);
        text-align:center;
    }

    /* Formulario */
    .form-lineas{
        display:flex;
        flex-direction:column;
        gap:12px;
    }

    .form-lineas label{
        font-weight:600;
        font-size:14px;
        text-align:left;
    }

    .form-lineas input{
        padding:10px 12px;
        border-radius:10px;
        border:1px solid #d1d5db;
        width:100%;
    }

    /* Tabla */
    .tabla-container{
        width:100%;
        overflow-x:auto;
    }

    .tabla{
        width:100%;
        min-width:650px;
        border-collapse:collapse;
        background:#fff;
        border-radius:14px;
        overflow:hidden;
        box-shadow:0 4px 12px rgba(0,0,0,.08);
    }

    .tabla th,
    .tabla td{
        padding:12px;
        border-bottom:1px solid #e5e7eb;
        text-align:center;
        font-size:14px;
        vertical-align:middle;
    }

    .tabla th{
        background:#f1f5f9;
        font-weight:600;
    }

    /* Acciones */
    .acciones{
        display:flex;
        gap:10px;
        justify-content:center;
        flex-wrap:wrap;
    }

    .acciones form{
        margin:0;
    }

    .footer{
        margin-top:40px;
        text-align:center;
    }
</style>

<div class="contenedor-gastos">

    <h2 class="text-2xl font-semibold mb-6 text-center">Listado de Gastos</h2>

    {{-- Barra superior --}}
    <div class="barra-superior">

        {{-- Buscar --}}
        <div class="bloque">
            <form method="GET" action="{{ route('gastos.index') }}" class="form-lineas">
                <label>Buscar gasto</label>
                <input
                    type="text"
                    name="search"
                    placeholder="Tipo o descripción..."
                    value="{{ old('search', $search ?? '') }}"
                >
                <button type="submit" class="btn btn-secondary">
                    <i class="fas fa-search"></i> Buscar
                </button>
            </form>
        </div>

        {{-- Crear --}}
        <div class="bloque">
            <p class="mb-3 font-semibold">Gestión</p>
            <a href="{{ route('gastos.create') }}">
                <button class="btn btn-primary">
                    <i class="fas fa-plus"></i> Registrar Gasto
                </button>
            </a>
        </div>

    </div>

    {{-- Tabla --}}
    <div class="tabla-container">
        <table class="tabla">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tipo</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($gastos as $gasto)
                <tr>
                    <td>{{ $gasto['id'] }}</td>
                    <td>{{ $gasto['tipo'] }}</td>
                    <td>{{ $gasto['descripcion'] }}</td>
                    <td>${{ number_format($gasto['precio'], 2) }}</td>
                    <td>
                        <div class="acciones">

                            <a href="{{ route('gastos.edit', $gasto['id']) }}">
                                <button class="btn btn-primary btn-sm">
                                    <i class="fas fa-edit"></i> Editar
                                </button>
                            </a>

                            <form action="{{ route('gastos.destroy', $gasto['id']) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button 
                                    type="submit" 
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('¿Deseas eliminar este gasto?')"
                                >
                                    <i class="fas fa-trash"></i> Eliminar
                                </button>
                            </form>

                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Footer --}}
    <div class="footer">
        <a href="{{ route('dashboard') }}">
            <button class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Volver al Dashboard
            </button>
        </a>
    </div>

</div>

@endsection
