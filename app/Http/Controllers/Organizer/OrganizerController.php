<?php

namespace App\Http\Controllers\Organizer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrganizerController extends Controller
{
  public function dashboard()
  {
    return view('organizer.dashboard');
  }
}
