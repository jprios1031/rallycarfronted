<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class NovedadController extends Controller
{

    public function index()
    {
        $token = Session::get('token');

        $novedadesResponse = Http::withToken($token)->get('http://127.0.0.1:8000/api/novedades');
        $novedades = $novedadesResponse->successful() ? $novedadesResponse->json() : [];

        $usuariosResponse = Http::withToken($token)->get('http://127.0.0.1:8000/api/users');
        $usuarios = $usuariosResponse->successful() ? $usuariosResponse->json() : [];

        return view('novedad', compact('novedades', 'usuarios'));
    }

    


    public function create()
    {
        
        $token = Session::get('token');
        $vehiculosResponse = Http::withToken($token)->get('http://127.0.0.1:8000/api/vehiculos');
        $vehiculos = $vehiculosResponse->successful() ? $vehiculosResponse->json() : [];
        return view('crearnovedad', compact('vehiculos'));
    }



public function store(Request $request)
{
    
     $token = Session::get('token');
    $request->validate([
        'titulo' => 'required|string|max:255',
        'descripcion' => 'required|string|max:1000',
        'vehiculo_id' => 'required|integer',
        'imagen' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $httpRequest = Http::asMultipart()->withToken($token);

$httpRequest->attach('titulo', $request->titulo);
$httpRequest->attach('descripcion', $request->descripcion);
$httpRequest->attach('vehiculo_id', $request->vehiculo_id);

  if ($request->hasFile('imagenes')) {
    foreach ($request->file('imagenes') as $file) {
        $httpRequest->attach(
            'imagenes[]',
            file_get_contents($file->getRealPath()),
            $file->getClientOriginalName()
        );
    }
}



    $response = $httpRequest->post('http://127.0.0.1:8000/api/novedades');

    if ($response->successful()) {
        return redirect()->route('novedad.index')->with('success', 'Novedad creada correctamente.');
    }

    return back()->with('error', 'Error al crear la novedad: ' . $response->body());
}


    public function edit($id)
    
    {
        $token = Session::get('token');
        $responseNovedad = Http::withToken($token)->get("http://127.0.0.1:8000/api/novedades/{$id}");
        $novedad = $responseNovedad->successful() ? $responseNovedad->json() : null;

        $responseVehiculos = Http::withToken($token)->get('http://127.0.0.1:8000/api/vehiculos');
        $vehiculos = $responseVehiculos->successful() ? $responseVehiculos->json() : [];

        return view('editarnovedad', compact('novedad', 'vehiculos'));
    }

    public function update(Request $request, $id)
    {
        
        $token = Session::get('token');
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string|max:1000',
            'vehiculo_id' => 'required|integer',
        ]);

        $data = [
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'vehiculo_id' => $request->vehiculo_id,
        ];

        $response = Http::withToken($token)->put("http://127.0.0.1:8000/api/novedades/{$id}", $data);

        if ($response->successful()) {
            return redirect()->route('novedad.index')->with('success', 'Novedad actualizada correctamente.');
        }

        return back()->with('error', 'Error al actualizar la novedad: ' . $response->body());
    }

    public function destroy($id)
    {
        
        $token = Session::get('token');
        $response = Http::withToken($token)->delete("http://127.0.0.1:8000/api/novedades/{$id}");

        if ($response->successful()) {
            return redirect()->route('novedad.index')->with('success', 'Novedad eliminada correctamente');
        }

        return back()->with('error', 'No se pudo eliminar la novedad');
    }
}
