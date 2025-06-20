<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ManagerRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $role)
    {

        $userRole = $request->user()?->role ?? 0;

        if($role == 'admin') {
            if($userRole < 5 ) {
                abort(401);
            }
        } if($role == 'user') {
            if($userRole < 1 ) {
                return redirect('register');

            }
        }


        return $next($request);
    }
}
