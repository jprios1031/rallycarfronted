@extends('plantilla')

@section('titulo', 'Lista de Vehículos')

@section('contenido')

<div style="text-align: center;">
    <h2>Listado de Ventas</h2>

     <br>
                <form method="GET" action="{{ route('ventas.index') }}">
            <input
                type="text"
                name="search"
                placeholder="Buscar Ventas..."
                value="{{ old('search', $search ?? '') }}"
            >
            <button type="submit">Buscar</button>
        </form>
    <br>

    <a href="{{ route('ventas.create') }}" class="btn crear">
        <button class="btn_editar"> Registrar nueva venta</button>
    </a>
    <br><br>

    <div style="overflow-x:auto;">
        <table class="tabla" style="width:100%; min-width:600px;">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Tipo</th>
                    <th>Descripcion</th>
                    <th>Cantidad</th>
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
                    <td>{{ $venta['cantidad'] }}</td>
                    <td>{{ $venta['precio'] }}</td>
                    <td class="acciones">
                        <a href="{{ route('ventas.edit', $venta['id']) }}" class="btn editar">
                            <button class="btn_editar">Editar</button>
                        </a>
                            <br>
                            <br>
                        <form action="{{ route('ventas.destroy', $venta['id']) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn_eliminar" onclick="return confirm('¿Deseas eliminar este vehículo?')">
                                Eliminar
                            </button>
                        </form>
                        <br>
                        <br>
                        <a href="{{ route('ventas.pdf', $venta['id']) }}">


                            <button>Generar PDF</button>
                        </a>

                        <br>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <br>    
    <a href="{{ route('dashboard') }}">
        <button class="logout-btn">Volver al Dashboard</button>
    </a>
</div>

@endsection
