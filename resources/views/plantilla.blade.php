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
    font-family: 'Poppins', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #F9FAFB;
    color: #111827;
    margin: 0;
    display: flex;
    flex-direction: column;
    min-height: 100vh;
    text-align: center;
}

/* ======= HEADER ======= */
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
    animation: spin 5s linear infinite;
}

@keyframes spin {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}

.marca {
    color: #FACC15;
    font-weight: 700;
}

/* ======= SIDEBAR ======= */
.sidebar {
    width: 230px;
    background-color: #E2E8F0; /* Azul grisáceo metálico claro */
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    box-shadow: 2px 0 8px rgba(0,0,0,0.1);
    padding-top: 40px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    transition: transform 0.3s ease;
}

.sidebar a {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 15px 25px;
    text-decoration: none;
    color: #1E3A8A;
    font-weight: 600;
    transition: all 0.3s;
}

.sidebar a i {
    font-size: 18px;
    color: #1E3A8A;
}

.sidebar a:hover {
    background-color: #1E40AF;
    color: #FFF;
    transform: translateX(8px);
}

/* Logo centrado */
.logo {
    display: block;
    margin: 0 auto 25px auto;
    width: 100px;
    height: auto;
}

/* ======= BOTONES ======= */
.logout-btn {
    background-color: #EF4444;
    color: white;
    padding: 10px 20px;
    border-radius: 50px;    border: none;
    cursor: pointer;
    font-weight: 600;
    margin: 20px;
    transition: all 0.3s ease;
}


button:hover {
    transform: scale(1.05);
    transition: all 0.3s ease;

}

.btn_eliminar {
    background-color: #ED852F;
    color: white;
    padding: 10px 20px;
    border-radius: 50px;
    border: none;
    cursor: pointer;
    font-weight: 600;
}

.btn_editar {
    background-color: #3B82F6;
    color: white;
    padding: 10px 20px;
    border-radius: 50px;
    border: none;
    cursor: pointer;
    font-weight: 600;
}

main {
    margin-left: 230px;
    padding: 80px 40px;
    background-color: #F9FAFB;
    flex: 1;
}

/* ======= TABLAS ======= */
.tabla {
    border-collapse: collapse;
    margin: 0 auto;
    width: 90%;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}

.tabla th {
    background-color: #1E3A8A;
    color: white;
    padding: 12px;
    text-transform: uppercase;
    font-size: 14px;
}

.tabla td {
    border: 1px solid #E5E7EB;
    padding: 10px;
    text-align: center;
}

/* ======= FORMULARIOS ======= */
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

/* ======= FOOTER ======= */
footer {
    background-color: #1E3A8A; /* Mismo color que header */
    color: white;
    text-align: center;
    padding: 20px 10px;
    font-size: 14px;
    box-shadow: 0 -2px 6px rgba(0,0,0,0.2);
}

.redes-sociales a {
    color: #FFF;
    margin: 0 8px;
    font-size: 26px;
    transition: 0.3s;
}

.redes-sociales a:hover {
    color: #FACC15;
}

/* ======= RESPONSIVE ======= */
.menu-toggle {
    display: none;
    font-size: 26px;
    background: none;
    border: none;
    color: white;
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
        background: rgba(0, 0, 0, 0.5);
        display: none;
        z-index: 999;
    }

    .overlay.active {
        display: block;
    }
}

.dashboard-card {
    background-color: #FFFFFF;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    padding: 20px;
    margin: 15px;
    text-align: center;

    </style>
</head>
<body>

    <header>
        
        <button class="menu-toggle"><i class="fas fa-bars"></i></button>

        
        <div style="text-align: center; flex: 1;">
            <img src="{{ asset('imagenes/engranajes.png') }}" alt="Engranaje" class="gear">
            <h1>Bienvenido a <span class="marca">RallyCar</span></h1>
        </div>
    </header>

    
    <aside class="sidebar">
        <div>
        <img src="{{ asset('imagenes/logo1.png') }}" alt="Logo RallyCar" class="logo">
        <a href="{{ route('dashboard') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
        <a href="{{ route('usuario.index') }}"><i class="fas fa-users"></i> Usuarios</a>
        <a href="{{ route('vehiculo.index') }}"><i class="fas fa-car"></i> Vehículos</a>
        <a href="{{ route('novedad.index') }}"><i class="fas fa-wrench"></i> Novedades</a>
        <a href="{{ route('ventas.index') }}"><i class="fas fa-cash-register"></i> Ventas</a>
        <a href="{{ route('gastos.index') }}"><i class="fa-solid fa-sack-xmark"></i> Gastos</a>
        </div>
         <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="logout-btn">
                <i class="fas fa-sign-out-alt"></i> Cerrar sesión
            </button>
        </form>
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
