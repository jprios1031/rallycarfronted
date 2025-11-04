@extends('plantilla')

@section('titulo', 'Dashboard')

@section('contenido')
<h2 style="text-align: center; margin-bottom: 20px;">Bienvenido al Dashboard</h2>

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
        <div class="card">
    <h3>Total de Ventas</h3>
    <p>${{ number_format($totalPrecioVentas, 2) }}</p>
</div>
    </div>

</div>

{{-- Novedades en tarjetas --}}
<div style="display: flex; flex-wrap: wrap; gap: 20px; justify-content: center;">
    @if(!empty($novedades) && count($novedades) > 0)
        @foreach($novedades as $novedad)
            <div style="flex: 1 1 300px; background-color: #f5f5f5; padding: 15px; border-radius: 10px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
                <h3 style="margin-bottom: 10px; color: #333;">{{ $novedad['titulo'] ?? '-' }}</h3>
                <p style="margin-bottom: 10px;">{{ $novedad['descripcion'] ?? '-' }}</p>

                {{-- Vehículo asociado --}}
                @if(!empty($novedad['vehiculo']) && is_array($novedad['vehiculo']))
                    <p style="margin-bottom: 10px;">
                        <strong>Vehículo:</strong> <br>
                        Placa: {{ $novedad['vehiculo']['placa'] ?? '-' }} <br>
                        Marca: {{ $novedad['vehiculo']['marca'] ?? '-' }} <br>
                        Modelo: {{ $novedad['vehiculo']['modelo'] ?? '-' }}
                    </p>
                @else
                    <p><em>Vehículo no asignado</em></p>
                @endif

                {{-- Imágenes --}}
                @if(!empty($novedad['imagenes']) && is_array($novedad['imagenes']) && count($novedad['imagenes']) > 0)
                    <div style="display: flex; gap: 10px; flex-wrap: wrap; margin-bottom: 10px;">
                        @foreach($novedad['imagenes'] as $img)
                            @if(!empty($img['ruta']))
                                <img src="{{ 'http://127.0.0.1:8000/storage/' . $img['ruta'] }}" 
                                     alt="Imagen de novedad" width="100"
                                     style="border-radius: 5px; object-fit: cover;">
                            @endif
                        @endforeach
                    </div>
                @else
                    <p><em>Sin imágenes disponibles</em></p>
                @endif

                {{-- Botones de acción --}}
                <div style="display: flex; gap: 10px; flex-wrap: wrap;">
                    @if(isset($novedad['id']))
                        <a href="{{ route('novedad.edit', ['novedad' => $novedad['id']]) }}">
                            <button style="flex: 1; padding: 8px; background-color: #4caf50; color: white; border: none; border-radius: 5px; cursor: pointer;">Editar</button>
                        </a>

                        <form action="{{ route('novedad.destroy', ['novedad' => $novedad['id']]) }}" method="POST" style="flex: 1;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('¿Estás seguro de eliminar esta novedad?')" 
                                    style="width: 100%; padding: 8px; background-color: #f44336; color: white; border: none; border-radius: 5px; cursor: pointer;">
                                Borrar
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        @endforeach
    @else
        <p></p>
    @endif
</div>

{{-- Botones de creación y volver --}}
<div style="margin-top: 30px; text-align: center;">
    <a href="{{ route('novedad.index') }}">
        <button class="btn_editar">Crear Novedad</button>
   </a>
    </div>

@endsection
