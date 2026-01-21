<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('titulo','Inicio') | RallyCars</title>
  <link rel="icon" href="{{ asset('imagenes/logo1.png') }}" type="image/png">

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

  <style>
    body { font-family: 'Poppins', system-ui, sans-serif; }
  </style>
</head>

<body class="bg-gradient-to-br from-blue-900 via-blue-800 to-red-700 text-white min-h-screen flex flex-col">

  <!-- Header -->
  <header class="w-full bg-black/40 backdrop-blur-md sticky top-0 z-50">
    <div class="max-w-7xl mx-auto flex items-center justify-between px-6 py-4">
      <div class="flex items-center gap-3">
        <img src="{{ asset('imagenes/logo1.png') }}" alt="RallyCars" class="w-12 h-auto" />
        <span class="text-lg font-semibold tracking-wide">RallyCars</span>
      </div>

      <nav class="flex gap-3">
        <a href="{{ route('iniciocliente.index') }}" class="px-5 py-2 rounded-full bg-blue-600 hover:bg-blue-700 transition font-semibold">Cliente</a>
        <a href="{{ route('inicio.index') }}" class="px-5 py-2 rounded-full bg-red-600 hover:bg-red-700 transition font-semibold">Admin</a>
      </nav>
    </div>
  </header>

  <!-- Hero / Content -->
  <main class="flex-1">
    @hasSection('hero')
      @yield('hero')
    @else
      <section class="flex items-center justify-center text-center px-6 py-24">
        <div class="max-w-3xl">
          <img src="{{ asset('imagenes/logo1.png') }}" class="mx-auto w-40 mb-6" alt="Logo RallyCars" />
          <h1 class="text-4xl md:text-5xl font-bold mb-4">Bienvenido a <span class="text-red-500">RallyCars</span></h1>
          <p class="text-lg text-gray-200 mb-8">Taller automotriz profesional especializado en diagnóstico, mantenimiento y reparación integral.</p>
          <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a href="#servicios" class="px-8 py-3 rounded-full bg-blue-600 hover:bg-blue-700 transition font-semibold">Nuestros Servicios</a>
            <a href="https://wa.me/573002001000" target="_blank" class="px-8 py-3 rounded-full bg-green-600 hover:bg-green-700 transition font-semibold">
              <i class="fa-brands fa-whatsapp mr-2"></i> Contáctanos
            </a>
          </div>
        </div>
      </section>
    @endif

    @yield('contenido')

    <!-- Servicios -->
    <section id="servicios" class="bg-white text-gray-800 py-20">
      <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-3xl font-bold text-center mb-12">Nuestros Servicios</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
          <div class="bg-gray-50 rounded-2xl shadow-md p-6 text-center hover:shadow-xl transition">
            <i class="fa-solid fa-magnifying-glass-chart text-4xl text-blue-600 mb-4"></i>
            <h3 class="font-semibold text-lg mb-2">Diagnóstico Avanzado</h3>
            <p class="text-sm text-gray-600">Escáner profesional para detección precisa de fallas electrónicas.</p>
          </div>

          <div class="bg-gray-50 rounded-2xl shadow-md p-6 text-center hover:shadow-xl transition">
            <i class="fa-solid fa-oil-can text-4xl text-blue-600 mb-4"></i>
            <h3 class="font-semibold text-lg mb-2">Mantenimiento Preventivo</h3>
            <p class="text-sm text-gray-600">Cambios de aceite, filtros y revisión general especializada.</p>
          </div>

          <div class="bg-gray-50 rounded-2xl shadow-md p-6 text-center hover:shadow-xl transition">
            <i class="fa-solid fa-car-side text-4xl text-blue-600 mb-4"></i>
            <h3 class="font-semibold text-lg mb-2">Alineación y Balanceo</h3>
            <p class="text-sm text-gray-600">Conducción estable y segura con equipos modernos.</p>
          </div>

          <div class="bg-gray-50 rounded-2xl shadow-md p-6 text-center hover:shadow-xl transition">
            <i class="fa-solid fa-bolt text-4xl text-blue-600 mb-4"></i>
            <h3 class="font-semibold text-lg mb-2">Servicio Mecánico</h3>
            <p class="text-sm text-gray-600">Reparación eléctrica, frenos, suspensión y motor.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <!-- Footer -->
  <footer class="bg-black text-gray-300">
    <div class="max-w-7xl mx-auto px-6 py-10 text-center">
      <img src="{{ asset('imagenes/logo1.png') }}" class="mx-auto w-16 mb-4" />
      <p class="text-sm">&copy; {{ date('Y') }} RallyCars. Todos los derechos reservados.</p>
      <p class="text-sm mb-4">Desarrollado por <strong class="text-white">Juan Pablo Ríos Ríos</strong></p>

      <div class="flex justify-center gap-6 text-xl">
        <a href="https://www.facebook.com" target="_blank" class="hover:text-blue-500"><i class="fab fa-facebook"></i></a>
        <a href="https://www.instagram.com" target="_blank" class="hover:text-pink-500"><i class="fab fa-instagram"></i></a>
        <a href="https://wa.me/573002001000" target="_blank" class="hover:text-green-500"><i class="fab fa-whatsapp"></i></a>
      </div>

      <p class="text-xs mt-4">Pereira, Risaralda · Colombia</p>
    </div>
  </footer>

</body>
</html>