<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RegisterController extends Controller
{
    public function showForm()
    {
        return view('register');
    }



    public function store(Request $request)
    
{
    $request->validate([
        'name' => 'required|string|max:100',
        'email' => 'required|email',
        'password' => 'required|min:6|confirmed',
    ]);

  $response = Http::post('https://rallycarbacken-production.up.railway.app
/api/register', [
    'name' => $request->name,
    'email' => $request->email,
    'password' => $request->password,
    'password_confirmation' => $request->password_confirmation,
]);


    if ($response->successful()) {
        return redirect()->route('inicio.index')->with('success', 'Usuario registrado correctamente');
    } else {
        return back()->with('error', 'Error al registrar usuario en la API');
    }
}

}

