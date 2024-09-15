<?php

namespace App\Http\Controllers\User;

use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\User;
use App\Models\Event;
use App\Models\Booking;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

class UserSideController extends Controller
{
  public function dashboard()
  {
    $today = Carbon::today()->toDateString();

    \Log::info("Today's Date: " . $today);

    // Retrieve all events starting from today
    $events = Event::whereDate('start_date', '>=', $today)
      ->get();

    \Log::info('Retrieved Events:', $events->toArray());

    $organizers = User::where('role_id', 2)->get(); // Organizers
    $categories = Category::all();

    return view('user.dashboard', compact('events', 'categories', 'organizers'));
  }
  // Show the booking form
  public function showBookingForm($eventId)
  {
    $event = Event::findOrFail($eventId);
    return view('user.book', compact('event'));
  }


  public function book(Request $request, int $eventId)
  {
    // Find the event by ID
    $event = Event::findOrFail($eventId);

    // Validate the request input
    $validated = $request->validate([
      'free_quantity' => 'required|integer|min:0',
      'normal_quantity' => 'required|integer|min:0',
      'all_quantity' => 'required|integer|min:0',
      'business_quantity' => 'required|integer|min:0',
      'first_quantity' => 'required|integer|min:0',
    ]);

    // Define ticket prices
    $ticketPrices = [
      'free_quantity' => 0,
      'normal_quantity' => 95,
      'all_quantity' => 120,
      'business_quantity' => 150,
      'first_quantity' => 200,
    ];

    // Calculate the total price
    $totalPrice = array_reduce(array_keys($validated), function ($carry, $key) use ($validated, $ticketPrices) {
      return $carry + ($validated[$key] * $ticketPrices[$key]);
    }, 0);

    \Log::info('Total Price:', ['total_price' => $totalPrice]);

    // Store the booking in the database
    Booking::create([
      'event_id' => $event->id,
      'user_id' => auth()->id(),
      'free_quantity' => $validated['free_quantity'],
      'normal_quantity' => $validated['normal_quantity'],
      'all_quantity' => $validated['all_quantity'],
      'business_quantity' => $validated['business_quantity'],
      'first_quantity' => $validated['first_quantity'],
      'total_price' => $totalPrice,
    ]);

    // Redirect with a success message
    return redirect()->route('user.dashboard', $event->id)->with('success', 'Tickets successfully booked!');
  }





  /**
   * Show the booking form for an event.
   *
   * @param int $eventId
   * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
   */

  public function confirmBooking(Request $request, $eventId)
  {
    // Handle booking logic here
    // For example, you might save the booking to the database

    // Redirect to a confirmation page or back with a success message
    return redirect()->route('book.event', ['events' => $eventId])->with('success', 'Booking confirmed!');
  }
  /**
   * Book an event.
   *
   * @param \Illuminate\Http\Request $request
   * @param int $eventId
   * @return \Illuminate\Http\RedirectResponse
   */
}
