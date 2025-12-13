<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class GastoController extends Controller
{
    public function index(Request $request)
{
    $token = Session::get('token');
    $search = $request->input('search');
    $queryParams = [];

    if ($search) {
        $queryParams['search'] = $search;
    }

    $gastosResponse = Http::withToken($token)->get('http://127.0.0.1:8000/api/gastos', $queryParams);
    $gastos = $gastosResponse->successful() ? $gastosResponse->json() : [];

    return view('gastos', compact('gastos', 'search'));
}

    public function create()
    {
        return view('creargasto');
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
        $response = Http::withToken($token)->post('http://127.0.0.1:8000/api/gastos', $data);

        if ($response->successful()) {
            return redirect()->route('gastos.index')->with('success', 'gasto creado exitosamente.');
        }

        return back()->with('error', 'Error al registrar el gasto');
    }
    public function edit($id)
    {
        $token = Session::get('token');

        $response = Http::withToken($token)->get("http://127.0.0.1:8000/api/gastos/{$id}");
        
        if ($response->successful()) {
            $gastos = $response->json();
            
            return view('editargasto', compact('gastos'));
        }

        return redirect()->route('gastos.index')->with('error', 'No se pudo obtener el gasto.');

    }
    public function update(Request $request, $id)
    { 
        $token = Session::get('token');

        $data = $request->only(['tipo', 'descripcion', 'precio']);

        $response = Http::withToken($token)->put("http://127.0.0.1:8000/api/gastos/{$id}", $data);

        if ($response->successful()) {
            return redirect()->route('gastos.index')->with('success', 'gasto actualizado correctamente');
        }

        return back()->with('error', 'No se pudo actualizar el gasto.');
    }
    public function destroy($id)
    {
        $token = Session::get('token');

        $response =Http::withToken($token)->delete("http://127.0.0.1:8000/api/gastos/{$id}");

        if ($response->successful()) {
            return redirect()->route('gastos.index')->with('success', 'gasto eliminado correctamente');
        }

        return back()->with('error', 'No se pudo eliminar el gasto.');
    }
}