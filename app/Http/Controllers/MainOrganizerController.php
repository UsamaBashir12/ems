<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class MainOrganizerController extends Controller
{
  public function index()
  {
    $organizers = User::where('role_id', 2)->get();

    // Ensure the data is retrieved correctly
    // dd($organizers); // Comment this out once verified

    return view('organizer', compact('organizers'));
  }

  public function show($id)
  {
    // Implement this if you want to show detailed information about a single organizer
    $organizer = User::findOrFail($id);
    return view('organizer', compact('organizer'));
  }
}
