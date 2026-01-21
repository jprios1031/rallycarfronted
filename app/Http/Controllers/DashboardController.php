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

        //enviamos la peticion a la api para obtener los vehiculos
        $responseVehiculos = Http::withToken($token)->get('https://rallycarbacken-production.up.railway.app
/api/vehiculos');
        $vehiculos = $responseVehiculos->successful() ? $responseVehiculos->json() : [];

        //enviamos la peticion a la api para obtener las novedades
        $responseNovedades = Http::withToken($token)->get('https://rallycarbacken-production.up.railway.app
/api/novedades');
        $novedades = $responseNovedades->successful() ? $responseNovedades->json() : [];
        //enviamos la peticion a la api para obtener los usuarios
        $responseusers = Http::withToken($token)->get('https://rallycarbacken-production.up.railway.app
/api/users');
        $Users = $responseusers->successful() ? $responseusers->json() : [];
        //enviamos la peticion a la api para obtener las ventas
        $responseventas = Http::withToken($token)->get('https://rallycarbacken-production.up.railway.app
/api/ventas');
        $ventas = $responseventas->successful() ? $responseventas->json() : [];
        //enviamos la peticion a la api para obtener los gastos
        $responsegastos = Http::withToken($token)->get('https://rallycarbacken-production.up.railway.app
/api/gastos');
        $gastos = $responsegastos->successful() ? $responsegastos->json() : [];

        if ($fechaInicio && $fechaFin) {

            $inicio = Carbon::parse($fechaInicio, 'America/Bogota')->startOfDay();
            $fin = Carbon::parse($fechaFin, 'America/Bogota')->endOfDay();

            $ventas = collect($ventas)->filter(function ($venta) use ($inicio, $fin) {
                return isset($venta['created_at']) &&
                    Carbon::parse($venta['created_at'])->between($inicio, $fin);
            })->values()->all();

            $gastos = collect($gastos)->filter(function ($gasto) use ($inicio, $fin) {
                return isset($gasto['created_at']) &&
                    Carbon::parse($gasto['created_at'])->between($inicio, $fin);
            })->values()->all();


            $vehiculos = collect($vehiculos)->filter(function ($vehiculo) use ($inicio, $fin) {
                return isset($vehiculo['created_at']) &&
                    Carbon::parse($vehiculo['created_at'])->between($inicio, $fin);
            })->values()->all();


            $Users = collect($Users)->filter(function ($user) use ($inicio, $fin) {
                return isset($user['created_at']) &&
                    Carbon::parse($user['created_at'])->between($inicio, $fin);
            })->values()->all();

            $novedades = collect($novedades)->filter(function ($novedad) use ($inicio, $fin) {
                return isset($novedad['created_at']) &&
                    Carbon::parse($novedad['created_at'])->between($inicio, $fin);
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

        return view('dashboard', compact('vehiculos', 'totalVehiculo', 'sumaVehiculo', 'totalnovedades', 'totalusuarios', 'totalventas', 'totalPrecioVentas', 'gastos', 'totalPreciogastos', 'totalgastos', 'ganancia'));
    }
}
