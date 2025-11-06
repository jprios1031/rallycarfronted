@extends('plantillalogin')

@section('titulo')

@section('contenido')

<main>
    <div class="login-box">
        <h2>Iniciar Sesión</h2>

        <form method="POST" action="{{ route('inicio.login') }}">
            @csrf

            @if($errors->any())
            <div class="errors">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <label>Email:</label>
            <input type="email" name="email" required><br><br>

            <label>Contraseña:</label>
            <input type="password" name="password" required><br><br>

            <button type="submit" class="btn_editar">Ingresar</button>
        </form>
        <br>
        <a href="{{ route('register.showForm') }}">
            <button class="btn_eliminar">Ir a Registarme</button>
        </a>
        <br>
        <br>
        <br>
        <a href="{{ route('principal') }}">
            <button class="logout-btn">ir a Inicio</button>
        </a>

    </div>
</main>

@endsection