@extends('plantilla')

@section('titulo', 'Dashboard')

@section('contenido')

<style>
    .titulo-dashboard{
        text-align:center;
        margin-bottom:25px;
        font-size:28px;
        color:#333;
    }

    .filtro-dashboard{
        text-align:center;
        margin-bottom:35px;
    }

    .filtro-dashboard input{
        padding:8px 10px;
        border-radius:8px;
        border:1px solid #ccc;
        margin:0 5px;
        transition:border 0.3s;
    }

    .filtro-dashboard input:focus{
        border-color:#3B82F6;
        outline:none;
    }

    .filtro-dashboard button,
    .filtro-dashboard a{
        padding:8px 14px;
        border-radius:8px;
        font-weight:600;
        text-decoration:none;
        border:none;
        cursor:pointer;
        transition:transform 0.2s, background 0.3s;
    }

    .filtro-dashboard button{
        background:#3B82F6;
        color:white;
    }

    .filtro-dashboard button:hover{
        background:#2563EB;
        transform:scale(1.05);
    }

    .filtro-dashboard a{
        background:#e84444;
        color:white;
    }

    .filtro-dashboard a:hover{
        background:#c53030;
        transform:scale(1.05);
    }

    .dashboard-cards{
        display:flex;
        flex-wrap:wrap;
        gap:20px;
        justify-content:center;
    }

    .card{
        flex:1 1 200px;
        max-width:250px;
        padding:20px;
        border-radius:14px;
        text-align:center;
        color:#fff;
        box-shadow:0 6px 16px rgba(0,0,0,0.15);
        transition:transform 0.2s;
    }

    .card:hover{
        transform:translateY(-4px);
    }

    .card h3{
        margin-bottom:12px;
        font-size:18px;
        font-weight:600;
    }

    .card p{
        font-size:28px;
        font-weight:bold;
        margin:0;
    }

    .card small{
        display:block;
        margin-top:6px;
        font-size:14px;
        opacity:0.9;
    }

    .bg-azul{ background:#2196F3; }
    .bg-morado{ background:#5C6BC0; }
    .bg-naranja{ background:#FF9800; }
    .bg-verde{ background:#4CAF50; }
    .bg-rojo{ background:#F44336; }
    .bg-verde-oscuro{ background:#2E7D32; }

    .dashboard-accion{
        margin-top:35px;
        text-align:center;
    }

    .dashboard-accion button{
        background:#3B82F6;
        color:white;
        border:none;
        padding:12px 20px;
        border-radius:10px;
        font-weight:600;
        cursor:pointer;
        transition:transform 0.2s, background 0.3s;
    }

    .dashboard-accion button:hover{
        background:#2563EB;
        transform:scale(1.05);
    }
</style>

<h2 class="titulo-dashboard">Bienvenido al Dashboard</h2>

{{-- Filtro por fechas --}}
<form action="{{ route('dashboard') }}" method="GET" class="filtro-dashboard">
    <label>Desde:</label>
    <input type="date" name="fecha_inicio" value="{{ $fechaInicio ?? '' }}">

    <label>Hasta:</label>
    <input type="date" name="fecha_fin" value="{{ $fechaFin ?? '' }}">

    <button type="submit">Filtrar</button>
    <a href="{{ route('dashboard') }}">Limpiar</a>
</form>

{{-- Tarjetas --}}
<div class="dashboard-cards">

    <div class="card bg-azul">
        <h3>Total de Vehículos</h3>
        <p>{{ $totalVehiculo ?? 0 }}</p>
    </div>

    <div class="card bg-morado">
        <h3>Usuarios</h3>
        <p>{{ $totalusuarios ?? 0 }}</p>
    </div>

    <div class="card bg-naranja">
        <h3>Novedades</h3>
        <p>{{ $totalnovedades ?? 0 }}</p>
    </div>

    <div class="card bg-verde">
        <h3>Ventas</h3>
        <p>{{ $totalventas ?? 0 }}</p>
        <small>Total: ${{ number_format($totalPrecioVentas, 2) }}</small>
    </div>

    <div class="card bg-rojo">
        <h3>Gastos</h3>
        <p>{{ $totalgastos ?? 0 }}</p>
        <small>Total: ${{ number_format($totalPreciogastos, 2) }}</small>
    </div>

    <div class="card bg-verde-oscuro">
        <h3>Ganancia</h3>
        <p>${{ number_format($ganancia ?? 0, 2) }}</p>
    </div>

</div>

{{-- Acción --}}
<div class="dashboard-accion">
    <a href="{{ route('novedad.index') }}">
        <button>Crear Novedad</button>
    </a>
</div>

@endsection
