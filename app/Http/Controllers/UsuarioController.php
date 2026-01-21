<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class UsuarioController extends Controller
{
   public function index(request $request)
{
    $token = Session::get('token');
    $search = $request->input('search'); // obtiene parámetro search del query string
    $queryParams = [];
    if ($search){
        $queryParams = ['search' => $search];
    }

    $responseUsuarios = Http::withToken($token)->get('https://rallycarbacken-production.up.railway.app
/api/users' , $queryParams );
    $responseVehiculos = Http::withToken($token)->get('https://rallycarbacken-production.up.railway.app
/api/vehiculos');

    $usuarios = $responseUsuarios->successful() ? $responseUsuarios->json() : [];
    $vehiculos = $responseVehiculos->successful() ? $responseVehiculos->json() : [];
    

    return view('usuarios', compact('usuarios', 'vehiculos'));

    }

public function create()
{

    try {
    
     $token = Session::get('token');
    $responseVehiculos = Http::withToken($token)->get('https://rallycarbacken-production.up.railway.app
/api/vehiculos');
    $vehiculos = $responseVehiculos->successful() ? $responseVehiculos->json() : [];

    $responseRoles = Http::withToken($token)->get('https://rallycarbacken-production.up.railway.app
/api/roles');
    $roles = $responseRoles->successful() ? $responseRoles->json() : [];
      
    return view('crearusuario', compact('vehiculos', 'roles'));
    } catch (\Exception $e) {
        return back()->with('error', 'Error al cargar el formulario: ' . $e->getMessage());
    }
}


 public function store(Request $request)
{
     $token = Session::get('token');
    // Validar datos básicos )
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'password' => 'required|string|min:6|confirmed',
        'vehiculo_id' => 'nullable|integer',
        'role_id' => 'nullable|integer',
    ]);
    // Enviar los datos al endpoint de la API
    $response = Http::withToken($token)->post('https://rallycarbacken-production.up.railway.app
api/users', [
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'password' => $request->input('password'),
        'vehiculo_id' => $request->input('vehiculo_id'),
        'role_id' => $request->input('role_id'),
    ]);

    // Verificar la respuesta de la API
    if ($response->successful()) {
        return redirect()
            ->route('usuario.index')
            ->with('success', 'Usuario creado correctamente');
    }

    else {

    // Si hay error, mostrar el cuerpo de la respuesta
    return back()->with('error', 'Error al crear el usuario: ' . $response->body());
    

    }
}

   public function edit($id)
{
     $token = Session::get('token');
    
    $responseUsuario = Http::withToken($token)->get("https://rallycarbacken-production.up.railway.app
/api/users/{$id}");
    $usuario = $responseUsuario->successful() ? $responseUsuario->json() : null;

    $responseVehiculos = Http::withToken($token)->get('https://rallycarbacken-production.up.railway.app
/api/vehiculos');
    $vehiculos = $responseVehiculos->successful() ? $responseVehiculos->json() : [];

    $responseroles = Http::withToken($token)->get('https://rallycarbacken-production.up.railway.app
/api/roles');
        $roles = $responseroles->successful() ? $responseroles->json() : [];

    return view('editarusuario', compact('usuario', 'vehiculos', 'roles'));
}

  public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'vehiculo_id' => 'nullable|integer',
        'role_id' => 'nullable|integer',
    ]);

    $data = [
        'name' => $request->name,
        'email' => $request->email,
        'vehiculo_id' => $request->vehiculo_id,
        'role_id' => $request->role_id, 
    ];
 $token = Session::get('token');
    $response = Http::withToken($token)->put("https://rallycarbacken-production.up.railway.app
/api/users/{$id}", $data);
    if ($response->successful()) {
        return redirect()->route('usuario.index')->with('success', 'Usuario y vehículo actualizados correctamente.');
    }

    return back()->with('error', 'No se pudo actualizar el usuario: ' . $response->body());
}


    public function destroy($id)
    {
         $token = Session::get('token');
        $response = Http::withToken($token)->delete("https://rallycarbacken-production.up.railway.app
/api/users/{$id}");

        if ($response->successful()) {
            return redirect()->route('usuario.index')->with('success', 'Usuario eliminado correctamente.');
        }

        return back()->with('error', 'No se pudo eliminar el usuario.');
    }


}
