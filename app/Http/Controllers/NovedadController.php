<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Pagination\LengthAwarePaginator;

class NovedadController extends Controller
{

public function index(Request $request)
{
    $token = Session::get('token');

    // Parámetros de búsqueda y paginación
    $queryParams = [
        'page' => $request->get('page', 1),
    ];

    if ($request->filled('search')) {
        $queryParams['search'] = $request->search;
    }

    // Llamada a la API (GET)
    $response = Http::withToken($token)->get(
        'https://rallycarbacken-production.up.railway.app/api/novedades',
        $queryParams
    );

    if (!$response->successful()) {
        return view('novedad', [
            'novedades' => collect(),
            'usuarios' => [],
        ]);
    }

    $apiData = $response->json();

    // Reconstruir paginador Laravel
    $novedades = new LengthAwarePaginator(
        $apiData['data'],
        $apiData['total'],
        $apiData['per_page'],
        $apiData['current_page'],
        [
            'path' => request()->url(),
            'query' => request()->query(),
        ]
    );

    // Usuarios
    $usuariosResponse = Http::withToken($token)->get(
        'https://rallycarbacken-production.up.railway.app/api/users'
    );

    $usuarios = $usuariosResponse->successful()
        ? $usuariosResponse->json()
        : [];

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
        'imagenes.*' => 'nullable|image|mimes:jpg,jpeg,png|max:10240',
    ]);

    $http = Http::withToken($token)->asMultipart();

    // Campos de texto
    $http->attach('titulo', $request->titulo);
    $http->attach('descripcion', $request->descripcion);
    $http->attach('vehiculo_id', $request->vehiculo_id);

    // Archivos
    if ($request->hasFile('imagenes')) {
        foreach ($request->file('imagenes') as $index => $file) {
            $http->attach(
                "imagenes[$index]",
                fopen($file->getRealPath(), 'r'),
                $file->getClientOriginalName()
            );
        }
    }

    $response = $http->post(
        'https://rallycarbacken-production.up.railway.app/api/novedades'
    );



    return redirect()
        ->route('novedad.index')
        ->with('success', 'Novedad creada correctamente.');
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
