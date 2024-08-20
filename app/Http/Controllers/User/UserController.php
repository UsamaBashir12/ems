<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User; // Import the User model
use Illuminate\Http\Request;

class UserController extends Controller
{
  public function dashboard()
  {
    return view('admin.dashboard'); // Ensure this view file exists
  }

  public function add()
  {
    return view('admin.user.add'); // Ensure this view file exists
  }

  public function all()
  {
    return view('admin.user.all'); // Ensure this view file exists
  }

  public function organizers()
  {
    return view('admin.user.organizers'); // Ensure this view file exists
  }

  public function appSettings()
  {
    return view('admin.appSettings'); // Ensure this view file exists
  }

  public function createEvent()
  {
    // Fetch users with role_id = 2
    $users = User::where('role_id', 2)->get();

    return view('admin.events.create', compact('users'));
  }
}
