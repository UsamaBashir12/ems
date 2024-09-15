<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Booking;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EventBookingController extends Controller
{
  public function showBookingForm($eventId)
  {
    $event = Event::findOrFail($eventId);
    return view('user.book-event', compact('event'));
  }

  public function confirmBooking(Request $request, $eventId)
  {
    // Handle booking logic here
    // For example, you might save the booking to the database

    // Redirect to a confirmation page or back with a success message
    return redirect()->route('book.event', ['event' => $eventId])->with('success', 'Booking confirmed!');
  }
  public function book(Event $event)
  {
    // Retrieve all events that are created today or in the future (upcoming)
    $today = Carbon::today();
    $events = Event::whereDate('start_date', '>=', $today)->get();

    // Retrieve all organizers (assuming role_id 2 is for organizers)
    $organizers = User::where('role_id', 2)->get();

    // Retrieve all categories
    $categories = Category::all();

    // Check if the user is authenticated
    if (!Auth::check()) {
      return redirect()->route('login')->with('error', 'You must be logged in to book an event.');
    }

    // Create a booking entry
    Booking::create([
      'user_id' => Auth::id(),
      'event_id' => $event->id,
    ]);

    // Redirect to user dashboard with events, categories, and organizers
    return redirect()->route('user.dashboard', compact('events', 'categories', 'organizers'))->with('success', 'Event booked successfully!');
  }
}
