@extends('plantilla')

@section('titulo', 'Lista de Vehículos')

@section('contenido')

<div class="container">
    <h2>Listado de Ventas</h2>

    <a href="{{ route('ventas.create') }}" class="btn crear">
        <button>➕ Registrar nueva venta</button>
    </a>

    <table class="tabla">
        <thead>
            <tr>
                <th>Id</th>
                <th>tipo</th>
                <th>descripcion</th>
                <th>precio</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach($ventas as $venta)
            <tr>
                <td>{{ $venta['id'] }}</td>
                <td>{{ $venta['tipo'] }}</td>
                <td>{{ $venta['descripcion'] }}</td>
                <td>{{ $venta['precio'] }}</td>



                <td class="acciones">
                    <a href="{{ route('ventas.edit', $venta['id']) }}" class="btn editar">
                        <button>Editar</button>
                    </a>

                    <form action="{{ route('ventas.destroy', $venta['id']) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn eliminar" onclick="return confirm('¿Deseas eliminar este vehículo?')">
                            Eliminar
                        </button>
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