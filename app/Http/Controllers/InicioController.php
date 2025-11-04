<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

class InicioController extends Controller
{
    public function index()
    {
        return view('inicio'); 
    }

   public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $response = Http::post('http://127.0.0.1:8000/api/login', [
        'email' => $request->email,
        'password' => $request->password,
    ]);

    if ($response->status() === 200) {
        $data = $response->json(); 

        // Guardar en sesión solo la parte del usuario y el token
        session(['user' => $data['user']]);
        session(['token' => $data['token']]); 

        return redirect()->route('dashboard');
    } else {
        $errorMessage = $response->json()['message'] ?? 'Credenciales incorrectas';
        return back()->withErrors(['credentials' => $errorMessage])->withInput();
    }
}

public function logout(Request $request)
{
    // Eliminar los datos de sesión del usuario
    $request->session()->flush();

    // Redirigir al login del admin
    return redirect()->route('inicio.index');
}
}
