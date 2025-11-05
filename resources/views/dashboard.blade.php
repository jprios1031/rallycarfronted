@extends('plantilla')

@section('titulo', 'Dashboard')

@section('contenido')
<h2 style="text-align: center; margin-bottom: 20px;">Bienvenido al Dashboard</h2>
<br>
<form action="{{ route('dashboard') }}" method="GET" style="margin-bottom: 10px; text-align:center;">
    <br>
    <label for="fecha_inicio">Desde:</label>
    <input type="date" name="fecha_inicio" value="{{ $fechaInicio ?? '' }}">
    <label for="fecha_fin">Hasta:</label>
    <input type="date" name="fecha_fin" value="{{ $fechaFin ?? '' }}">
    <button type="submit" class="btn_editar">Filtrar</button>
    <a href="{{ route('dashboard') }}" class="btn_eliminar">Limpiar</a>


    
</form>
{{-- Estadísticas resumidas con tarjetas de colores --}}
<div style="display: flex; flex-wrap: wrap; gap: 20px; justify-content: center; margin-bottom: 30px;">

    <div style="flex: 1 1 200px; background-color: #4caf50; color: white; padding: 20px; border-radius: 10px; text-align: center; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
        <h3>Total de Vehículos</h3>
        <p style="font-size: 28px; font-weight: bold;">{{ $totalVehiculo ?? 0 }}</p>
    </div>

    <div style="flex: 1 1 200px; background-color: #2196f3; color: white; padding: 20px; border-radius: 10px; text-align: center; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
        <h3>Usuarios</h3>
        <p style="font-size: 28px; font-weight: bold;">{{ $totalusuarios ?? 0 }}</p>
    </div>

    <div style="flex: 1 1 200px; background-color: #ff9800; color: white; padding: 20px; border-radius: 10px; text-align: center; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
        <h3>Novedades</h3>
        <p style="font-size: 28px; font-weight: bold;">{{ $totalnovedades ?? 0 }}</p>
    </div>

    <div style="flex: 1 1 200px; background-color: #E31010; color: white; padding: 20px; border-radius: 10px; text-align: center; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
        <h3>Ventas</h3>
        <p style="font-size: 28px; font-weight: bold;">{{ $totalventas ?? 0 }}</p>
        <p>Total: ${{ number_format($totalPrecioVentas, 2) }}</p>
    </div>

    <div style="flex: 1 1 200px; background-color: #9C27B0; color: white; padding: 20px; border-radius: 10px; text-align: center; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
        <h3>Gastos</h3>
        <p style="font-size: 28px; font-weight: bold;">{{ $totalgastos ?? 0 }}</p>
        <p>Total: ${{ number_format($totalPreciogastos, 2) }}</p>
    </div>

    {{-- Ganancia --}}
    <div style="flex: 1 1 200px; background-color: #4caf50; color: white; padding: 20px; border-radius: 10px; text-align: center;">
        <h3>Ganancia</h3>
        <p>${{ number_format($ganancia, 2) }}</p>
    </div>
</div>

<div style="margin-top: 30px; text-align: center;">
    <a href="{{ route('novedad.index') }}">
        <button class="btn_editar">Crear Novedad</button>
    </a>
</div>







@endsection
