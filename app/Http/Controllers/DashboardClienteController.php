<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DashboardClienteController extends Controller
{
public function index()
{
    $token = session('token');
    $user = session('user'); // <- leer el mismo array guardado en login()

    if (!$user || !isset($user['id'])) {
        return redirect()->route('iniciocliente.index');
    }

    // Obtener novedades filtradas por vehículo
    $response = \Http::withToken($token)->get('https://rallycarbacken-production.up.railway.app/api/novedades');
    $novedades = $response->successful() ? $response->json() : [];

    $vehiculoId = $user['vehiculo']['id'] ?? null;
    $novedadesUsuario = array_filter($novedades, function ($novedad) use ($vehiculoId) {
        return isset($novedad['vehiculo']['id']) && $novedad['vehiculo']['id'] == $vehiculoId;
    });

    return view('cliente.dashboardcliente', [
        'usuario' => $user,
        'novedades' => $novedadesUsuario,
    ]);
}

}