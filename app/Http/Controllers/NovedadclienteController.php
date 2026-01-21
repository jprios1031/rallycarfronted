<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class NovedadclienteController extends Controller
{
    public function index()
    {
        $usuario = auth()->user();

        $response = Http::get('https://rallycarbacken-production.up.railway.app
/api/novedades');
        $novedades = $response->successful() ? $response->json() : [];

        $userId = $usuario->id;
        $novedadesUsuario = array_filter($novedades, function($novedad) use ($userId) {
            return isset($novedad['vehiculo']['user_id']) && $novedad['vehiculo']['user_id'] == $userId;
        });

        return view('cliente.dashboardcliente', [
            'usuario' => $usuario,
            'novedades' => array_values($novedadesUsuario)
        ]);
    }
}
