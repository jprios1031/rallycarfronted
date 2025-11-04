<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
     $user = Session::get('user');

if (!$user || !isset($user['role_id']) || $user['role_id'] != 1) {
    return redirect()->route('inicio.index')->with('error', 'Acceso no autorizado');
}

return $next($request);
    }
}
