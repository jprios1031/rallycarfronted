        @extends('plantilla')
        
        @section('titulo', 'Novedades')
        
        @section('contenido')
        
        <style>
            .login-box{
                max-width:1100px;
                margin:0 auto;
                padding:30px;
                background:#fff;
                border-radius:16px;
                box-shadow:0 4px 14px rgba(0,0,0,.08);
            }
        
            .login-box h2{
                font-size:26px;
                font-weight:600;
                margin-bottom:20px;
            }
        
            /* Buscador */
            .login-box input[type="text"]{
                width:70%;
                max-width:380px;
                padding:10px 14px;
                border-radius:12px;
                border:1px solid #d1d5db;
                margin-right:8px;
            }
        
            .login-box button{
                padding:10px 18px;
                border-radius:12px;
                border:none;
                font-weight:600;
                cursor:pointer;
                transition:.3s;
            }
        
            .login-box button:hover{
                transform:scale(1.05);
            }
        
            .btn_editar{
                background:linear-gradient(135deg,#2563eb,#1d4ed8);
                color:white;
            }
        
            .btn_eliminar{
                background:linear-gradient(135deg,#dc2626,#b91c1c);
                color:white;
            }
        
            .logout-btn{
                background:#374151;
                color:white;
                padding:10px 18px;
                border-radius:12px;
                font-weight:600;
            }
        
            /* Card novedad */
            .novedad-item{
                background:#f9fafb;
                border-radius:14px;
                padding:22px;
                margin-bottom:25px;
                box-shadow:0 4px 12px rgba(0,0,0,.06);
                text-align:left;
            }
        
            .novedad-item h3{
                font-size:20px;
                font-weight:600;
                margin-bottom:6px;
                color:#1e40af;
            }
        
            .novedad-item p{
                font-size:14px;
                color:#374151;
            }
        
            /* Imágenes */
            .novedad-item img{
                border-radius:12px;
                box-shadow:0 2px 8px rgba(0,0,0,.12);
                transition:.3s;
            }
        
            .novedad-item img:hover{
                transform:scale(1.05);
            }
        
            /* Acciones */
            .novedad-item .acciones{
                margin-top:14px;
                display:flex;
                gap:10px;
                flex-wrap:wrap;
            }
        </style>
        
        <main style="text-align: center; align-items: center;">
            <div class="login-box">
        
                <h2>Novedades</h2>
        
                <a href="{{ route('novedad.create') }}">
                    <button class="btn_editar">Crear Novedad</button>
                </a>
        
                <br><br>
        
                      <form method="GET" action="{{ route('novedad.index') }}">
                    <input
                        type="text"
                        name="search"
                        placeholder="Buscar novedad..."
                        value="{{ request('search') }}">
                    <button type="submit" class="btn_editar">Buscar</button>
                </form>
        
                <br>
        
               @if($novedades->count() > 0)
                    @foreach($novedades as $novedad)
        
                        <div class="novedad-item">
        
                            <h3>{{ $novedad['titulo'] ?? '-' }}</h3>
                            <p>{{ $novedad['descripcion'] ?? '-' }}</p>
        
                            @if(!empty($novedad['vehiculo']) && is_array($novedad['vehiculo']))
                                <p>
                                    <strong>Placa:</strong> {{ $novedad['vehiculo']['placa'] ?? '-' }}<br>
                                    <strong>Marca:</strong> {{ $novedad['vehiculo']['marca'] ?? '-' }}<br>
                                    <strong>Modelo:</strong> {{ $novedad['vehiculo']['modelo'] ?? '-' }}
                                </p>
                            @else
                                <p><em>Vehículo no asignado</em></p>
                            @endif
        
                            @if(!empty($novedad['imagenes']) && is_array($novedad['imagenes']) && count($novedad['imagenes']) > 0)
                                <div style="display:flex;gap:12px;flex-wrap:wrap;margin-top:10px;">
                                    @foreach($novedad['imagenes'] as $img)
                                        @if(!empty($img['ruta']))
                                            <img 
                                                    src="{{ $img['ruta'] }}"
                                                    alt="Imagen de novedad"
                                                    width="180"
                                                    height="120"
                                                    style="object-fit:cover;"
                                                >
                                        @endif
                                    @endforeach
                                </div>
                            @else
                                <p><em>Sin imágenes disponibles</em></p>
                            @endif
        
                            <div class="acciones">
                                @if(isset($novedad['id']))
                                    <a href="{{ route('novedad.edit', ['novedad' => $novedad['id']]) }}">
                                        <button class="btn_editar">Editar</button>
                                    </a>
        
                                    <form action="{{ route('novedad.destroy', ['novedad' => $novedad['id']]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button 
                                            type="submit"
                                            class="btn_eliminar"
                                            onclick="return confirm('¿Estás seguro de eliminar esta novedad?')"
                                        >
                                            Borrar
                                        </button>
                                    </form>
                                @endif
                            </div>
        
                        </div>
        
                    @endforeach
                @else
                    <p>No hay novedades disponibles.</p>
                @endif
            <div style="margin-top:30px;">
            {{ $novedades->links() }}
        </div>
                <br>
        
                <a href="{{ route('dashboard') }}">
                    <button class="logout-btn">Volver al Dashboard</button>
                </a>
        
            </div>
        </main>
        
        @endsection
