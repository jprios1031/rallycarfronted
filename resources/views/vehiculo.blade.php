@extends('plantilla')

@section('titulo', 'Lista de Vehículos')

@section('contenido')
<div style="text-align: center;">
    <h2>Listado de Vehículos</h2>

    <br>
                <form method="GET" action="{{ route('vehiculo.index') }}">
            <input
                type="text"
                name="search"
                placeholder="Buscar Vehiculo..."
                value="{{ old('search', $search ?? '') }}"
            >
            <button type="submit">Buscar</button>
        </form>
    <br>

    <a href="{{ route('vehiculo.create') }}" class="btn crear">
        <button class="btn_editar">➕ Registrar nuevo vehículo</button>
    </a>
<br> 
<br>
<div style="overflow-x:auto;">
    <table class="tabla" style="width:100%; min-width:600px;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Placa</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Usuario</th> {{-- 👈 Nueva columna --}}
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vehiculos as $vehiculo)
            <tr>
                <td>{{ $vehiculo['id'] }}</td>
                <td>{{ $vehiculo['placa'] }}</td>
                <td>{{ $vehiculo['marca'] }}</td>
                <td>{{ $vehiculo['modelo'] }}</td>

                {{-- Mostrar nombre del usuario asociado --}}
                <td>
    @if(!empty($vehiculo['user']))
        {{ $vehiculo['user']['name'] }} <br>
        <small>{{ $vehiculo['user']['email'] }}</small>
    @else
        <em>Sin asignar</em>
    @endif
</td>


                <td class="acciones">
                    <a href="{{ route('vehiculo.edit', $vehiculo['id']) }}" class="btn editar">
                        <button class="btn_editar">Editar</button>
                    </a>
                        <br>
                        <br>
                    <form action="{{ route('vehiculo.destroy', $vehiculo['id']) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn_eliminar" onclick="return confirm('¿Deseas eliminar este vehículo?')">
                            Eliminar
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    <br>
    </div>
    <a href="{{ route('dashboard') }}">
        <button class="logout-btn">Volver al Dashboard</button>
    </a>
</div>
@endsection
