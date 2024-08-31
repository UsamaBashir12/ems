<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Category;
use App\Models\User; // Assuming Organizer is a user role
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class OrganizerEventHandlerController extends Controller
{
  // Show the form for creating a new event
  public function create()
  {
    $categories = Category::all(); // Retrieve all categories
    $organizers = User::where('role_id', 2)->get(); // Fetch all organizers
    return view('organizer.event.addOrg', compact('categories', 'organizers'));
  }

  // Show the form for adding an event
  public function showAddEventForm()
  {
    $categories = Category::all(); // Fetch all categories from the database
    return view('organizer.event.addOrg', compact('categories')); // Pass categories to the view
  }

  // Store a newly created event in storage
  public function store(Request $request)
  {
    // Validate the request
    $validated = $request->validate([
      'title' => 'required|string|max:255',
      'slug' => 'required|string|max:255|unique:events,slug',
      'description' => 'required|string',
      'organizer_id' => 'required|exists:users,id',
      'category_id' => 'required|exists:categories,id',
      'start_date' => 'required|date',
      'start_time' => 'required|date_format:H:i',
      'end_date' => 'required|date|after_or_equal:start_date',
      'end_time' => 'required|date_format:H:i|after_or_equal:start_time',
      'address' => 'required|string|max:255',
      'city' => 'required|string|max:255',
      'state' => 'required|string|max:255',
      'zip_code' => 'required|string|max:10',
      'seats_available' => 'required|integer|min:1',
      'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
      'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
      'status' => 'required|in:0,1',
    ]);

    // Store the event
    $event = Event::create($validated);

    // Handle single file upload for image
    if ($request->hasFile('image')) {
      $imagePath = $request->file('image')->store('images', 'public');
      $event->image = $imagePath;
    }

    // Handle multiple file uploads for gallery
    if ($request->hasFile('gallery')) {
      $galleryPaths = [];
      foreach ($request->file('gallery') as $galleryImage) {
        $galleryPath = $galleryImage->store('gallery', 'public');
        $galleryPaths[] = $galleryPath;
      }
      $event->gallery = json_encode($galleryPaths);
    }

    $event->save();

    return redirect()->route('organizer.events.allOrg')->with('success', 'Event created successfully!');
  }

  // Display a listing of the events
  public function allEvents()
  {
    $events = Event::all(); // Fetch all events from the database
    return view('organizer.event.allOrg', compact('events')); // Pass events to the view
  }

  // Remove the specified event from storage
  public function destroy($id)
  {
    $event = Event::findOrFail($id);

    // Optionally delete associated files
    if ($event->image) {
      Storage::disk('public')->delete($event->image);
    }

    if ($event->gallery) {
      $galleryPaths = json_decode($event->gallery, true);
      foreach ($galleryPaths as $path) {
        Storage::disk('public')->delete($path);
      }
    }

    $event->delete();

    return Redirect::route('organizer.events.allOrg')->with('success', 'Event deleted successfully.');
  }

  // Display the specified event
  public function show($id)
  {
    $event = Event::findOrFail($id);
    return view('organizer.event.showOrg', compact('event'));
  }

  // Show the form for editing the specified event
  public function edit($id)
  {
    $event = Event::findOrFail($id);
    $categories = Category::all();
    return view('organizer.event.editOrg', compact('event', 'categories'));
  }

  // Update the specified event in storage
  public function update(Request $request, $id)
  {
    // Validate the request
    $validated = $request->validate([
      'title' => 'required|string|max:255',
      'category_id' => 'required|exists:categories,id',
      'start_date' => 'required|date',
      'start_time' => 'required|date_format:H:i',
      'end_date' => 'required|date|after_or_equal:start_date',
      'end_time' => 'required|date_format:H:i|after_or_equal:start_time',
      'address' => 'required|string|max:255',
      'city' => 'required|string|max:255',
      'state' => 'required|string|max:255',
      'zip_code' => 'required|string|max:10',
      'seats_available' => 'required|integer|min:1',
      'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
      'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
      'status' => 'required|in:0,1',
    ]);

    $event = Event::findOrFail($id);
    $event->update($validated);

    // Handle image update
    if ($request->hasFile('image')) {
      // Delete old image if exists
      if ($event->image) {
        Storage::disk('public')->delete($event->image);
      }
      $event->image = $request->file('image')->store('images', 'public');
    }

    // Handle gallery update
    if ($request->hasFile('gallery')) {
      // Delete old gallery images if exists
      if ($event->gallery) {
        $galleryPaths = json_decode($event->gallery, true);
        foreach ($galleryPaths as $path) {
          Storage::disk('public')->delete($path);
        }
      }

      $galleryPaths = [];
      foreach ($request->file('gallery') as $galleryImage) {
        $galleryPaths[] = $galleryImage->store('gallery', 'public');
      }
      $event->gallery = json_encode($galleryPaths);
    }

    $event->save();

    return redirect()->route('organizer.events.allOrg')->with('success', 'Event updated successfully.');
  }
}
