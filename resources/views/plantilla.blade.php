<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo') | RallyCar</title>
        <link rel="icon" href="{{ asset('imagenes/logo1.png') }}" type="image/png">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f3f4f6;
            margin: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            text-align: center;
        }

        
        header {
            background-color: #1E40AF;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 25px;
            color: white;
            position: relative;
        }
   
 .tabla {
    border-collapse: collapse;  /* ya tenías bordes */
    margin: 0 auto;             /* centra la tabla horizontalmente */
}

.tabla th, .tabla td {
    border: 1px solid black;
    padding: 10px 10px;
    text-align: center;         /* centra el contenido horizontalmente */
    vertical-align: center;     /* centra verticalmente */
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

        
        .menu-toggle {
            display: none;
            font-size: 26px;
            background: none;
            border: none;
            color: white;
            cursor: pointer;
        }

        
        .logout-btn {
            background-color: #EF4444;
            color: white;
            padding: 10px 20px;
            border-radius: 20px;
            border: none;
            cursor: pointer;
            font-weight: 600;
        }
             .btn_eliminar {
            background-color: #ED852F;
            color: white;
            padding: 10px 20px;
            border-radius: 20px;
            border: none;
            cursor: pointer;
            font-weight: 600;
        }
         .btn_editar {
            background-color: #4C2FED;
            color: white;
            padding: 10px 20px;
            border-radius: 20px;
            border: none;
            cursor: pointer;
            font-weight: 600;
        }

        .logout-btn:hover {
            background-color: #DC2626;
        }

        
        .sidebar {
            width: 220px;
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
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 18px 25px;
            text-decoration: none;
            color: #333;
            font-weight: 600;
            transition: all 0.3s;
            font-size: 16px;
        }

        .sidebar a i {
            font-size: 18px;
            color: #1E40AF;
        }

        .sidebar a:hover {
            background-color: #black;
            color: #1E3A8A;
            transform: translateX(25px);
        }

        main {
            margin-left: 200px;
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
        .formulario{
            max-width: 400px;
            margin: 50px auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            text-align: center;
            align-items: center;
        }
        .formulario h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        formulario label {
    display: block;
    margin-bottom: 6px;
    font-weight: 600;
}

.formulario input {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border-radius: 6px;
    border: 1px solid #ccc;
    font-size: 14px;
}

.formulario button {
    width: 100%;
    padding: 12px;
    border: none;
    border-radius: 8px;
    font-weight: 600;
    cursor: pointer;
}
        
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
        
        <button class="menu-toggle"><i class="fas fa-bars"></i></button>

        
        <div style="text-align: center; flex: 1;">
            <img src="{{ asset('imagenes/engranajes.png') }}" alt="Engranaje" class="gear">
            <h1>Bienvenido a <span class="marca">RallyCar</span></h1>
        </div>

        
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="logout-btn">
                <i class="fas fa-sign-out-alt"></i> Cerrar sesión
            </button>
        </form>
    </header>

    
    <aside class="sidebar">
        <a href="{{ route('dashboard') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
        <a href="{{ route('vehiculo.index') }}"><i class="fas fa-car"></i> Vehículos</a>
        <a href="{{ route('usuario.index') }}"><i class="fas fa-users"></i> Usuarios</a>
        <a href="{{ route('novedad.index') }}"><i class="fas fa-wrench"></i> Novedades</a>
        <a href="{{ route('ventas.index') }}"><i class="fas fa-cash-register"></i> Ventas</a>
        <a href="{{ route('gastos.index') }}"><i class="fa-solid fa-sack-xmark"></i> Gastos</a>
    </aside>

    
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
