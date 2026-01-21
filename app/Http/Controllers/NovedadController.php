<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class NovedadController extends Controller
{

    public function index(request $request)
    {
        $token = Session::get('token');
        $search = $request->input('search'); // obtiene parámetro search del query string

    // Prepara la query para la API, incluye search si viene
    $queryParams = [];

    if ($search) {
        $queryParams['search'] = $search;
    }
        $novedadesResponse = Http::withToken($token)->get('https://rallycarbacken-production.up.railway.app/api/novedades', $queryParams);
        $novedades = $novedadesResponse->successful() ? $novedadesResponse->json() : [];

        $usuariosResponse = Http::withToken($token)->get('https://rallycarbacken-production.up.railway.app/api/users');
        $usuarios = $usuariosResponse->successful() ? $usuariosResponse->json() : [];

        return view('novedad', compact('novedades', 'usuarios'));
    }


    public function create()
    {
        $token = Session::get('token');

        $vehiculosResponse = Http::withToken($token)->get('https://rallycarbacken-production.up.railway.app/api/vehiculos');
        $novedadesResponse = Http::withToken($token)->get('https://rallycarbacken-production.up.railway.app/api/novedades');

        $novedades = $novedadesResponse->successful() ? $novedadesResponse->json() : [];
        $vehiculos = $vehiculosResponse->successful() ? $vehiculosResponse->json() : [];

        return view('crearnovedad', compact('novedades','vehiculos'));
    }


public function store(Request $request)
{
    $token = Session::get('token');

    $request->validate([
        'titulo' => 'required|string|max:255',
        'descripcion' => 'required|string|max:1000',
        'vehiculo_id' => 'required|integer',
        'imagenes.*' => 'nullable|image|mimes:jpg,jpeg,png|max:10240', // Cada imagen no debe superar los 10MB
    ]);

    $httpRequest = Http::withToken($token);

    // Adjuntar las imágenes al request multipart
    if ($request->hasFile('imagenes')) {
        foreach ($request->file('imagenes') as $index => $file) {
            $httpRequest = $httpRequest->attach(
                "imagenes[$index]", // nombre del campo con índice, igual que en formulario
                file_get_contents($file->getRealPath()),
                $file->getClientOriginalName()
            );
        }
    }

    // Enviar el resto de datos como campos normales
    $response = $httpRequest->post('https://rallycarbacken-production.up.railway.app/api/novedades', [
        'titulo' => $request->titulo,
        'descripcion' => $request->descripcion,
        'vehiculo_id' => $request->vehiculo_id,
    ]);

    if ($response->successful()) {
        return redirect()->route('novedad.index')->with('success', 'Novedad creada exitosamente.');
    }

    return back()->with('error', 'Error al registrar la novedad: ' . $response->body());
}



    public function edit($id)
    {
        $token = Session::get('token');

        $responseNovedad = Http::withToken($token)->get("https://rallycarbacken-production.up.railway.app/api/novedades/{$id}");
        $novedad = $responseNovedad->successful() ? $responseNovedad->json() : null;

        $responseVehiculos = Http::withToken($token)->get('https://rallycarbacken-production.up.railway.app/api/vehiculos');
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

        $response = Http::withToken($token)->put(
            "https://rallycarbacken-production.up.railway.app/api/novedades/{$id}",
            $data
        );

        if ($response->successful()) {
            return redirect()->route('novedad.index')->with('success', 'Novedad actualizada correctamente.');
        }

        return back()->with('error', 'Error al actualizar la novedad: ' . $response->body());
    }



    public function destroy($id)
    {
        $token = Session::get('token');

        $response = Http::withToken($token)->delete(
            "https://rallycarbacken-production.up.railway.app/api/novedades/{$id}"
        );

        if ($response->successful()) {
            return redirect()->route('novedad.index')->with('success', 'Novedad eliminada correctamente');
        }

        return back()->with('error', 'No se pudo eliminar la novedad');
    }
}
