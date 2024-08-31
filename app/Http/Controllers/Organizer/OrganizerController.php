<?php

namespace App\Http\Controllers\Organizer;

use Illuminate\Support\Facades\Auth;
use App\Models\Event;
use App\Models\User;
use App\Models\Category;
use App\Models\Organizer;
use App\Http\Controllers\Controller;
// use App\Models\Event;
// use App\Models\Category;

class OrganizerController extends Controller
{

  // public function dashboard()
  // {
  //   $eventCount = Event::count();
  //   $categoryCount = Category::count();
  //   $events = Event::all();
  //   return view('organizer.dashboard', compact('eventCount', 'categoryCount', 'events'));
  // }
  public function dashboard()
  {
    $user = Auth::user();

    // Fetch counts and data from the database
    $eventCount = Event::where('organizer_id', $user->id)->count();
    $categoryCount = Category::count();
    $organizerCount = User::where('role_id', 2)->count();
    $userCount = User::count();

    // Fetch data related to the logged-in user
    $categories = Category::all();
    $users = User::all();
    $events = Event::where('organizer_id', $user->id)->get(); // Fetch events for the current organizer
    $organizers = User::where('role_id', 2)->with('events')->get(); // Fetch organizers and their events

    return view('organizer.dashboard', compact(
      'eventCount',
      'categoryCount',
      'organizerCount',
      'userCount',
      'categories',
      'users',
      'events',
      'organizers'
    ));
  }

  public function addEvent()
  {
    return view('organizer.event.addOrg');
  }

  public function allEvents()
  {
    $events = Event::all();
    return view('organizer.event.allOrg', compact('events'));
  }


  public function editEvent($id)
  {
    // Fetch the event details
    $event = Event::findOrFail($id);

    // Fetch the list of categories
    $categories = Category::all();

    // Pass the event and categories to the view
    return view('organizer.event.editOrg', compact('event', 'categories'));
  }

  // App\Http\Controllers\Organizer\OrganizerController.php
  public function destroy($id)
  {
    // Your code to delete the event
    $event = Event::findOrFail($id);
    $event->delete();

    return redirect()->route('organizer.event.allOrg')->with('success', 'Event deleted successfully.');
  }

  public function showEvent($id)
  {
    $event = Event::findOrFail($id);
    return view('organizer.event.showOrg', compact('event'));
  }
}
