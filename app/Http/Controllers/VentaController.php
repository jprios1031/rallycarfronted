<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class VentaController extends Controller
{
public function index(Request $request)
{
    $token = Session::get('token');
    $search = $request->input('search');
    $queryParams = [];

    if ($search) {
        $queryParams['search'] = $search;
    }
    $ventasResponse = Http::withToken($token)->get('http://127.0.0.1:8000/api/ventas', $queryParams);
    $ventas = $ventasResponse->successful() ? $ventasResponse->json() : [];

    return view('ventas', compact('ventas', 'search')); // pasar $search a la vista
}


  public function create()
    {
        $token = Session::get('token');
        $ventasResponse = Http::withToken($token)->get('http://127.0.0.1:8000/api/ventas');
        $ventas = $ventasResponse->successful() ? $ventasResponse->json() : [];

        return view('crearventas', compact('ventas'));
    }

     public function store(Request $request)
    {
                $token = Session::get('token');

        $request->validate([
              'tipo' => 'required|string',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric|min:0',
        ]);

      $data = [
    'tipo' => $request->tipo,
    'descripcion' => $request->descripcion,
    'precio' => $request->precio,
    
];

        $response = Http::withToken($token)->post('http://127.0.0.1:8000/api/ventas', $data);

        if ($response->successful()) {
            return redirect()->route('ventas.index')->with('success', 'venta creada exitosamente.');
        }

        return back()->with('error', 'Error al registrar la venta');
    }

    public function edit($id)
    {
                $token = Session::get('token');

        $response = Http::withToken($token)->get("http://127.0.0.1:8000/api/ventas/{$id}");

        if ($response->successful()) {
            $ventas = $response->json();
            
            return view('editarventas', compact('ventas'));
        }

        return redirect()->route('ventas.index')->with('error', 'No se pudo obtener la venta.');
    }


    public function update(Request $request, $id)
    {
                $token = Session::get('token');

        $data = $request->only(['tipo', 'descripcion', 'precio']);

        $response = Http::withToken($token)->put("http://127.0.0.1:8000/api/ventas/{$id}", $data);

        if ($response->successful()) {
            return redirect()->route('ventas.index')->with('success', 'venta actualizada correctamente');
        }

        return back()->with('error', 'No se pudo actualizar la venta.');
    }

    public function destroy($id)
    {
                $token = Session::get('token');

        $response =Http::withToken($token)->delete("http://127.0.0.1:8000/api/ventas/{$id}");

        if ($response->successful()) {
            return redirect()->route('ventas.index')->with('success', 'venta eliminada correctamente');
        }

        return back()->with('error', 'No se pudo eliminar la venta.');
    }
 

}



