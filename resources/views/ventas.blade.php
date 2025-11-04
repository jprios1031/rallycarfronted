@extends('plantilla')

@section('titulo', 'Lista de Vehículos')

@section('contenido')

<div style="text-align: center;">
    <h2>Listado de Ventas</h2>

    <a href="{{ route('ventas.create') }}" class="btn crear">
        <button class="btn_editar"> Registrar nueva venta</button>
    </a>
    <br>

    <br>
    <table class="tabla">
        <thead>
            <tr>
                <th>Id</th>
                <th>Tipo</th>
                <th>Descripcion</th>
                <th>Precio</th>
                <th>Acciones</th>
                
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
                        <button class="btn_editar">Editar</button>
                    </a>

                    <form action="{{ route('ventas.destroy', $venta['id']) }}" method="POST" style="display:inline;">
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
    <a href="{{ route('dashboard') }}">
        <button class="logout-btn">Volver al Dashboard</button>
    </a>
</div>

@endsection