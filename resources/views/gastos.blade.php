@extends('plantilla')

@section('titulo', 'Lista de Vehículos')

@section('contenido')

<div style="text-align: center;">
    <h2>Listado de gastos</h2>

    
    <br>
                <form method="GET" action="{{ route('gastos.index') }}">
            <input
                type="text"
                name="search"
                placeholder="Buscar Gasto..."
                value="{{ old('search', $search ?? '') }}"
            >
            <button type="submit">Buscar</button>
        </form>

     


    <a href="{{ route('gastos.create') }}" class="btn crear">
        <button class="btn_editar"> Registrar nuevo gasto</button>
    </a>
    <br>

    <br>
    <div style="overflow-x:auto;">
    <table class="tabla" style="width:100%; min-width:600px;">
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
            @foreach($gastos as $gasto)
            <tr>
                <td>{{ $gasto['id'] }}</td>
                <td>{{ $gasto['tipo'] }}</td>
                <td>{{ $gasto['descripcion'] }}</td>
                <td>{{ $gasto['precio'] }}</td>



                <td class="acciones">
                    <a href="{{ route('gastos.edit', $gasto['id']) }}" class="btn editar">
                        <button class="btn_editar">Editar</button>
                    </a>
                        <br>
                        <br>                    <form action="{{ route('gastos.destroy', $gasto['id']) }}" method="POST" style="display:inline;">
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
</div>
</div>
<br>
<br>
<a href="{{ route('dashboard') }}">
        <button class="logout-btn">Volver al Dashboard</button>
    </a>
@endsection