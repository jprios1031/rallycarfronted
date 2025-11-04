<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo') | RallyCar</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        /* === ESTILOS GENERALES === */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f3f4f6;
            margin: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            text-align: center;
        }

        h1,
        h2,
        h3 {
            margin: 0;
        }

        /* === HEADER === */
        header {
            background-color: #7BE0E3;
            text-align: center;
            padding: 20px 0;
            color: white;
            position: relative;
        }

        .gear {
            width: 90px;
            animation: spin 4s linear infinite;
            display: block;
            margin: 0 auto 10px;
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

        /* === SIDEBAR === */
        .sidebar {
            width: 230px;
            background-color: #fff;
            position: fixed;
            top: 0;
            bottom: 0;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.15);
            padding-top: 150px;
        }

        .sidebar a {
            display: block;
            padding: 14px 20px;
            text-decoration: none;
            color: #333;
            font-weight: 500;
            transition: background 0.3s, color 0.3s;
        }

        .sidebar a:hover {
            background-color: #eceffe;
            color: #4b55e0;
        }

        /* === MAIN === */
        main {
            margin-left: 230px;
            padding: 30px;
            background-color: #f9fafb;
            flex: 1;
            min-height: 80vh;
        }

        /* === FOOTER === */
        footer {
            background-color: #ff1e1e;
            color: #fff;
            text-align: center;
            padding: 15px 10px;
            margin-top: auto;
            font-size: 14px;
        }

        .footer .redes-sociales {
            margin: 8px 0;
        }

        .footer .redes-sociales a {
            color: white;
            margin: 0 8px;
            font-size: 18px;
            text-decoration: none;
            transition: transform 0.2s, color 0.2s;
        }

        .footer .redes-sociales a:hover {
            color: #1e3a8a;
            transform: scale(1.2);
        }

        .ubicacion {
            font-size: 12px;
            margin-top: 5px;
        }

        /* === FORMULARIOS === */
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
.btn-eliminar {
    background-color: #e84444;
    color: white;
    border: none;
    padding: 10px 15px;
    border-radius: 6px;
    cursor: pointer;
    transition: background-color 0.3s, transform 0.2s;
}

.btn-eliminar:hover {
    background-color: #c73535;
    transform: scale(1.03);
}

.btn-eliminar:focus {
    outline: none;
}

form[style*="display:inline"] {
    background: transparent !important;
}

        button {
            background-color: #4b55e0;
            color: white;
            border: none;
            padding: 12px 18px;
            border-radius: 6px;
            font-size: 15px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
        }

        button:hover {
            background-color: #3b44c1;
            transform: scale(1.02);
        }

        .btn-secundario {
            background-color: #f1f1f1;
            color: #333;
            margin-left: 10px;
        }

        .btn-secundario:hover {
            background-color: #ddd;
        }

        /* === RESPONSIVE === */
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
        /* Sobrescribe formularios pequeños de botones */
form[style*="display:inline"] {
    background-color: transparent !important;
    box-shadow: none !important;
    padding: 0 !important;
    margin: 0 !important;
    border: none !important;
}
/* ==== TARJETAS DE DASHBOARD ==== */
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

/* ==== COLORES ==== */
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

/* ==== RESPONSIVE ==== */
@media (max-width: 768px) {
    .tarjeta-info h1 {
        font-size: 26px;
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