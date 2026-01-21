<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('titulo','Dashboard') | RallyCars</title>
  <link rel="icon" href="{{ asset('imagenes/logo1.png') }}" type="image/png">

  <!-- Tailwind -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

  <style>
    body {
      font-family: 'Poppins', system-ui, sans-serif;
    }

    /* =========================
       FORMULARIOS (GLOBAL)
    ========================= */
    .formulario {
      max-width: 700px;
      margin: 0 auto;
      background: white;
      padding: 24px;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0,0,0,.08);
    }

    .formulario h2 {
      text-align: center;
      font-weight: 600;
      margin-bottom: 20px;
    }

    .formulario label {
      display: block;
      font-weight: 500;
      margin-bottom: 6px;
    }

    .formulario input,
    .formulario select,
    .formulario textarea {
      width: 100%;
      padding: 10px 12px;
      border-radius: 8px;
      border: 1px solid #d1d5db;
      margin-bottom: 18px;
      transition: all .2s;
    }

    .formulario input:focus,
    .formulario select:focus,
    .formulario textarea:focus {
      outline: none;
      border-color: #2563eb;
      box-shadow: 0 0 0 2px rgba(37,99,235,.2);
    }

    /* =========================
       BOTONES
    ========================= */
    .btn {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
      width: 100%;
      padding: 12px 20px;
      border-radius: 14px;
      font-weight: 600;
      font-size: 15px;
      transition: all .25s ease;
      cursor: pointer;
    }

    .btn-primary {
      background: linear-gradient(135deg, #2563eb, #1d4ed8);
      color: white;
    }

    .btn-primary:hover {
      transform: translateY(-2px) scale(1.02);
      box-shadow: 0 10px 20px rgba(37,99,235,.35);
    }

    .btn-danger {
      background: linear-gradient(135deg, #dc2626, #b91c1c);
      color: white;
    }

    .btn-danger:hover {
      transform: translateY(-2px) scale(1.02);
      box-shadow: 0 10px 20px rgba(220,38,38,.35);
    }

    .btn-secondary {
      background: linear-gradient(135deg, #6b7280, #4b5563);
      color: white;
    }

    .btn-secondary:hover {
      transform: translateY(-2px) scale(1.02);
      box-shadow: 0 10px 20px rgba(107,114,128,.35);
    }

    .btn-sm {
      width: auto;
      padding: 8px 14px;
      font-size: 14px;
      border-radius: 10px;
    }

    /* =========================
       TABLAS
    ========================= */
    table {
      background: white;
      border-radius: 12px;
      overflow-x: auto;
      box-shadow: 0 4px 12px rgba(0,0,0,.08);
      width: 100%;
      display: block;
    }

    th {
      background: #f1f5f9;
      font-weight: 600;
    }

    th, td {
      padding: 12px;
      text-align: center;
      white-space: nowrap;
    }

  </style>
</head>

<body class="bg-slate-100 text-gray-800 min-h-screen flex flex-col md:flex-row">

  <!-- Sidebar -->
  <aside id="sidebar" class="fixed inset-y-0 left-0 w-64 bg-gradient-to-b from-blue-900 to-blue-800 text-white transform -translate-x-full md:translate-x-0 transition-transform duration-300 z-40 flex flex-col">

    <div class="px-6 py-6 text-center border-b border-white/10">
      <img src="{{ asset('imagenes/logo1.png') }}" class="w-16 sm:w-20 mx-auto mb-2" />
      <h2 class="font-semibold tracking-wide">RallyCars</h2>
    </div>

    <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">
      <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-white/10 transition">
        <i class="fas fa-tachometer-alt"></i> Dashboard
      </a>
      <a href="{{ route('usuario.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-white/10 transition">
        <i class="fas fa-users"></i> Usuarios
      </a>
      <a href="{{ route('vehiculo.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-white/10 transition">
        <i class="fas fa-car"></i> Vehículos
      </a>
      <a href="{{ route('novedad.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-white/10 transition">
        <i class="fas fa-wrench"></i> Novedades
      </a>
      <a href="{{ route('ventas.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-white/10 transition">
        <i class="fas fa-cash-register"></i> Ventas
      </a>
      <a href="{{ route('gastos.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-white/10 transition">
        <i class="fa-solid fa-sack-xmark"></i> Gastos
      </a>
    </nav>

    <form method="POST" action="{{ route('logout') }}" class="p-4 border-t border-white/10">
      @csrf
      <button type="submit" class="w-full btn-danger flex items-center justify-center gap-2">
        <i class="fas fa-sign-out-alt"></i> Cerrar sesión
      </button>
    </form>
  </aside>

  <!-- Overlay -->
  <div id="overlay" class="fixed inset-0 bg-black/50 hidden z-30 md:hidden"></div>

  <!-- Content -->
  <div class="flex-1 flex flex-col md:ml-64">

    <!-- Topbar -->
    <header class="bg-white shadow-sm px-4 sm:px-6 py-3 flex items-center justify-between sticky top-0 z-20">
      <button id="menuBtn" class="md:hidden text-2xl text-blue-800">
        <i class="fas fa-bars"></i>
      </button>
      <h1 class="text-lg sm:text-xl font-semibold">@yield('titulo','Dashboard')</h1>
    </header>
 <main class="flex-1 p-4 sm:p-6 overflow-x-auto">
      @yield('contenido')
    </main>
    <!-- Footer -->
    <footer class="bg-white text-center text-sm text-gray-500 py-4 border-t mt-auto">
      <p>&copy; {{ date('Y') }} RallyCars · Pereira, Risaralda</p>
    </footer>
  </div>

  <script>
    const menuBtn = document.getElementById('menuBtn');
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('overlay');

    menuBtn?.addEventListener('click', () => {
      sidebar.classList.toggle('-translate-x-full');
      overlay.classList.toggle('hidden');
    });

    overlay.addEventListener('click', () => {
      sidebar.classList.add('-translate-x-full');
      overlay.classList.add('hidden');
    });
  </script>

</body>
</html>
