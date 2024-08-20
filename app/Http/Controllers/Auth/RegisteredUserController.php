<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

use Illuminate\Http\Request;

class RegisteredUserController extends Controller
{
  // Show the registration form
  public function create()
  {
    return view('auth.register'); // Assuming your form view is 'auth.register'
  }

  public function store(Request $request)
  {
    $validated = $request->validate([
      'first_name' => ['required', 'string', 'max:255'],
      'last_name' => ['required', 'string', 'max:255'],
      'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
      'phone' => ['required', 'string', 'max:15'],
      'gender' => ['required', 'string'],
      'dob' => ['required', 'date'],
      'password' => ['required', 'string', 'min:8', 'confirmed'],
    ]);

    // Assign role based on the selected tab
    $role_id = $request->input('role_id'); // This input would come from the selected tab (2 for Organizer, 3 for User)

    // Create the user with the dynamic role_id
    $user = User::create([
      'first_name' => $validated['first_name'],
      'last_name' => $validated['last_name'],
      'email' => $validated['email'],
      'phone' => $validated['phone'],
      'gender' => $validated['gender'],
      'dob' => $validated['dob'],
      'role_id' => $role_id, // Set the role ID dynamically
      'password' => Hash::make($validated['password']),
    ]);

    return redirect()->route('login')->with('status', 'Registration successful!');
  }
}
