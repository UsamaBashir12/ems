<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User; // Import the User model
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Category;


class UserController extends Controller
{
  public function activate(Request $request, $id)
  {
    $user = User::find($id);
    if ($user) {
      $user->is_active = true;
      $user->save();
      return response()->json(['message' => 'User activated successfully']);
    } else {
      return response()->json(['message' => 'User not found'], 404);
    }
  }
  public function destroy(Request $request, $id)
  {
    $user = User::find($id);
    if ($user) {
      $user->delete();
      return redirect()->back()->with('success', 'User deleted successfully');
    } else {
      return redirect()->back()->with('error', 'User not found');
    }
  }


  public function deactivate(Request $request, $id)
  {
    $user = User::find($id);
    if ($user) {
      $user->is_active = false;
      $user->save();
      return response()->json(['message' => 'User deactivated successfully']);
    } else {
      return response()->json(['message' => 'User not found'], 404);
    }
  }

  public function view($id)
  {
    $user = User::find($id);

    if (!$user) {
      // Handle the case where the user is not found
      abort(404, 'User not found');
    }

    return view('admin.user.view', ['user' => $user]);
  }

  public function dashboard()
  {
    // Assuming you need to get event and category counts from your models or database
    $eventCount = Event::count(); // Replace with your actual method to get event count
    $categoryCount = Category::count(); // Replace with your actual method to get category count

    return view('user.dashboard', compact('eventCount', 'categoryCount'));
  }


  public function updateStatus(Request $request, $id)
  {
    $user = User::find($id);

    if (!$user) {
      return redirect()->route('admin.dashboard')->with('error', 'User not found!');
    }

    $user->is_active = $request->input('is_active'); // Ensure this field is correctly handled
    $user->save();

    return redirect()->route('admin.dashboard')->with('success', 'User status updated successfully!');
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
