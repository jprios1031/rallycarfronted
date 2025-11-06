<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo') | RallyCar</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
body {
    font-family: 'Poppins', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #F9FAFB;
    color: #111827;
    margin: 0;
    display: flex;
    flex-direction: column;
    min-height: 100vh;
    text-align: center;
}

header {
    background-color: #1E3A8A;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px 25px;
    color: white;
    position: relative;
    box-shadow: 0 2px 6px rgba(0,0,0,0.25);
}


        .gear {
            width: 70px;
            animation: spin 4s linear infinite;
        }

        @keyframes spin {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        .marca {
            color: #ff1e1e;
            font-weight: bold;
        }


      main {
    
    padding: 100px;
    background-color: #f9fafb;
    flex: 1;
}

        footer {
            background-color: #1E3A8A;
            color: white;
            text-align: center;
            padding: 15px 10px;
            font-size: 14px;
        }

        .redes-sociales a {
            display: inline-block;
            color: white;
            margin: 0 5px;
            font-size: 28px;
            transition: color 0.3s;
            text-decoration: dotted;
        }

        .redes-sociales a:hover {
            color: #FFB800;
        }

        form {
            background-color: white;
            max-width: 700px;
            margin: 20px auto;
            padding: 25px 30px;
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        form h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: 600;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="number"],
        input[type="name"],
        input[type="placa"],
        select,
        textarea {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 15px;
            margin-bottom: 18px;
            transition: border-color 0.3s, box-shadow 0.3s;
            background-color: #fdfdfd;
        }

        input:focus,
        select:focus,
        textarea:focus {
            outline: none;
            border-color: #4b55e0;
            box-shadow: 0 0 5px rgba(75, 85, 224, 0.3);
        }
.logout-btn {
    background-color: #EF4444;
    color: white;
    padding: 10px 20px;
    border-radius: 8px;
    border: none;
    cursor: pointer;
    font-weight: 600;
    margin: 20px;
    transition: all 0.3s ease;
}


button:hover {
    transform: scale(1.05);
}

.btn_eliminar {
    background-color: #ED852F;
    color: white;
    padding: 10px 20px;
    border-radius: 8px;
    border: none;
    cursor: pointer;
    font-weight: 600;
}

.btn_editar {
    background-color: #3B82F6;
    color: white;
    padding: 10px 20px;
    border-radius: 8px;
    border: none;
    cursor: pointer;
    font-weight: 600;
}
.formulario {
    max-width: 420px;
    margin: 50px auto;
    padding: 30px;
    background-color: #FFFFFF;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}

.formulario h2 {
    color: #1E3A8A;
    margin-bottom: 20px;
}

.formulario input {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border-radius: 6px;
    border: 1px solid #CCC;
}

.formulario button {
    width: 100%;
    padding: 12px;
    background-color: #1E40AF;
    color: white;
    border: none;
    border-radius: 8px;
    font-weight: 600;
    cursor: pointer;
    transition: 0.3s;
}

.formulario button:hover {
    background-color: #1E3A8A;
}

        @media (max-width: 768px) {
            .sidebar {
                display: none;
            }

            main {
                margin-left: 0;
                padding: 20px;
            }

            form {
                width: 90%;
            }
        }
form[style*="display:inline"] {
    background-color: transparent !important;
    box-shadow: none !important;
    padding: 0 !important;
    margin: 0 !important;
    border: none !important;
}
.contenedor-tarjetas {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 25px;
    margin-top: 40px;
}

.tarjeta {
    background: #ffffff;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    text-align: center;
    transition: transform 0.2s, box-shadow 0.2s;
}

.tarjeta:hover {
    transform: translateY(-5px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
}

.tarjeta h2 {
    color: #555;
    font-size: 16px;
    margin-bottom: 15px;
    font-weight: 600;
}

.tarjeta-info {
    padding: 20px;
    border-radius: 10px;
    color: white;
}

.tarjeta-info h3 {
    font-size: 16px;
    margin: 0;
}

.tarjeta-info h1 {
    font-size: 32px;
    margin-top: 8px;
}

.azul {
    background-color: #4b55e0;
}

.verde {
    background-color: #10b981;
}

.rojo {
    background-color: #e84343;
}

.amarillo {
    background-color: #fbbf24;
}

.verde-claro {
    background-color: #22c55e;
}

.indigo {
    background-color: #6366f1;
}

@media (max-width: 768px) {
    .tarjeta-info h1 {
        font-size: 26px;
    }
}
.dashboard-container {
    padding: 50px 20px;
    max-width: 1200px;
    margin: 0 auto;
    color: #111827;
    font-family: 'Poppins', sans-serif;
}

.user-section {
    text-align: center;
    margin-bottom: 50px;
}
.user-section h1 {
    font-size: 2.2rem;
    font-weight: 700;
    color: #1E3A8A;
}
.user-section h1 span {
    color: #3B82F6;
}
.user-section .subtitulo {
    color: #6B7280;
    font-size: 1rem;
    margin-top: 8px;
}
.user-card {
    background: linear-gradient(135deg, #f9fafb, #e0e7ff);
    border-radius: 15px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    padding: 25px;
    margin-top: 25px;
    display: inline-block;
    text-align: left;
}
.user-info p {
    font-size: 1rem;
    margin: 8px 0;
    color: #374151;
}
.user-info i {
    color: #2563eb;
    margin-right: 8px;
}

.novedades-section {
    text-align: center;
}
.novedades-section h2 {
    font-size: 1.8rem;
    color: #1E3A8A;
    margin-bottom: 30px;
}
.novedades-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
    gap: 25px;
}
.novedad-card {
    background: #ffffff;
    border-radius: 12px;
    box-shadow: 0 3px 10px rgba(0,0,0,0.08);
    transition: all 0.3s ease;
    overflow: hidden;
}
.novedad-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 6px 14px rgba(0,0,0,0.12);
}
.novedad-content {
    padding: 20px;
}
.novedad-content h3 {
    color: #1E40AF;
    font-size: 1.2rem;
    margin-bottom: 10px;
}
.novedad-content p {
    color: #4B5563;
    font-size: 0.95rem;
    line-height: 1.5;
}

.imagenes-grid {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 12px;
    background: #f9fafb;
    padding: 15px;
}
.img-wrapper {
    position: relative;
    border-radius: 10px;
    overflow: hidden;
    transition: transform 0.3s;
}
.img-wrapper:hover {
    transform: scale(1.05);
}
.img-wrapper img {
    width: 100%;
    max-width: 320px;
    border-radius: 10px;
    display: block;
}

.sin-imagenes, .sin-novedades {
    color: #9CA3AF;
    font-style: italic;
    margin-top: 20px;
}

@media (max-width: 768px) {
    .user-card {
        width: 100%;
    }
    .novedad-content h3 {
        font-size: 1rem;
    }
}

    </style>
</head>

<body>
    <header style="display: flex; justify-content: space-between; align-items: center; padding: 20px 30px;">
        <div style="text-align: center; flex: 1;">
            <img src="{{ asset('imagenes/engranajes.png') }}" alt="Engranaje" class="gear">
            <h1>Bienvenido a <span class="marca">RallyCar</span></h1>
        </div>

        <form method="POST" action="{{ route('logoutcliente') }}" style="margin: 0; padding: 0;">
            @csrf
            <button type="submit" style="background-color: #e84444; color: white; padding: 10px 15px; border-radius: 6px; border: none; cursor: pointer; font-weight: 500;">
                Cerrar sesión
            </button>
        </form>
    </header>



  

    <main>
        @yield('contenido')
    </main>

    <footer class="footer">
        <p>&copy; {{ date('Y') }} RallyCar. Todos los derechos reservados.</p>
        <p>Creado por <strong>Juan Pablo Ríos Ríos</strong></p>

        <div class="redes-sociales">
            <a href="https://facebook.com" target="_blank"><i class="fab fa-facebook"></i></a>
            <a href="https://instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
            <a href="https://wa.me/573002001000" target="_blank"><i class="fab fa-whatsapp"></i></a>
        </div>

        <p class="ubicacion">Pereira, Risaralda - Colombia</p>
    </footer>
</body>

</html>