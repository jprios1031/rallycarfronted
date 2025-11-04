<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;
class ClienteMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
   public function handle(Request $request, Closure $next)
{
    $user = session('user'); // equivalente a Session::get('user')

    if (empty($user) || ($user['role_id'] ?? null) != 2) {
        return redirect()->route('iniciocliente.index')->with('error', 'Acceso no autorizado');
    }

    return $next($request);
}

}
