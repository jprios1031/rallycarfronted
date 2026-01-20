@extends('plantillalogin')

@section('titulo', 'Registro')

@section('contenido')

<h2 class="text-2xl font-bold text-center mb-2">
    Registro de Usuario
</h2>

<div class="w-24 h-1 mx-auto mb-6 bg-gradient-to-r from-blue-700 to-red-600 rounded-full"></div>

<form action="{{ route('register.store') }}" method="POST" class="space-y-5">
    @csrf

    {{-- Errores --}}
    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg text-sm">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Nombre --}}
    <div>
        <label class="block text-sm font-semibold mb-1">Nombre completo</label>
        <input
            type="text"
            name="name"
            required
            class="w-full px-4 py-2 border border-gray-300 rounded-lg
                   focus:outline-none focus:ring-2 focus:ring-blue-600">
    </div>

    {{-- Correo --}}
    <div>
        <label class="block text-sm font-semibold mb-1">Correo electrónico</label>
        <input
            type="email"
            name="email"
            required
            class="w-full px-4 py-2 border border-gray-300 rounded-lg
                   focus:outline-none focus:ring-2 focus:ring-blue-600">
    </div>

    {{-- Contraseña --}}
    <div>
        <label class="block text-sm font-semibold mb-1">Contraseña</label>
        <input
            type="password"
            name="password"
            required
            class="w-full px-4 py-2 border border-gray-300 rounded-lg
                   focus:outline-none focus:ring-2 focus:ring-blue-600">
    </div>

    {{-- Confirmar contraseña --}}
    <div>
        <label class="block text-sm font-semibold mb-1">Confirmar contraseña</label>
        <input
            type="password"
            name="password_confirmation"
            required
            class="w-full px-4 py-2 border border-gray-300 rounded-lg
                   focus:outline-none focus:ring-2 focus:ring-blue-600">
    </div>

    {{-- Botón registrar --}}
    <button
        type="submit"
        class="w-full py-3 rounded-full font-semibold text-white
               bg-gradient-to-r from-blue-800 to-red-600
               hover:from-blue-900 hover:to-red-700
               transition transform hover:scale-105 shadow-lg">
        <i class="fas fa-user-check mr-2"></i> Registrar
    </button>
</form>

{{-- Separador --}}
<div class="my-6 border-t"></div>

{{-- Volver a login --}}
<a href="{{ route('inicio.index') }}"
   class="block text-center w-full py-2 rounded-full font-semibold text-white
          bg-gray-700 hover:bg-gray-800 transition">
    <i class="fas fa-arrow-left mr-2"></i> Volver a Login
</a>

@endsection
