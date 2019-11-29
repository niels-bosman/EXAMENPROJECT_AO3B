<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Beheer
{
    /**
     * Een controle of de ingelogde systeem deze pagina mag bezoeken qua auth_level
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check())
            if (auth()->user()->auth_level > 1)
                return $next($request);


        return redirect('/');
    }
}
