@extends('plantillalogin')
@section('contenido')

<main>
    <div class="login-box">
        <h2>Registro de Usuario</h2>
         <form action="{{ route('register.store') }}" method="POST">
            @csrf

            <label>Nombre:</label>
            <input type="text" name="name" required><br><br>

            <label>Correo:</label>
            <input type="email" name="email" required><br><br>

            <label>Contraseña:</label>
            <input type="password" name="password" required><br><br>

            <label>Confirmar Contraseña:</label>
            <input type="password" name="password_confirmation" required><br><br>

           

            <button type="submit">Registrar</button>
        </form>
        <br>
        <a href="{{ route('inicio.index') }}">
            <button style="background-color: #e84444ff" ;>Ir aLogin</button>
        </a>


        @if ($errors->any())
        <div class="errors">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
</main>

@endsection