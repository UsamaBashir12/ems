<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest; // Correct namespace
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
  public function create()
  {
    // Return the login view
    return view('auth.login');
  }

  public function store(Request $request)
  {
    $this->validateLogin($request);

    if (Auth::attempt($request->only('email', 'password'), $request->filled('remember'))) {
      $request->session()->regenerate();

      // Redirect based on user role
      $user = Auth::user();
      if ($user->role_id === 1) {
        return redirect()->route('admin.dashboard');
      } elseif ($user->role_id === 2) {
        return redirect()->route('organizer.dashboard');
      } elseif ($user->role_id === 3) {
        return redirect()->route('user.dashboard');
      }

      return redirect()->intended('/');
    }

    throw ValidationException::withMessages([
      'email' => __('auth.failed'),
    ]);
  }

  protected function validateLogin(Request $request)
  {
    $request->validate([
      'email' => ['required', 'email'],
      'password' => ['required'],
    ]);
  }

  public function destroy(Request $request)
  {
    // Invalidate the session
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    // Redirect to the home page
    return redirect('/');
  }


  protected function credentials(Request $request)
  {
    // Return email and password as the login credentials
    return $request->only('email', 'password');
  }
}
