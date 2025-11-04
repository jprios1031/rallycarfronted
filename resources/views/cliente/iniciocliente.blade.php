@extends('plantillalogin')

@section('titulo')

@section('contenido')

<main>
    <div class="login-box">
        <h2>Iniciar Sesión</h2>

        <form method="POST" action="{{ route('iniciocliente.login') }}">
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

            <button type="submit">Ingresar</button>
        </form>
        <br>
        <a href="{{ route('registercliente.showForm') }}">
            <button style="background-color: #e84444ff;">Ir a Registarme</button>
        </a>
        <br>
        <br>

        <a href="{{ route('principal') }}">
            <button style="background-color: #e84444ff;">ir a Inicio</button>
        </a>

    </div>
</main>

@endsection