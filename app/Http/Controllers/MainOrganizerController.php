<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class MainOrganizerController extends Controller
{
  //
  public function index()
  {
    // Fetch all organizers (assuming role_id = 2 is for organizers)
    $organizers = User::where('role_id', 2)->get();

    return view('organizers.index', compact('organizers'));
  }
}
