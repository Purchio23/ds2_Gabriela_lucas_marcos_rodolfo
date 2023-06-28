<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Verificar se o usuário é um administrador
        if (!Auth::user()->isAdmin()) {
            // Redirecionar para uma página de acesso negado ou qualquer outra rota desejada
            return redirect()->route('access-denied');
        }

        return $next($request);
    }
}
