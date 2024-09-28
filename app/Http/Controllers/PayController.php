<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use Stripe\Checkout\Session;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Event;

class PayController extends Controller
{
  public function pay(Request $request, Event $event)
  {
    // Validate the incoming request
    $validated = $request->validate([
      'free_quantity' => 'nullable|integer|min:0',
      'normal_quantity' => 'nullable|integer|min:0',
      'all_quantity' => 'nullable|integer|min:0',
      'business_quantity' => 'nullable|integer|min:0',
      'first_quantity' => 'nullable|integer|min:0',
    ]);

    // Set up Stripe payment intent
    Stripe::setApiKey(env('STRIPE_SECRET'));

    // Calculate total price based on ticket quantities
    $totalPrice = 0;
    $tickets = [
      'free_quantity' => 0,
      'normal_quantity' => 95,
      'all_quantity' => 120,
      'business_quantity' => 150,
      'first_quantity' => 200,
    ];

    foreach ($tickets as $ticketType => $price) {
      $quantity = $validated[$ticketType] ?? 0;
      $totalPrice += $price * $quantity;
    }

    if ($totalPrice <= 0) {
      return redirect()->back()->withErrors('You must select at least one paid ticket to proceed.');
    }

    // Create Stripe Checkout session
    $checkoutSession = Session::create([
      'payment_method_types' => ['card'],
      'line_items' => [
        [
          'price_data' => [
            'currency' => 'usd',
            'product_data' => [
              'name' => 'Event Booking',
              'description' => $event->name,
            ],
            'unit_amount' => $totalPrice * 100, // Stripe expects amount in cents
          ],
          'quantity' => 1,
        ],
      ],
      'mode' => 'payment',
      'success_url' => route('events.book.success', ['event' => $event->id]),
      'cancel_url' => route('events.book.cancel', ['event' => $event->id]),
    ]);

    // Redirect to Stripe Checkout
    return redirect($checkoutSession->url);
  }

  // Store booking data only after payment success
  public function success(Request $request, Event $event)
  {
    // Ensure these quantities are passed in the request
    $freeTickets = $request->input('free_quantity', 0);
    $normalTickets = $request->input('normal_quantity', 0);
    $businessTickets = $request->input('business_quantity', 0);
    $firstClassTickets = $request->input('first_quantity', 0);

    // Assuming you have prices for each ticket type
    $normalTicketPrice = 100; // Example price
    $businessTicketPrice = 200; // Example price
    $firstClassTicketPrice = 300; // Example price

    // Calculate the total price
    $totalPrice = ($normalTickets * $normalTicketPrice) + ($businessTickets * $businessTicketPrice) + ($firstClassTickets * $firstClassTicketPrice);

    // Store booking details including total price
    $event->bookings()->create([
      'user_id' => auth()->id(),
      'free_tickets' => $freeTickets,
      'normal_tickets' => $normalTickets,
      'business_tickets' => $businessTickets,
      'first_class_tickets' => $firstClassTickets,
      'total_price' => $totalPrice, // Store total price
    ]);

    return redirect()->route('user.dashboard')->with('success', 'Your event booking was successful!');
  }

  public function cancel(Event $event)
  {
    return redirect()->route('events.show', ['event' => $event->id])->with('error', 'Payment was cancelled.');
  }
}
