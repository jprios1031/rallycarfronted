<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('titulo') | RallyCars</title>
  <link rel="icon" href="{{ asset('imagenes/logo1.png') }}" type="image/png">

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
</head>

<body class="min-h-screen flex flex-col bg-gradient-to-br from-blue-900 via-blue-800 to-red-700 text-white">

  <!-- Header -->
  <header class="bg-black/40 backdrop-blur-md shadow-lg">
    <div class="max-w-7xl mx-auto px-6 py-6 text-center">
      <img src="{{ asset('imagenes/logo1.png') }}" alt="RallyCars" class="w-20 mx-auto mb-3" />
      <h1 class="text-2xl font-semibold tracking-wide">Bienvenido a <span class="text-yellow-400">RallyCars</span></h1>
    </div>
  </header>

  <!-- Main -->
  <main class="flex-1 flex items-center justify-center px-6 py-12">
    <div class="w-full max-w-md bg-white text-gray-800 rounded-2xl shadow-2xl p-8 relative">

      <!-- Título del formulario -->
      <div class="text-center mb-6">
        <h2 class="text-xl font-bold text-blue-900">@yield('titulo')</h2>
        <div class="mt-3 h-1 w-20 bg-gradient-to-r from-blue-700 to-red-600 mx-auto rounded-full"></div>
      </div>

      <!-- Contenido -->
      <div class="space-y-6">
        @yield('contenido')
      </div>

      <!-- Separador inferior -->
      <div class="mt-8 border-t pt-4 text-center text-sm text-gray-500">
        Sistema de gestión RallyCars
      </div>
    </div>
  </main>

  <!-- Footer -->
  <footer class="bg-black/60 text-gray-300 text-center py-6 text-sm">
    <img src="{{ asset('imagenes/logo1.png') }}" class="w-14 mx-auto mb-3" />
    <p>&copy; {{ date('Y') }} RallyCars. Todos los derechos reservados.</p>
    <p class="mb-3">Desarrollado por <strong class="text-white">Juan Pablo Ríos Ríos</strong></p>

    <div class="flex justify-center gap-6 text-xl">
      <a href="https://facebook.com" target="_blank" class="hover:text-blue-500 transition"><i class="fab fa-facebook"></i></a>
      <a href="https://instagram.com" target="_blank" class="hover:text-pink-500 transition"><i class="fab fa-instagram"></i></a>
      <a href="https://wa.me/573002001000" target="_blank" class="hover:text-green-500 transition"><i class="fab fa-whatsapp"></i></a>
    </div>

    <p class="text-xs mt-3">Pereira, Risaralda · Colombia</p>
  </footer>

</body>
</html>