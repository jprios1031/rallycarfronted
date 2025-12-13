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
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.25);
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
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
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
            transition: .2s;
        }

        .tarjeta-info h1 {
            font-size: 32px;
        }

        .novedades-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 25px;
        }

        .img-wrapper img {
            width: 100%;
            max-width: 320px;
            border-radius: 10px;
        }


        /* Hasta 768px */
        @media (max-width: 768px) {
            main {
                padding: 20px !important;
            }

            form {
                width: 90% !important;
                padding: 20px !important;
            }

            .user-card {
                width: 100%;
            }

            .tarjeta-info h1 {
                font-size: 26px;
            }

            .novedad-content h3 {
                font-size: 1rem;
            }
        }

        /* Hasta 600px (móvil) */
        @media (max-width: 600px) {

            header {
                flex-direction: column !important;
                text-align: center;
                gap: 10px;
                padding: 15px 10px !important;
            }

            header .gear {
                width: 55px;
            }

            header h1 {
                font-size: 1.4rem;
            }

            header form button {
                width: 100%;
                padding: 12px;
                font-size: 15px;
            }

            main {
                padding: 20px !important;
            }

            .contenedor-tarjetas {
                grid-template-columns: 1fr !important;
                gap: 15px;
            }

            .novedades-grid {
                grid-template-columns: 1fr !important;
            }

            .img-wrapper img {
                width: 100% !important;
                height: auto !important;
                max-width: 100% !important;
            }

            footer {
                font-size: 12px;
                padding: 12px;
            }

            .redes-sociales a {
                font-size: 22px;
            }
        }
    </style>
</head>

<body>

    <header style="display:flex; justify-content:space-between; align-items:center; padding:20px 30px;">
        <div style="text-align:center; flex:1;">
            <img src="{{ asset('imagenes/engranajes.png') }}" class="gear">
            <h1>Bienvenido a <span class="marca">RallyCar</span></h1>
        </div>

        <form method="POST" action="{{ route('logoutcliente') }}" style="margin:0; padding:0;">
            @csrf
            <button type="submit" style="background:#e84444; color:#fff; padding:10px 15px; border:none; border-radius:6px;">
                Cerrar sesión
            </button>
        </form>
    </header>

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

        <p>Pereira, Risaralda - Colombia</p>
    </footer>

</body>

</html>