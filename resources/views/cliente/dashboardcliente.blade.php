@extends('cliente.plantillacliente')

@section('titulo', 'Dashboard')

@section('contenido')

<div class="container" style="padding: 30px; max-width: 1200px; margin: 0 auto;">

    <!-- Información del usuario -->
    <h1 style="margin-bottom: 30px; text-align:center; font-weight:700;">
        Bienvenido, {{ $usuario['name'] }}
    </h1>

    <div style="background: linear-gradient(135deg, #f5f7fa, #e4ebf1); 
                padding: 20px; 
                border-radius: 12px; 
                margin-bottom: 40px; 
                box-shadow: 0 2px 10px rgba(0,0,0,0.1);
                text-align:center;">
        <p><strong>Correo:</strong> {{ $usuario['email'] }}</p>
        <p><strong>Placa:</strong> {{ $usuario['vehiculo']['placa'] ?? 'No registrada' }}</p>
        <p><strong>Marca:</strong> {{ $usuario['vehiculo']['marca'] ?? '-' }}</p>
        <p><strong>Modelo:</strong> {{ $usuario['vehiculo']['modelo'] ?? '-' }}</p>
    </div>

    <!-- Novedades del usuario -->
    <h2 style="margin-bottom: 25px; text-align:center; font-weight:600;">Tus Novedades</h2>

    @if(!empty($novedades) && count($novedades) > 0)
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 20px;">
            @foreach($novedades as $novedad)
                <div class="novedad-card" 
                     style="background: #fff; 
                            border-radius: 12px; 
                            box-shadow: 0 2px 10px rgba(0,0,0,0.1); 
                            overflow: hidden; 
                            display: flex; 
                            flex-direction: column; 
                            transition: transform 0.2s;">
                    <div style="padding: 20px; flex-grow: 1;">
                        <h3 style="margin-top: 0; color: #333; font-size: 1.2rem;">{{ $novedad['titulo'] }}</h3>
                        <p style="color: #555; font-size: 0.95rem;">{{ $novedad['descripcion'] }}</p>
                    </div>

                    <!-- Mostrar imágenes -->
                    @if(!empty($novedad['imagenes']) && count($novedad['imagenes']) > 0)
                        <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 8px; padding: 10px; background: #fafafa;">
                            @foreach($novedad['imagenes'] as $img)
                                @php
                                    $nombreImagen = basename($img['ruta']);
                                @endphp
                               <img src="{{ 'http://127.0.0.1:8000/storage/imagenes_novedades/' . $nombreImagen }}"

                                     alt="Imagen Novedad" 
                                     style="width: 100%; max-height: 200px; object-fit: cover; border-radius: 8px;">
                            @endforeach
                        </div>
                    @else
                        <div style="text-align: center; padding: 20px; color: #aaa; font-style: italic;">
                            Sin imágenes registradas
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    @else
        <p style="text-align:center; color:#777; margin-top:40px;">
            No tienes novedades asociadas a tu vehículo.
        </p>
    @endif

</div>

@endsection
