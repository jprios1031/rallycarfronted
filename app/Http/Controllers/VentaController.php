<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class VentaController extends Controller
{
    public function index(Request $request)
    {
        $token = Session::get('token');
        $search = $request->input('search');

        $queryParams = [];
        if ($search) {
            $queryParams['search'] = $search;
        }

        $response = Http::withToken($token)
            ->get('https://rallycarbacken-production.up.railway.app/api/ventas', $queryParams);

        $ventas = $response->successful() ? $response->json() : [];

        return view('ventas', compact('ventas', 'search'));
    }

    public function create()
    {
        return view('crearventas');
    }

    public function store(Request $request)
    {
        $token = Session::get('token');

        $request->validate([
            'tipo' => 'required|string',
            'descripcion' => 'required|string',
            'cantidad' => 'required|integer',
            'precio' => 'required|numeric|min:0',
        ]);

        $data = $request->only([
            'tipo',
            'descripcion',
            'cantidad',
            'precio'
        ]);

        $response = Http::withToken($token)
        ->post('https://rallycarbacken-production.up.railway.app/api/ventas', $data);
        // dd($response->json());

         


        if ($response->successful()) {
            return redirect()
                ->route('ventas.index')
                ->with('success', 'Venta creada exitosamente.');
        }
        return back()->with('error', 'Error al registrar la venta');
    }

    public function edit($id)
    {
        $token = Session::get('token');

        $response = Http::withToken($token)
            ->get("hhttps://rallycarbacken-production.up.railway.app/api/ventas/{$id}");

        if ($response->successful()) {
            $ventas = $response->json();
            return view('editarventas', compact('ventas'));
        }

        return redirect()
            ->route('ventas.index')
            ->with('error', 'No se pudo obtener la venta.');
    }

    public function update(Request $request, $id)
    {
        $token = Session::get('token');

        $data = $request->only([
            'tipo',
            'descripcion',
            'cantidad',
            'precio'
        ]);

        $response = Http::withToken($token)
            ->put("https://rallycarbacken-production.up.railway.app/api/ventas/{$id}", $data);

        if ($response->successful()) {
            return redirect()
                ->route('ventas.index')
                ->with('success', 'Venta actualizada correctamente');
        }

        return back()->with('error', 'No se pudo actualizar la venta.');
    }

    public function destroy($id)
    {
        $token = Session::get('token');

        $response = Http::withToken($token)
            ->delete("https://rallycarbacken-production.up.railway.app/api/ventas/{$id}");

        if ($response->successful()) {
            return redirect()
                ->route('ventas.index')
                ->with('success', 'Venta eliminada correctamente');
        }

        return back()->with('error', 'No se pudo eliminar la venta.');
    }

    public function exportPdf($id)
    {
        $token = Session::get('token');

        $response = Http::withToken($token)
            ->post("https://rallycarbacken-production.up.railway.app/api/generar-pdf/{$id}");

        if (!$response->successful()) {
            return back()->with('error', 'No se pudo generar el PDF');
        }

        return response($response->body())
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'inline; filename="ventas.pdf"');
    }
}
