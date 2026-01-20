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
       FORMULARIOS
    ========================= */
    .formulario {
      max-width: 700px;
      margin: 0 auto;
      background: white;
      padding: 24px;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0,0,0,.08);
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
      padding: 12px 20px;
      border-radius: 14px;
      font-weight: 600;
      transition: all .25s ease;
      cursor: pointer;
    }

    .btn-primary {
      background: linear-gradient(135deg, #2563eb, #1d4ed8);
      color: white;
    }

    .btn-primary:hover {
      transform: translateY(-2px);
      box-shadow: 0 10px 20px rgba(37,99,235,.35);
    }

    .btn-danger {
      background: linear-gradient(135deg, #dc2626, #b91c1c);
      color: white;
    }

    .btn-secondary {
      background: linear-gradient(135deg, #6b7280, #4b5563);
      color: white;
    }

    /* =========================
       TABLAS
    ========================= */
    table {
      background: white;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 4px 12px rgba(0,0,0,.08);
    }

    th {
      background: #f1f5f9;
      font-weight: 600;
    }

    th, td {
      padding: 12px;
      text-align: center;
    }
  </style>
</head>

<body class="bg-slate-100 text-gray-800 min-h-screen flex flex-col">

  <!-- HEADER -->
  <header class="bg-gradient-to-r from-blue-900 to-blue-800 text-white shadow-md">
    <div class="max-w-7xl mx-auto px-6 py-4 flex flex-col md:flex-row items-center justify-between gap-4">
      
      <div class="flex items-center gap-3">
        <img src="{{ asset('imagenes/logo1.png') }}" class="w-14">
        <h1 class="text-xl font-semibold">
          Rally<span class="text-red-400">Cars</span>
        </h1>
      </div>

      <form method="POST" action="{{ route('logoutcliente') }}">
        @csrf
        <button class="btn btn-danger">
          <i class="fas fa-sign-out-alt"></i> Salir
        </button>
      </form>

    </div>
  </header>

  <!-- CONTENIDO -->
  <main class="flex-1 max-w-7xl mx-auto w-full px-6 py-8">
    @yield('contenido')
  </main>

  <!-- FOOTER -->
  <footer class="bg-white border-t text-center text-sm text-gray-500 py-5">
    <p>&copy; {{ date('Y') }} RallyCars · Pereira, Risaralda</p>
    <p class="mt-1">Creado por <strong>Juan Pablo Ríos Ríos</strong></p>

    <div class="flex justify-center gap-4 mt-3 text-xl">
      <a href="https://facebook.com" target="_blank" class="hover:text-blue-600">
        <i class="fab fa-facebook"></i>
      </a>
      <a href="https://instagram.com" target="_blank" class="hover:text-pink-500">
        <i class="fab fa-instagram"></i>
      </a>
      <a href="https://wa.me/573002001000" target="_blank" class="hover:text-green-500">
        <i class="fab fa-whatsapp"></i>
      </a>
    </div>
  </footer>

</body>
</html>
