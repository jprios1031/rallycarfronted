<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RegisterclienteController extends Controller
{
    public function showForm()
    {
        return view('cliente.registercliente');
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:100',
        'email' => 'required|email',
        'password' => 'required|min:6|confirmed',
    ]);

    $response = Http::post('http://127.0.0.1:8000/api/register', [
        'name' => $request->name,
        'email' => $request->email,
        'password' => $request->password,
        'password_confirmation' => $request->password_confirmation,
        'role_id' => 2, 
    ]);

    if ($response->successful()) {
        return redirect()->route('iniciocliente.index')
            ->with('success', 'Usuario registrado correctamente con su vehículo');
    } else {
        return back()->with('error', 'Error al registrar usuario en la API');
    }
}

}
