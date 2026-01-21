@extends('cliente.plantillacliente')

@section('titulo', 'Dashboard')

@section('contenido')

<style>
.dashboard-container{
    max-width:1100px;
    margin:30px auto;
    padding:0 20px;
    font-family:Arial, sans-serif;
}

.user-section h1 .marca{
    color:#3B82F6;
}

.user-section .subtitulo{
    color:#555;
}

.user-card{
    background:#ffffff;
    border-radius:12px;
    box-shadow:0 4px 16px rgba(0,0,0,0.1);
    padding:20px;
    margin-top:20px;
}

.user-info p{
    margin:10px 0;
    font-size:15px;
    color:#333;
}

.user-info i{
    color:#3B82F6;
    margin-right:8px;
}

.novedades-section h2{
    color:#333;
    display:flex;
    align-items:center;
    gap:8px;
    margin-bottom:20px;
}

.novedades-grid{
    display:grid;
    grid-template-columns:repeat(auto-fill,minmax(280px,1fr));
    gap:20px;
}

.tarjeta{
    background:#ffffff;
    border-radius:12px;
    box-shadow:0 4px 16px rgba(0,0,0,0.1);
    padding:20px;
    transition:transform 0.2s;
}

.tarjeta:hover{
    transform:translateY(-4px);
}

.novedad-content h3{
    font-size:17px;
    margin-bottom:10px;
    color:#3B82F6;
}

.novedad-content p{
    font-size:14px;
    color:#555;
}

.imagenes-grid{
    display:grid;
    grid-template-columns:repeat(auto-fill,minmax(80px,1fr));
    gap:10px;
    margin-top:12px;
}

.img-wrapper{
    width:100%;
    height:80px;
    overflow:hidden;
    border-radius:8px;
    cursor:pointer;
    transition:transform 0.2s;
}

.img-wrapper img{
    width:100%;
    height:100%;
    object-fit:cover;
}

.img-wrapper:hover img{
    transform:scale(1.1);
}

.sin-imagenes, .sin-novedades{
    color:#777;
    font-style:italic;
    text-align:center;
    margin-top:15px;
}

.sin-imagenes i, .sin-novedades i{
    color:#ccc;
    margin-right:5px;
}
</style>

<div class="dashboard-container">

    {{-- Bienvenida --}}
    <section class="user-section">
        <h1 class="text-2xl font-bold mb-1">
            ¡Hola, <span class="marca">{{ $usuario['name'] }}</span>!
        </h1>
        <p class="subtitulo mb-6">
            Aquí puedes ver la información de tu cuenta y las novedades de tu vehículo.
        </p>

        {{-- Tarjeta usuario --}}
        <div class="user-card">
            <div class="user-info">
                <p><i class="fa-solid fa-envelope"></i><strong>Correo:</strong> {{ $usuario['email'] }}</p>
                <p><i class="fa-solid fa-car"></i><strong>Placa:</strong> {{ $usuario['vehiculo']['placa'] ?? 'No registrada' }}</p>
                <p><i class="fa-solid fa-cogs"></i><strong>Marca:</strong> {{ $usuario['vehiculo']['marca'] ?? '-' }}</p>
                <p><i class="fa-solid fa-calendar"></i><strong>Modelo:</strong> {{ $usuario['vehiculo']['modelo'] ?? '-' }}</p>
            </div>
        </div>
    </section>

    {{-- Separador --}}
    <div style="margin:40px 0; border-top:1px solid #E5E7EB;"></div>

    {{-- Novedades --}}
    <section class="novedades-section">
        <h2>
            <i class="fa-solid fa-bell"></i> Novedades del vehículo
        </h2>

        @if(!empty($novedades) && count($novedades) > 0)
            <div class="novedades-grid">
                @foreach($novedades as $novedad)
                    <div class="tarjeta">
                        <div class="novedad-content">
                            <h3>{{ $novedad['titulo'] }}</h3>
                            <p>{{ $novedad['descripcion'] }}</p>
                        </div>

                        {{-- Imágenes --}}
                        @if(!empty($novedad['imagenes']) && count($novedad['imagenes']) > 0)
                            <div class="imagenes-grid">
                                @foreach($novedad['imagenes'] as $img)
                                    @php
                                        $nombreImagen = basename($img['ruta']);
                                    @endphp
                                    <div class="img-wrapper">
                                        <img
                                            src="{{ 'https://rallycarbacken-production.up.railway.app/storage/imagenes_novedades/' . $nombreImagen }}"
                                            alt="Imagen de la novedad">
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="sin-imagenes">
                                <i class="fa-solid fa-image"></i> Sin imágenes registradas
                            </p>
                        @endif
                    </div>
                @endforeach
            </div>
        @else
            <p class="sin-novedades">
                <i class="fa-solid fa-circle-info"></i> No tienes novedades asociadas a tu vehículo.
            </p>
        @endif
    </section>

</div>

@endsection
