<?php

namespace App\Http\Controllers\User;

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event; // Assuming you have an Event model

class UserSideController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function dashboard()
  {
    // Retrieve all events
    $events = Event::where('status', 1)->get();

    // Pass events to the view
    return view('user.dashboard', compact('events'));
  }
  public function bookEvent(Request $request, $eventId)
  {
    $user = Auth::user();
    $event = Event::findOrFail($eventId);

    // Check if the user has already booked this event
    if ($user->events->contains($event)) {
      return redirect()->back()->with('error', 'You have already booked this event.');
    }

    // Book the event
    $user->events()->attach($eventId);

    return redirect()->back()->with('success', 'Event booked successfully!');
  }

  public function viewBookedEvents()
  {
    $user = Auth::user();
    // Fetch the events booked by the current user
    $events = $user->bookedEvents; // Assuming you have a relation named 'bookedEvents'

    return view('user.booked-events', compact('events'));
  }

  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    //
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    //
  }
}
