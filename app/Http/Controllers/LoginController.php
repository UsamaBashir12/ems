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
    // Check if the user is active
    if (!$user->is_active) {
      // Log out the user if they are inactive
      Auth::logout();

      // Redirect to the login page with an error message
      return redirect('/login')->with('error', 'You are blocked and inactive by the admin.');
    }

    // Redirect based on the user's role
    switch ($user->role_id) {
      case 1:
        return redirect()->route('admin.dashboard');
      case 2:
        return redirect()->route('organizer.dashboard'); // Adjust as needed
      case 3:
        return redirect()->route('user.dashboard'); // Adjust as needed
      default:
        return redirect('/home'); // Default redirection for other roles
    }
  }
  protected function sendFailedLoginResponse(Request $request)
  {
    $user = \App\Models\User::where('email', $request->input('email'))->first();

    if ($user && !$user->is_active) {
      // If the user is deactivated, show a custom error message
      return redirect()->back()
        ->withInput($request->only('email', 'remember'))
        ->withErrors(['email' => 'Your account has been deactivated. Please contact support.']);
    }

    // Default error message
    return redirect()->back()
      ->withInput($request->only('email', 'remember'))
      ->withErrors(['email' => trans('auth.failed')]);
  }
}
