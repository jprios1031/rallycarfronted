@extends('plantilla')

@section('titulo', 'Novedades')

@section('contenido')
<main>
    <div class="login-box">
        <h2>Novedades</h2>

        @if(!empty($novedades) && count($novedades) > 0)
            @foreach($novedades as $novedad)
                <div class="novedad-item" style="margin-bottom: 20px; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                    <h3 style="margin: 0 0 5px 0;">{{ $novedad['titulo'] ?? '-' }}</h3>
                    <p style="margin: 0 0 10px 0;">{{ $novedad['descripcion'] ?? '-' }}</p>

                    {{-- Vehículo asociado --}}
                    @if(!empty($novedad['vehiculo']) && is_array($novedad['vehiculo']))
                        <p>
                            Placa: {{ $novedad['vehiculo']['placa'] ?? '-' }} <br>
                            Marca: {{ $novedad['vehiculo']['marca'] ?? '-' }} <br>
                            Modelo: {{ $novedad['vehiculo']['modelo'] ?? '-' }}
                        </p>
                    @else
                        <p><em>Vehículo no asignado</em></p>
                    @endif

                    {{-- Imágenes --}}
                    @if(!empty($novedad['imagenes']) && is_array($novedad['imagenes']) && count($novedad['imagenes']) > 0)
                        <div style="display: flex; gap: 10px; flex-wrap: wrap;">
                            @foreach($novedad['imagenes'] as $img)
                                @if(!empty($img['ruta']))
                                    <img src="{{ 'http://127.0.0.1:8000/storage/' . $img['ruta'] }}" 
                                         alt="Imagen de novedad" width="200"
                                         style="border-radius: 5px; object-fit: cover;">
                                @endif
                            @endforeach
                        </div>
                    @else
                        <p><em>Sin imágenes disponibles</em></p>
                    @endif

                    {{-- Botones de acción --}}
                    <div style="margin-top: 10px;">
                        @if(isset($novedad['id']))
                     <a href="{{ route('novedad.edit', ['novedad' => $novedad['id']]) }}">
    <button>Editar</button>
</a>

<form action="{{ route('novedad.destroy', ['novedad' => $novedad['id']]) }}" method="POST" style="display:inline">
    @csrf
    @method('DELETE')
    <button type="submit" onclick="return confirm('¿Estás seguro de eliminar esta novedad?')">Borrar</button>
</form>


                        @endif
                    </div>
                </div>
            @endforeach
        @else
            <p>No hay novedades disponibles.</p>
        @endif

        <br>
        <a href="{{ route('novedad.create') }}">
            <button style="background-color: #3b44c1; margin-top: 10px;">Crear Novedad</button>
        </a>
        <br>
        <a href="{{ route('dashboard') }}">
            <button style="background-color: #e84444ff; margin-top: 10px;">Volver al Dashboard</button>
        </a>
    </div>
</main>
@endsection
