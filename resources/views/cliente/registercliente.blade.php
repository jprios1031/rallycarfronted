@extends('plantillalogin')
@section('contenido')

<main>
    <div class="formulario">
        <h2>Registro de Usuario</h2>
        <form action="{{ route('registercliente.store') }}" method="POST">
    @csrf
    <label>Nombre:</label>
    <input type="text" name="name" required>

    <label>Email:</label>
    <input type="email" name="email" required>

    <label>Contraseña:</label>
    <input type="password" name="password" required>
     <label>Confirmar Contraseña:</label>
    <input type="password" name="password_confirmation" required><br><br>

    <button type="submit" class="btn_editar">Registrarse</button>
</form>

        <br>
        <a href="{{ route('iniciocliente.index') }}">
            <button class="logout-btn";>Ir aLogin</button>
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