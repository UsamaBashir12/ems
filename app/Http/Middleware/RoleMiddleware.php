<?php

// app/Http/Middleware/RoleMiddleware.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
  public function handle($request, Closure $next, $roleId)
  {
    $user = Auth::user();
    if (!$user || !$user->hasRole($roleId)) {
      abort(403, 'Unauthorized action.');
    }
    return $next($request);
  }
  
}
