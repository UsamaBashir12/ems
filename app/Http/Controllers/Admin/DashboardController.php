<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Category;
use App\Models\Organizer;
use App\Models\User;

class DashboardController extends Controller
{
  public function index()
  {
    // Fetch the event count from the database
    $eventCount = Event::count();

    // Fetch the category count from the database
    $categoryCount = Category::count();

    // Fetch the organizer count from the database
    $organizerCount = User::where('role_id', 2)->count();

    // Fetch the user count from the database
    $userCount = User::count();

    // Fetch all categories if you want to display them
    $categories = Category::all();

    // Pass the data to the view
    return view('admin.dashboard', compact('eventCount', 'categoryCount', 'organizerCount', 'userCount', 'categories'));
  }
}
