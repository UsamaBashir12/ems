<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
  /**
   * Show the dashboard view.
   *
   * @return \Illuminate\View\View
   */
  public function dashboard()
  {
    return view('admin.dashboard');
  }

  /**
   * Show all users.
   *
   * @return \Illuminate\View\View
   */
  public function all()
  {
    $users = User::all();
    return view('admin.user.all', ['users' => $users]);
  }

  /**
   * Show the form to add a new user.
   *
   * @return \Illuminate\View\View
   */
  public function add()
  {
    return view('admin.user.add');
  }

  /**
   * Store a newly created user.
   *
   * @param \Illuminate\Http\Request $request
   * @return \Illuminate\Http\RedirectResponse
   */
  public function store(Request $request)
  {
    // Validate request data
    $this->validateUser($request);

    // Create a new user
    User::create([
      'first_name' => $request->input('first_name'),
      'last_name' => $request->input('last_name'),
      'email' => $request->input('email'),
      'phone' => $request->input('phone'),
      'dob' => $request->input('dob'),
      'gender' => $request->input('gender'),
      'password' => Hash::make($request->input('password')),
      'role_id' => $request->input('role_id'),
    ]);

    // Redirect back with success message
    return redirect()->back()->with('success', 'User added successfully.');
  }

  /**
   * Show the form to edit a user.
   *
   * @param int $id
   * @return \Illuminate\View\View
   */
  public function edit($id)
  {
    $user = User::findOrFail($id);
    return view('admin.user.edit', compact('user'));
  }

  /**
   * Update the specified user.
   *
   * @param \Illuminate\Http\Request $request
   * @param int $id
   * @return \Illuminate\Http\RedirectResponse
   */
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

    // Redirect back with success message
    return redirect()->route('admin.user.all')->with('success', 'User updated successfully.');
  }

  /**
   * Remove the specified user.
   *
   * @param int $id
   * @return \Illuminate\Http\RedirectResponse
   */
  public function delete($id)
  {
    $user = User::findOrFail($id);
    $user->delete();
    return redirect()->route('admin.user.all')->with('success', 'User deleted successfully');
  }

  /**
   * Show all organizers.
   *
   * @return \Illuminate\View\View
   */
  public function organizers()
  {
    $organizers = User::where('role_id', 2)->get();
    return view('admin.user.organizers', compact('organizers'));
  }

  /**
   * Show app settings view.
   *
   * @return \Illuminate\View\View
   */
  public function appSettings()
  {
    return view('admin.appSettings');
  }

  /**
   * Validate user data for creation or update.
   *
   * @param \Illuminate\Http\Request $request
   * @param \App\Models\User|null $user
   * @return void
   */
  protected function validateUser(Request $request, User $user = null)
  {
    $rules = [
      'first_name' => 'required|string|max:255',
      'last_name' => 'required|string|max:255',
      'email' => 'required|email|unique:users,email' . ($user ? ",{$user->id}" : ''),
      'phone' => 'required|string|max:20',
      'dob' => 'required|date',
      'gender' => 'required|string',
      'password' => 'required|string|confirmed|min:8',
      'terms' => 'required|accepted'
    ];

    // Exclude password validation if it's an update and password is not being changed
    if ($user && !$request->has('password')) {
      unset($rules['password']);
    }

    $request->validate($rules);
  }
}
