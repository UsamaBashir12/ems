<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
  /**
   * Handle after the user is authenticated.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\User  $user
   * @return \Illuminate\Http\RedirectResponse
   */
  protected function authenticated(Request $request, $user)
  {
    switch ($user->role_id) {
      case 1:
        return redirect()->route('admin.dashboard');
      case 2:
        return redirect()->route('organizer.dashboard'); // Adjust as needed
      case 3:
        return redirect()->route('user.dashboard'); // Adjust as needed
      default:
        return redirect('/home'); // Default redirection
    }
  }
}
