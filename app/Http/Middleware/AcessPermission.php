<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class AcessPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,...$roles)
    {
        $quyenuser=Auth::user()->getrole();
        foreach ($roles as $role) {
            try {
                if ($quyenuser==$role) {
                  return $next($request);
            }

            } catch (Exception $x) {
                abort(403);
            }
        }
        return redirect('/');
    }

}
