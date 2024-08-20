<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Category; // Include Category model
use Illuminate\Http\Request;

class EventController extends Controller
{
  // Display a listing of the events
  public function index()
  {
    $events = Event::all(); // Retrieve all events from the database
    return view('admin.events.index', compact('events')); // Pass events to the view
  }



  // Store a newly created event in the database
  public function store(Request $request)
  {
    // Validate the request data
    $request->validate([
      'title' => 'required|string|max:255',
      'slug' => 'required|string|unique:events',
      'description' => 'required|string',
      'category_id' => 'required|exists:categories,id', // Validate category ID
      'start_date' => 'required|date',
      'start_time' => 'required|date_format:H:i',
      'end_date' => 'required|date',
      'end_time' => 'required|date_format:H:i',
      'address' => 'required|string',
      'city' => 'required|string',
      'state' => 'required|string',
      'zip_code' => 'required|string',
      'seats_available' => 'required|integer',
      'status' => 'required|boolean',
      'image' => 'nullable|image', // Validate image if uploaded
      'gallery.*' => 'nullable|image', // Validate gallery images if uploaded
    ]);

    // Handle file uploads
    $imagePath = $request->hasFile('image') ? $request->file('image')->store('images/events') : null;

    $galleryPaths = [];
    if ($request->hasFile('gallery')) {
      foreach ($request->file('gallery') as $file) {
        $galleryPaths[] = $file->store('images/events/gallery');
      }
    }

    // Create a new event
    Event::create([
      'title' => $request->title,
      'slug' => $request->slug,
      'description' => $request->description,
      'category_id' => $request->category_id, // Store the category ID
      'start_date' => $request->start_date,
      'start_time' => $request->start_time,
      'end_date' => $request->end_date,
      'end_time' => $request->end_time,
      'address' => $request->address,
      'city' => $request->city,
      'state' => $request->state,
      'zip_code' => $request->zip_code,
      'seats_available' => $request->seats_available,
      'status' => $request->status,
      'image' => $imagePath,
      'gallery' => json_encode($galleryPaths), // Convert array of paths to JSON
    ]);

    return redirect()->route('admin.events.index')->with('success', 'Event created successfully.');
  }

  // Show the form for editing the specified event
  public function edit($id)
  {
    $event = Event::findOrFail($id); // Retrieve the event by ID
    $categories = Category::all(); // Fetch all categories
    return view('admin.events.edit', compact('event', 'categories')); // Pass the event and categories to the view
  }

  // Update the specified event in the database
  public function update(Request $request, $id)
  {
    // Validate the request data
    $request->validate([
      'title' => 'required|string|max:255',
      'slug' => 'required|string|unique:events,slug,' . $id,
      'description' => 'required|string',
      'category_id' => 'required|exists:categories,id', // Validate category ID
      'start_date' => 'required|date',
      'start_time' => 'required|date_format:H:i',
      'end_date' => 'required|date',
      'end_time' => 'required|date_format:H:i',
      'address' => 'required|string',
      'city' => 'required|string',
      'state' => 'required|string',
      'zip_code' => 'required|string',
      'seats_available' => 'required|integer',
      'status' => 'required|boolean',
      'image' => 'nullable|image', // Validate image if uploaded
      'gallery.*' => 'nullable|image', // Validate gallery images if uploaded
    ]);

    $event = Event::findOrFail($id); // Retrieve the event by ID

    // Handle file uploads
    $imagePath = $request->hasFile('image') ? $request->file('image')->store('images/events') : $event->image;

    $galleryPaths = $event->gallery ? json_decode($event->gallery) : [];
    if ($request->hasFile('gallery')) {
      foreach ($request->file('gallery') as $file) {
        $galleryPaths[] = $file->store('images/events/gallery');
      }
    }

    // Update the event
    $event->update([
      'title' => $request->title,
      'slug' => $request->slug,
      'description' => $request->description,
      'category_id' => $request->category_id, // Update the category ID
      'start_date' => $request->start_date,
      'start_time' => $request->start_time,
      'end_date' => $request->end_date,
      'end_time' => $request->end_time,
      'address' => $request->address,
      'city' => $request->city,
      'state' => $request->state,
      'zip_code' => $request->zip_code,
      'seats_available' => $request->seats_available,
      'status' => $request->status,
      'image' => $imagePath,
      'gallery' => json_encode($galleryPaths), // Convert array of paths to JSON
    ]);

    return redirect()->route('admin.events.index')->with('success', 'Event updated successfully.');
  }
  public function create()
  {
    $categories = Category::all(); // Retrieve all categories from the database
    return view('admin.events.create', compact('categories')); // Pass categories to the view
  }

  // Remove the specified event from the database
  public function destroy($id)
  {
    $event = Event::findOrFail($id); // Retrieve the event by ID
    $event->delete(); // Delete the event

    return redirect()->route('admin.events.index')->with('success', 'Event deleted successfully.');
  }
}
