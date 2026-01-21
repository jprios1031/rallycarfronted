@extends('plantilla')

@section('titulo', 'Lista de Vehículos')

@section('contenido')

<style>
    .contenedor-vehiculos{
        max-width:1100px;
        margin:0 auto;
        padding:20px;
        display:flex;
        flex-direction:column;
        /* align-items:center; */
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
        align-items:stretch;
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
        min-width:750px;
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

    /* Usuario info */
    .usuario-info small{
        color:#6b7280;
        font-size:12px;
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

<div class="contenedor-vehiculos">

    <h2 class="text-2xl font-semibold mb-6 text-center">Listado de Vehículos</h2>

    {{-- Barra superior --}}
    <div class="barra-superior">

        {{-- Buscar --}}
        <div class="bloque">
            <form method="GET" action="{{ route('vehiculo.index') }}" class="form-lineas">
                <label>Buscar vehículo</label>
                <input
                    type="text"
                    name="search"
                    placeholder="Placa, marca o modelo..."
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
            <a href="{{ route('vehiculo.create') }}">
                <button class="btn btn-primary">
                    <i class="fas fa-car"></i> Registrar Vehículo
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
                    <th>Placa</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Usuario</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($vehiculos as $vehiculo)
                <tr>
                    <td>{{ $vehiculo['id'] }}</td>
                    <td>{{ $vehiculo['placa'] }}</td>
                    <td>{{ $vehiculo['marca'] }}</td>
                    <td>{{ $vehiculo['modelo'] }}</td>
                    <td class="usuario-info">
                        @if(!empty($vehiculo['user']))
                            {{ $vehiculo['user']['name'] }} <br>
                            <small>{{ $vehiculo['user']['email'] }}</small>
                        @else
                            <em>Sin asignar</em>
                        @endif
                    </td>
                    <td>
                        <div class="acciones">
                            <a href="{{ route('vehiculo.edit', $vehiculo['id']) }}">
                                <button class="btn btn-primary btn-sm">
                                    <i class="fas fa-edit"></i> Editar
                                </button>
                            </a>

                            <form action="{{ route('vehiculo.destroy', $vehiculo['id']) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button 
                                    type="submit" 
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('¿Deseas eliminar este vehículo?')"
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
