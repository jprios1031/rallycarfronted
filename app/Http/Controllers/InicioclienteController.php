<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class InicioclienteController extends Controller
{
    public function index()
    {
        return view('cliente.iniciocliente');
    }

public function login(Request $request)
{
  

    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $response = Http::post('https://rallycarbacken-production.up.railway.app
/api/login', [
        'email' => $request->email,
        'password' => $request->password,
    ]);

    if ($response->successful()) {
        $data = $response->json();

        // Guardar en sesión antes de redirigir
        session([
            'user' => $data['user'],
            'token' => $data['token'],
        ]);

      
        session()->save();
\Log::info('Sesión actual antes de redirigir', session()->all());


      return redirect()->route('dashboardcliente');
    }

    $errorMessage = $response->json()['message'] ?? 'Credenciales incorrectas';
    return back()->withErrors(['credentials' => $errorMessage])->withInput();
}



    public function logout()
    {
        session()->flush(); 
        return redirect()->route('iniciocliente.index');
    }
}
