<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Fondo con transición animada entre azul y rojo */
        body {
            background: linear-gradient(-45deg, #174dd7, #ff1e1e, #174dd7, #ff1e1e);
            background-size: 400% 400%;
            animation: gradientShift 10s ease infinite;
            color: white;
            font-family: 'Poppins', sans-serif;
            overflow-x: hidden;
            margin: 0;
            padding: 0;
             min-height: 100vh;
             display: flex;
    flex-direction: column;
        }

        @keyframes gradientShift {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        /* Header con botones arriba a la derecha */
        .header {
            display: flex;
            justify-content: flex-end;
            padding: 20px 40px;
            position: relative;
            z-index: 10;
        }

        .botones {
            display: flex;
            gap: 12px;
        }

        .btn {
            background-color: #174dd7;
            color: white;
            padding: 10px 18px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
            transition: all 0.3s ease;
        }

        .btn:hover {
            background-color: #0b3ecf;
            transform: scale(1.05);
        }

        .btn-secundario {
            background-color: #ff1e1e;
        }

        .btn-secundario:hover {
            background-color: #d81414;
            transform: scale(1.05);
        }

        /* Contenido principal */
        .inicio-container {
            text-align: center;
            margin-top: 70px;
        }

        .marca {
            color: #ff1e1e;
        }

        .logo {
            width: 250px;
            /* antes 100px */
            max-width: 100%;
            height: auto;
            margin-bottom: 10px;
        }

        .gear {
            width: 120px;
            animation: spin 4s linear infinite;
            margin-bottom: 20px;
        }

        @keyframes spin {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        /* Sección de servicios */
        .servicios {
            text-align: center;
            margin: 80px auto;
            max-width: 1100px;
        }

        .servicios h2 {
            font-size: 1.9em;
            margin-bottom: 30px;
            color: #fff;
            text-shadow: 0 0 5px rgba(0, 0, 0, 0.5);
        }

        .tarjetas-servicios {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 25px;
            padding: 0 20px;
        }

        .tarjeta {
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            padding: 25px;
            color: #fff;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
            transition: all 0.3s ease;
        }

        .tarjeta:hover {
            transform: translateY(-6px);
            background-color: rgba(255, 255, 255, 0.15);
        }

        .icono-servicio {
            font-size: 2.5em;
            color: #174dd7;
            margin-bottom: 10px;
        }

        .tarjeta h3 {
            color: #fff;
            margin-bottom: 8px;
            font-size: 1.2em;
        }

        .tarjeta p {
            color: #e0e0e0;
            font-size: 0.95em;
        }

        .footer {
            background-color: #ff1e1eff;
            color: white;
            text-align: center;
            padding: 10px 0;
            font-size: 13px;
        }

        .footer p {
            margin: 5px 0;
        }

        .footer .redes-sociales {
            margin: 8px 0;
        }

        .footer .redes-sociales a {
            color: white;
            margin: 0 10px;
            text-decoration: none;
            font-size: 18px;
            transition: transform 0.2s, color 0.2s;
        }

        .footer .redes-sociales a:hover {
            color: #2500f4ff;
            transform: scale(1.2);
        }

        .footer .ubicacion {
            font-size: 12px;
            margin-top: 5px;
        }


        /* Responsive */
        @media (max-width: 700px) {
            .header {
                justify-content: center;
                padding: 15px;
            }

            .gear {
                width: 80px;
            }

            h1 {
                font-size: 1.6em;
            }
        }
    </style>
</head>

<body>

    <div class="header">
        <div class="botones">
                        <a href="{{ route('iniciocliente.index') }}" class="btn btn-primario">Cliente</a>

            <a href="{{ route('inicio.index') }}" class="btn btn-secundario">Admin</a>
        </div>
    </div>

    <div class="inicio-container">
        <img src="{{ asset('imagenes/logo1.png') }}" alt="Logo RallyCar" class="logo">
        <h1>Bienvenido a <span class="marca">Rallycars</span></h1>
        <p>Tu taller de confianza para diagnósticos, mantenimiento y reparaciones completas.</p>
    </div>

    <section class="servicios">
        <h2>Nuestros Servicios</h2>
        <div class="tarjetas-servicios">
            <div class="tarjeta">
                <i class="fa-solid fa-magnifying-glass-chart icono-servicio"></i>
                <h3>Diagnóstico con Escáner</h3>
                <p>Detectamos fallas electrónicas con tecnología avanzada para un mantenimiento más preciso.</p>
            </div>

            <div class="tarjeta">
                <i class="fa-solid fa-oil-can icono-servicio"></i>
                <h3>Mantenimiento Preventivo</h3>
                <p>Cuidamos tu vehículo con cambios de aceite, filtros y revisión general profesional.</p>
            </div>

            <div class="tarjeta">
                <i class="fa-solid fa-car-side icono-servicio"></i>
                <h3>Alineación y Balanceo</h3>
                <p>Garantizamos una conducción estable y segura con herramientas modernas.</p>
            </div>

            <div class="tarjeta">
                <i class="fa-solid fa-bolt icono-servicio"></i>
                <h3>Servicio Eléctrico y Mecánico</h3>
                <p>Reparamos sistemas eléctricos, frenos, suspensión y más con personal capacitado.</p>
            </div>
        </div>
    </section>

    <footer class="footer">
        <p>&copy; {{ date('Y') }} Rally Cards. Todos los derechos reservados.</p>
        <p>Creado por <strong>Juan Pablo Ríos Ríos</strong></p>

        <div class="redes-sociales">
            <a href="https://www.facebook.com" target="_blank"><i class="fab fa-facebook"></i></a>
            <a href="https://www.instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
            <a href="https://wa.me/573002001000" target="_blank"><i class="fab fa-whatsapp"></i></a>
        </div>

        <p class="ubicacion"> Pereira, Risaralda - Colombia</p>
    </footer>

</body>

</html>