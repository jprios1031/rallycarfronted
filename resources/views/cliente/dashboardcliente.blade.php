@extends('cliente.plantillacliente')

@section('titulo', 'Dashboard')

@section('contenido')

<div class="dashboard-container">

    <!-- Encabezado de bienvenida -->
    <section class="user-section">
        <h1>¡Hola, <span>{{ $usuario['name'] }}</span>!</h1>
        <p class="subtitulo">Esta es la información de tu cuenta y novedades recientes.</p>

        <div class="user-card">
            <div class="user-info">
                <p><i class="fa-solid fa-envelope"></i> <strong>Correo:</strong> {{ $usuario['email'] }}</p>
                <p><i class="fa-solid fa-car"></i> <strong>Placa:</strong> {{ $usuario['vehiculo']['placa'] ?? 'No registrada' }}</p>
                <p><i class="fa-solid fa-cogs"></i> <strong>Marca:</strong> {{ $usuario['vehiculo']['marca'] ?? '-' }}</p>
                <p><i class="fa-solid fa-calendar"></i> <strong>Modelo:</strong> {{ $usuario['vehiculo']['modelo'] ?? '-' }}</p>
            </div>
        </div>
    </section>

    <!-- Novedades -->
    <section class="novedades-section">
        <h2><i class="fa-solid fa-bell"></i> Tus Novedades</h2>

        @if(!empty($novedades) && count($novedades) > 0)
        <div class="novedades-grid">
            @foreach($novedades as $novedad)
                <div class="novedad-card">
                    <div class="novedad-content">
                        <h3>{{ $novedad['titulo'] }}</h3>
                        <p>{{ $novedad['descripcion'] }}</p>
                    </div>

                    @if(!empty($novedad['imagenes']) && count($novedad['imagenes']) > 0)
                        <div class="imagenes-grid">
                            @foreach($novedad['imagenes'] as $img)
                                @php $nombreImagen = basename($img['ruta']); @endphp
                                <div class="img-wrapper">
                                    <img src="{{ 'http://127.0.0.1:8000/storage/imagenes_novedades/' . $nombreImagen }}" alt="Imagen Novedad">
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="sin-imagenes">Sin imágenes registradas</div>
                    @endif
                </div>
            @endforeach
        </div>
        @else
            <p class="sin-novedades">No tienes novedades asociadas a tu vehículo.</p>
        @endif
    </section>
</div>

@endsection

