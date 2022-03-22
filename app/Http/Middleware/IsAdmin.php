<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\String_;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, String $role)
    {
        if ($request->user()->roles === $role) {
            return $next($request);
        }

        abort(403);

        // if (Auth::user() &&  Auth::user()->roles == "resepsionis") {
        //     return $next($request);
        // }

        // return redirect('/')->with('error', '403');
    }
}
