@extends('plantillalogin')

@section('titulo', 'Ingreso Cliente')

@section('contenido')

<h2 class="text-2xl font-bold text-center mb-2">
    Iniciar Sesión Cliente
</h2>

<div class="w-24 h-1 mx-auto mb-6 bg-gradient-to-r from-blue-700 to-red-600 rounded-full"></div>

<form method="POST" action="{{ route('iniciocliente.login') }}" class="space-y-5">
    @csrf

    {{-- Errores --}}
    @if($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg text-sm">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Email --}}
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

    {{-- Botón ingresar --}}
    <button
        type="submit"
        class="w-full py-3 rounded-full font-semibold text-white
               bg-gradient-to-r from-blue-800 to-red-600
               hover:from-blue-900 hover:to-red-700
               transition transform hover:scale-105 shadow-lg">
        <i class="fas fa-sign-in-alt mr-2"></i> Ingresar
    </button>
</form>

{{-- Separador --}}
<div class="my-6 border-t"></div>

{{-- Acciones --}}
<div class="flex flex-col gap-3 text-center">
    <a href="{{ route('registercliente.showForm') }}"
       class="w-full py-2 rounded-full font-semibold text-white
              bg-blue-600 hover:bg-blue-700 transition">
        <i class="fas fa-user-plus mr-2"></i> Registrarme
    </a>

    <a href="{{ route('principal') }}"
       class="w-full py-2 rounded-full font-semibold text-white
              bg-gray-700 hover:bg-gray-800 transition">
        <i class="fas fa-home mr-2"></i> Volver al inicio
    </a>
</div>

@endsection
