<?php

// app/Http/Controllers/EventBookingController.php
namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventBookingController extends Controller
{
  public function book(Event $event)
  {
    // Check if the user is authenticated
    if (!Auth::check()) {
      return redirect()->route('login')->with('error', 'You must be logged in to book an event.');
    }

    // Create a booking entry
    Booking::create([
      'user_id' => Auth::id(),
      'event_id' => $event->id,
    ]);

    return redirect()->route('user.dashboard')->with('success', 'Event booked successfully!');
  }
}
