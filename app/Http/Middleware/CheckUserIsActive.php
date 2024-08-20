<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckUserIsActive
{
  public function handle($request, Closure $next)
  {
    if (Auth::check() && !Auth::user()->is_active) {
      // Log out the deactivated user
      Auth::logout();

      // Redirect to the login page with a message
      return redirect()->route('login')->withErrors([
        'email' => 'Your account has been deactivated. Please contact support.'
      ]);
    }

    return $next($request);
  }
}
