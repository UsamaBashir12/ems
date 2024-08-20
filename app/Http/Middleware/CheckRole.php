<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure  $next
   * @param  string  $role
   * @return mixed
   */
  // In CheckRole middleware
  public function handle(Request $request, Closure $next, string $role)
  {
    if (Auth::check() && Auth::user()->role_id == $role) {
      return $next($request);
    }

    return redirect('/'); // Redirect if role does not match
  }
}
