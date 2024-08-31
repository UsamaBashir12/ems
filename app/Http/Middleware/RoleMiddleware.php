<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class RoleMiddleware
{
  public function handle($request, Closure $next, $roleId)
  {
    $user = Auth::user();
    Log::info('RoleMiddleware', ['user_id' => $user->id, 'role_id' => $roleId]);

    if (!$user || !$user->hasRole($roleId)) {
      Log::warning('Unauthorized access attempt', ['user_id' => $user->id, 'requested_role' => $roleId]);
      abort(403, 'Unauthorized action.');
    }
    
    return $next($request);
  }
}

