@extends('plantilla')

@section('titulo', 'Lista de Usuarios')

@section('contenido')
<div class="container">
    <h2>Listado de Usuarios</h2>
    <a href="{{ route('usuario.create') }}" style="background-color: #3b44c1";>
        <button>➕ Registrar nuevo Usuario</button>
    </a>

    <table class="tabla">
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
                    <a href="{{ route('usuario.edit', $usuario['id']) }}" class="btn editar">
                        <button>Editar</button>
                    </a>
                    <form action="{{ route('usuario.destroy', $usuario['id']) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn eliminar" onclick="return confirm('¿Deseas eliminar este Usuario?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('dashboard') }}">
        <button style="background-color: #e84444ff; margin-top: 10px;">Volver al Dashboard</button>
    </a>
</div>
@endsection
