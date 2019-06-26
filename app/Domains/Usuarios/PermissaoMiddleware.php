<?php

namespace App\Domains\Usuarios;

use Closure;
use Illuminate\Support\Facades\Auth;


class PermissaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        $abillity = $request->route()->getName();

         if (!Auth::user()->can($abillity)) {

             return redirect()->back()->with('error', 'Você não tem permissão para executar a ação solicitada.');
         }

        return $next($request);
    }
}
