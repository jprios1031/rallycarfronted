<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Carbon\Carbon;
class DashboardController extends Controller
{

    public function index(Request $request) 
    {

        
        $token = Session::get('token');
        

          $fechaInicio = $request->input('fecha_inicio');
        $fechaFin = $request->input('fecha_fin');



     $responseVehiculos = Http::withToken($token)->get('http://127.0.0.1:8000/api/vehiculos');
     $vehiculos = $responseVehiculos->successful() ? $responseVehiculos->json() : [];


    $responseNovedades = Http::withToken($token)->get('http://127.0.0.1:8000/api/novedades');
    $novedades = $responseNovedades->successful() ? $responseNovedades->json() : [];

    $responseusers = Http::withToken($token)->get('http://127.0.0.1:8000/api/users');
    $Users = $responseusers->successful() ? $responseusers->json() : [];

    
    $responseventas =Http::withToken($token)->get('http://127.0.0.1:8000/api/ventas');
    $ventas = $responseventas->successful() ? $responseventas->json() : [];  
    
    $responsegastos =Http::withToken($token)->get('http://127.0.0.1:8000/api/gastos');
    $gastos = $responsegastos->successful() ? $responsegastos->json() : [];  

        if ($fechaInicio && $fechaFin) {
            $ventas = collect($ventas)->filter(function ($venta) use ($fechaInicio, $fechaFin) {
                return isset($venta['created_at']) &&
                       $venta['created_at'] >= $fechaInicio &&
                       $venta['updated_at'] <= $fechaFin;
            })->values()->all();

            $gastos = collect($gastos)->filter(function ($gasto) use ($fechaInicio, $fechaFin) {
                return isset($gasto['created_at']) &&
                       $gasto['created_at'] >= $fechaInicio &&
                       $gasto['updated_at'] <= $fechaFin;
            })->values()->all();
        }

        $totalVehiculo = count($vehiculos);
        $sumaVehiculo = collect($vehiculos)->sum('cantidad');
        $totalnovedades = count($novedades);
        $totalusuarios = count($Users);
        $totalventas = count($ventas);
        $totalgastos = count($gastos);


        $totalPrecioVentas = collect($ventas)->sum('precio');
        $totalPreciogastos = collect($gastos)->sum('precio');

          $ganancia = $totalPrecioVentas - $totalPreciogastos;

        return view('dashboard', compact('vehiculos', 'totalVehiculo', 'sumaVehiculo', 'totalnovedades','totalusuarios','totalventas','totalPrecioVentas','gastos','totalPreciogastos','totalgastos','ganancia'));

       
    }
}
