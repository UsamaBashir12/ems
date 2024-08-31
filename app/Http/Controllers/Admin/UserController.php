<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
  public function activate($id)
  {
    $user = User::find($id);
    if ($user) {
      $user->is_active = true;
      $user->save();
      return response()->json(['message' => 'User activated successfully.']);
    }
    return response()->json(['message' => 'User not found.'], 404);
  }

  public function deactivate($id)
  {
    $user = User::find($id);
    if ($user) {
      $user->is_active = false;
      $user->save();
      return response()->json(['message' => 'User deactivated successfully.']);
    }
    return response()->json(['message' => 'User not found.'], 404);
  }


  // Display all users
  public function index()
  {
    $users = User::all(); // Fetch all users
    return view('admin.user.all', compact('users'));
  }

  // Show the form for adding a new user
  public function add()
  {
    return view('admin.user.add');
  }

  // Fetch and display users with role_id of 2
  public function organizers()
  {
    $organizers = User::where('role_id', 2)->get();
    return view('admin.user.organizers', compact('organizers'));
  }

  // Show the form for editing a user
  public function edit($id)
  {
    $user = User::findOrFail($id); // Fetch the user by ID
    return view('admin.user.edit', compact('user'));
  }

  // Show user details
  public function view($id)
  {
    $user = User::findOrFail($id); // Fetch user by ID
    return view('admin.user.view', compact('user'));
  }

  // Store a new user
  public function store(Request $request)
  {
    // Validate the request
    $validated = $request->validate([
      'first_name' => 'required|string|max:255',
      'last_name' => 'required|string|max:255',
      'email' => 'required|string|email|max:255|unique:users',
      'phone' => 'required|string|max:15',
      'dob' => 'required|date',
      'gender' => 'required|string',
      'password' => 'required|string|min:8|confirmed',
      'role_id' => 'required|integer',
    ]);

    // Create a new user
    User::create([
      'first_name' => $validated['first_name'],
      'last_name' => $validated['last_name'],
      'email' => $validated['email'],
      'phone' => $validated['phone'],
      'dob' => $validated['dob'],
      'gender' => $validated['gender'],
      'password' => bcrypt($validated['password']),
      'role_id' => $validated['role_id'],
    ]);

    return redirect()->route('admin.user.all')->with('success', 'User created successfully.');
  }

  // Update an existing user
  public function update(Request $request, $id)
  {
    $user = User::findOrFail($id);

    // Validate request data, excluding the password field if not updated
    $this->validateUser($request, $user);

    // Update user attributes
    $user->update(array_merge(
      $request->only(['first_name', 'last_name', 'email', 'phone', 'dob', 'gender', 'role_id']),
      $request->has('password') ? ['password' => Hash::make($request->input('password'))] : []
    ));

    return redirect()->route('admin.user.all')->with('success', 'User updated successfully.');
  }

  // Delete a user
  public function delete($id)
  {
    $user = User::findOrFail($id);
    $user->delete();
    return redirect()->route('admin.user.all')->with('success', 'User deleted successfully.');
  }

  // Validate user data
  protected function validateUser(Request $request, $user = null)
  {
    $rules = [
      'first_name' => 'required|string|max:255',
      'last_name' => 'required|string|max:255',
      'email' => 'required|string|email|max:255|unique:users,email,' . ($user ? $user->id : 'NULL'),
      'phone' => 'required|string|max:15',
      'dob' => 'required|date',
      'gender' => 'required|string',
      'password' => 'nullable|string|min:8|confirmed',
      'role_id' => 'required|integer',
    ];

    $request->validate($rules);
  }
}
