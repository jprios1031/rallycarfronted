<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class VehiculoController extends Controller
{
   public function index(request $request)
{
    $token = Session::get('token');
    $search = $request->input('search');   
    $queryParams = [];
       if ($search){
        $queryParams = ['search' => $search];
    }
    
    $vehiculosResponse = Http::withToken($token)->get('https://rallycarbacken-production.up.railway.app
/api/vehiculos', $queryParams);
    $vehiculos = $vehiculosResponse->successful() ? $vehiculosResponse->json() : [];

    $usuariosResponse = Http::withToken($token)->get('https://rallycarbacken-production.up.railway.app
/api/users');
    $usuarios = $usuariosResponse->successful() ? $usuariosResponse->json() : [];

    return view('vehiculo', compact('vehiculos', 'usuarios'));
}


    public function create()
    {
        
        $token = Session::get('token');
        $usuariosResponse = Http::withToken($token)->get('https://rallycarbacken-production.up.railway.app
/api/users');
        $usuarios = $usuariosResponse->successful() ? $usuariosResponse->json() : [];

        return view('crearvehiculo', compact('usuarios'));
    }

    public function store(Request $request)
    {
        $token = Session::get('token');
        $request->validate([
            'marca' => 'required|string|max:255',
            'modelo' => 'required|string|max:255',
            'placa' => 'required|string|max:20',
            'user_id' => 'required|integer', 
        ]);

      $data = [
    'marca' => $request->marca,
    'modelo' => $request->modelo,
    'placa' => $request->placa,
    'user_id' => $request->user_id, 
];

        $response = Http::withToken($token)->post('https://rallycarbacken-production.up.railway.app
/api/vehiculos', $data);

        if ($response->successful()) {
            return redirect()->route('vehiculo.index')->with('success', 'Vehículo creado exitosamente.');
        }

       
        if ($response->status() === 422) {
            return back()->with('error', 'La placa ya está registrada.')->withInput();
        }

        return back()->with('error', 'Error al registrar vehículo en la API.');
    }

    public function edit($id)
    {
        $token = Session::get('token');
        $Vehiculoresponse = Http::withToken($token)->get("https://rallycarbacken-production.up.railway.app
/api/vehiculos/{$id}");
        $usuariosResponse = Http::withToken($token)->get('https://rallycarbacken-production.up.railway.app
/api/users');

        if ($Vehiculoresponse->successful() && $usuariosResponse->successful() ) {
            $vehiculo = $Vehiculoresponse->json();
            $usuarios = $usuariosResponse->json();

            return view('editarvehiculo', compact('vehiculo', 'usuarios'));
        }

        return redirect()->route('vehiculo.index')->with('error', 'No se pudo obtener el vehículo.');
    }

    public function update(Request $request, $id)
    {
        
        $token = Session::get('token');
        $data = $request->only(['placa', 'marca', 'modelo', 'user_id']);

        $response = Http::withToken($token)->put("https://rallycarbacken-production.up.railway.app
/api/vehiculos/{$id}", $data);

        if ($response->successful()) {
            return redirect()->route('vehiculo.index')->with('success', 'Vehículo actualizado correctamente');
        }

        return back()->with('error', 'No se pudo actualizar el vehículo.');
    }

    public function destroy($id)
    {
        
        $token = Session::get('token');
        $response = Http::withToken($token)->delete("https://rallycarbacken-production.up.railway.app
/api/vehiculos/{$id}");

        if ($response->successful()) {
            return redirect()->route('vehiculo.index')->with('success', 'Vehículo eliminado correctamente');
        }

        return back()->with('error', 'No se pudo eliminar el vehículo.');
    }
}
