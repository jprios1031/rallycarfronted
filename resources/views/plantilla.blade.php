<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo') | RallyCar</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>

        /* === BASE === */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f3f4f6;
            margin: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            text-align: center;
        }

        /* === HEADER === */
        header {
            background-color: #1E40AF;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 20px;
            color: white;
            position: relative;
        }

        .gear {
            width: 70px;
            animation: spin 4s linear infinite;
        }

        @keyframes spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        .marca {
            color: #FFB800;
            font-weight: bold;
        }

        /* === BOTÓN HAMBURGUESA === */
        .menu-toggle {
            display: none;
            font-size: 26px;
            background: none;
            border: none;
            color: white;
            cursor: pointer;
        }

        /* === SIDEBAR === */
        .sidebar {
            width: 200px;
            background-color: #E0F2FE;
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            box-shadow: 2px 0 10px rgba(0,0,0,0.15);
            padding-top: 120px;
            transition: transform 0.3s ease;
        }

        .sidebar a {
            display: block;
            padding: 30px 40px;
            text-decoration: none;
            color: #333;
            font-weight: 700;
            transition: background 0.3s, color 0.3s;
            text-align: left;

        
           
        }

        .sidebar a:hover {
            background-color: #BFDBFE;
            color: #4b55e0;
        }

     

        main {
            margin-left: 230px;
            padding: 30px;
            background-color: #f9fafb;
            flex: 1;
        }

        /* === FOOTER === */
        footer {
            background-color: #1E3A8A;
            color: white;
            text-align: center;
            padding: 15px 10px;
            font-size: 14px;
        }
        .redes-sociales a {
            color: white;
           justify-content: center;
            align-items: center;
            gap: 10px;
        }
        .redes-sociales a {
            display: inline-block;
            color: white;
            margin: 0 5px;
            font-size: 18px;
            transition: color 0.3s;
            text-decoration: none;
}

        .redes-sociales a:hover {
            color: #FFB800;
        }


        /* === RESPONSIVE === */
        @media (max-width: 768px) {
            .menu-toggle {
                display: block;
            }

            .sidebar {
                transform: translateX(-100%);
                z-index: 1000;
            }

            .sidebar.active {
                transform: translateX(0);
            }

            main {
                margin-left: 0;
                padding: 20px;
            }

            /* Fondo oscuro detrás del menú */
            .overlay {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.4);
                display: none;
                z-index: 999;
            }

            .overlay.active {
                display: block;
            }
        }
    </style>
</head>
<body>

    <header>
        <!-- Botón hamburguesa (solo visible en móvil) -->
        <button class="menu-toggle"><i class="fas fa-bars"></i></button>

        <div style="text-align: center; flex: 1;">
            <img src="{{ asset('imagenes/engranajes.png') }}" alt="Engranaje" class="gear">
            <h1>Bienvenido a <span class="marca">RallyCar</span></h1>
        </div>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" style="background-color: #EF4444; color: white; padding: 10px 15px; border-radius: 6px; border: none; cursor: pointer;">
                Cerrar sesión
            </button>
        </form>
    </header>

    <!-- Sidebar -->
    <aside class="sidebar">
        <a href="{{ route('dashboard') }}">🏠 Dashboard</a>
        <a href="{{ route('vehiculo.index') }}">🚗 Vehículos</a>
        <a href="{{ route('usuario.index') }}">👥 Usuarios</a>
        <a href="{{ route('novedad.index') }}">🧰 Novedades</a>
        <a href="{{ route('ventas.index') }}">💲 Ventas</a>
    </aside>

    <!-- Fondo oscuro detrás del menú -->
    <div class="overlay"></div>

    <main>
        @yield('contenido')
    </main>

    <footer>
        <p>&copy; {{ date('Y') }} RallyCar. Todos los derechos reservados.</p>
        <p>Creado por <strong>Juan Pablo Ríos Ríos</strong></p>
        <div class="redes-sociales">
            <a href="https://facebook.com" target="_blank"><i class="fab fa-facebook"></i></a>
            <a href="https://instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
            <a href="https://wa.me/573002001000" target="_blank"><i class="fab fa-whatsapp"></i></a>
        </div>
        <p class="ubicacion">Pereira, Risaralda - Colombia</p>
    </footer>

    <script>
        const menuBtn = document.querySelector('.menu-toggle');
        const sidebar = document.querySelector('.sidebar');
        const overlay = document.querySelector('.overlay');

        menuBtn.addEventListener('click', () => {
            sidebar.classList.toggle('active');
            overlay.classList.toggle('active');
        });

        overlay.addEventListener('click', () => {
            sidebar.classList.remove('active');
            overlay.classList.remove('active');
        });
    </script>

</body>
</html>
