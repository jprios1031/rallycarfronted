<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{

    public function index() 
    {
        $token = Session::get('token');
     $responseVehiculos = Http::withToken($token)->get('http://127.0.0.1:8000/api/vehiculos');
     $vehiculos = $responseVehiculos->successful() ? $responseVehiculos->json() : [];


    $responseNovedades = Http::withToken($token)->get('http://127.0.0.1:8000/api/novedades');
    $novedades = $responseNovedades->successful() ? $responseNovedades->json() : [];

    $responseusers = Http::withToken($token)->get('http://127.0.0.1:8000/api/users');
    $Users = $responseusers->successful() ? $responseusers->json() : [];

    
    $responseventas =Http::withToken($token)->get('http://127.0.0.1:8000/api/ventas');
    $ventas = $responseventas->successful() ? $responseventas->json() : [];  
    



        $totalVehiculo = count($vehiculos);
        $sumaVehiculo = collect($vehiculos)->sum('cantidad');
        $totalnovedades = count($novedades);
        $totalusuarios = count($Users);
        $totalventas = count($ventas);

        $totalPrecioVentas = collect($ventas)->sum('precio');

        return view('dashboard', compact('vehiculos', 'totalVehiculo', 'sumaVehiculo', 'totalnovedades','totalusuarios','totalventas','totalPrecioVentas'));

       
    }
}
