<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class RoleManager
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$role)
    {
        // return $next($request);
        $type = json_decode($role);
        //print_r($type); exit;
        $u_role = Auth::user()->u_role;
        // if (isset($ses['user_role'])) {
        if (in_array($u_role, $type)) {
            return $next($request);
        } else {
          return redirect()->back();
        }
      }
    // }
}
