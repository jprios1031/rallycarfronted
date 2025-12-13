@extends('plantilla')

@section('titulo', 'Lista de Usuarios')

@section('contenido')
<div style="text-align: center;">
    <h2>Listado de Usuarios</h2>

    <br>
                <form method="GET" action="{{ route('usuario.index') }}">
            <input
                type="text"
                name="search"
                placeholder="Buscar Usuario..."
                value="{{ old('search', $search ?? '') }}"
            >
            <button type="submit">Buscar</button>
        </form>
    <br>


    <a href="{{ route('usuario.create') }}">
        <button class="btn_editar">Registrar nuevo Usuario</button>
    </a>
    <br>
    <br>
      <div style="overflow-x:auto;">
        <table class="tabla" style="width:100%; min-width:600px;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Vehículo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($usuarios as $usuario)
            <tr>
                <td>{{ $usuario['id'] }}</td>
                <td>{{ $usuario['name'] }}</td>
                <td>{{ $usuario['email'] }}</td>
                <td>
              @if(!empty($usuario['vehiculo']))
    ({{ $usuario['vehiculo']['placa'] }})

@else
    Sin vehículo
@endif

                </td>
                <td class="acciones">
                    <a href="{{ route('usuario.edit', $usuario['id']) }}" >
                        <button class="btn_editar">Editar</button>
                    </a>
                    <br>
                    <br>
                    <form action="{{ route('usuario.destroy', $usuario['id']) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn_eliminar" onclick="return confirm('¿Deseas eliminar este Usuario?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    </div>
    <br>
    <br>
    <a href="{{ route('dashboard') }}">
        <button class="logout-btn">Volver al Dashboard</button>
    </a>
</div>
@endsection
