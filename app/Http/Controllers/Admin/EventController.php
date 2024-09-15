<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
  public function create()
  {
    $users = User::all();
    $categories = Category::all();
    return view('admin.event.addEvents', compact('users', 'categories'));
  }

  public function store(Request $request)
  {
    $request->validate([
      'title' => 'required|string|max:255',
      'slug' => 'required|string|max:255|unique:events',
      'description' => 'required|string',
      'organizer_id' => 'required|exists:users,id',
      'category_id' => 'required|exists:categories,id',
      'start_date' => 'required|date',
      'start_time' => 'required|date_format:H:i',
      'end_date' => 'required|date',
      'end_time' => 'required|date_format:H:i',
      'address' => 'required|string',
      'city' => 'required|string',
      'state' => 'required|string',
      'zip_code' => 'required|string',
      'seats_available' => 'required|integer',
      'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
      'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
      'status' => 'required|boolean',
      'price' => 'required|numeric',  // Add validation for the price

    ]);

    // Store image in public storage
    $imagePath = $request->file('image') ? $request->file('image')->store('images/events', 'public') : null;

    // Store gallery images in public storage
    $galleryPaths = $request->file('gallery') ? array_map(fn($file) => $file->store('images/events/gallery', 'public'), $request->file('gallery')) : [];

    Event::create([
      'title' => $request->input('title'),
      'slug' => $request->input('slug'),
      'description' => $request->input('description'),
      'organizer_id' => $request->input('organizer_id'),
      'category_id' => $request->input('category_id'),
      'start_date' => $request->input('start_date'),
      'start_time' => $request->input('start_time'),
      'end_date' => $request->input('end_date'),
      'end_time' => $request->input('end_time'),
      'address' => $request->input('address'),
      'city' => $request->input('city'),
      'state' => $request->input('state'),
      'zip_code' => $request->input('zip_code'),
      'seats_available' => $request->input('seats_available'),
      'image' => $imagePath,
      'gallery' => json_encode($galleryPaths),
      'status' => $request->input('status'),
      'price' => $request->input('price'), // Ensure this is a valid numeric value
    ]);

    return redirect()->route('admin.event.all')->with('success', 'Event created successfully');
  }

  public function index()
  {
    $events = Event::all();
    return view('admin.event.allEvents', compact('events'));
  }

  public function all()
  {
    $events = Event::all();
    return view('admin.event.allEvents', compact('events'));
  }

  public function edit($id)
  {
    $event = Event::findOrFail($id);
    $users = User::all();
    $categories = Category::all();
    return view('admin.event.edit', compact('event', 'users', 'categories'));
  }

  // public function update(Request $request, $id)
  // {
  //   $request->validate([
  //     'title' => 'required|string|max:255',
  //     'slug' => 'required|string|max:255|unique:events,slug,' . $id,
  //     'description' => 'required|string',
  //     'organizer_id' => 'required|exists:users,id',
  //     'category_id' => 'required|exists:categories,id',
  //     'start_date' => 'required|date',
  //     'start_time' => 'required|date_format:H:i',
  //     'end_date' => 'required|date',
  //     'end_time' => 'required|date_format:H:i',
  //     'address' => 'required|string',
  //     'city' => 'required|string',
  //     'state' => 'required|string',
  //     'zip_code' => 'required|string',
  //     'seats_available' => 'required|integer',
  //     'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
  //     'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
  //     'status' => 'required|boolean',
  //   ]);

  //   $event = Event::findOrFail($id);

  //   // Handle file uploads
  //   if ($request->hasFile('image')) {
  //     Storage::delete($event->image);
  //     $event->image = $request->file('image')->store('images/events');
  //   }

  //   if ($request->hasFile('gallery')) {
  //     foreach (json_decode($event->gallery, true) as $path) {
  //       Storage::delete($path);
  //     }
  //     $event->gallery = json_encode(array_map(fn($file) => $file->store('images/events/gallery'), $request->file('gallery')));
  //   }

  //   $event->update($request->except('image', 'gallery'));

  //   return redirect()->route('admin.event.all')->with('success', 'Event updated successfully');
  // }
  public function update(Request $request, $id)
  {
    $request->validate([
      'title' => 'required|string|max:255',
      'slug' => 'required|string|max:255|unique:events,slug,' . $id,
      'description' => 'required|string',
      'organizer_id' => 'required|exists:users,id',
      'category_id' => 'required|exists:categories,id',
      'start_date' => 'required|date',
      'start_time' => 'required|date_format:H:i',
      'end_date' => 'required|date',
      'end_time' => 'required|date_format:H:i',
      'address' => 'required|string',
      'city' => 'required|string',
      'state' => 'required|string',
      'zip_code' => 'required|string',
      'seats_available' => 'required|integer',
      'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
      'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
      'status' => 'required|boolean',
      'price' => 'required|numeric',  // Add validation for the price

    ]);

    $event = Event::findOrFail($id);

    // Handle image upload
    if ($request->hasFile('image')) {
      // Delete old image if exists
      if ($event->image) {
        Storage::delete('public/' . $event->image);
      }
      $imagePath = $request->file('image')->store('images/events', 'public');
    } else {
      $imagePath = $event->image;
    }

    // Handle gallery upload
    if ($request->hasFile('gallery')) {
      // Delete old gallery images
      foreach (json_decode($event->gallery, true) as $path) {
        Storage::delete('public/' . $path);
      }
      $galleryPaths = array_map(fn($file) => $file->store('images/events/gallery', 'public'), $request->file('gallery'));
    } else {
      $galleryPaths = json_decode($event->gallery, true);
    }

    $event->update([
      'title' => $request->input('title'),
      'slug' => $request->input('slug'),
      'description' => $request->input('description'),
      'organizer_id' => $request->input('organizer_id'),
      'category_id' => $request->input('category_id'),
      'start_date' => $request->input('start_date'),
      'start_time' => $request->input('start_time'),
      'end_date' => $request->input('end_date'),
      'end_time' => $request->input('end_time'),
      'address' => $request->input('address'),
      'city' => $request->input('city'),
      'state' => $request->input('state'),
      'zip_code' => $request->input('zip_code'),
      'seats_available' => $request->input('seats_available'),
      'image' => $imagePath,
      'gallery' => json_encode($galleryPaths),
      'status' => $request->input('status'),
      'price' => $request->input('price'),  // removed the unnecessary validation here

    ]);

    return redirect()->route('admin.event.all')->with('success', 'Event updated successfully');
  }

  // public function destroy($id)
  // {
  //   $event = Event::findOrFail($id);
  //   Storage::delete($event->image);
  //   foreach (json_decode($event->gallery, true) as $path) {
  //     Storage::delete($path);
  //   }
  //   $event->delete();

  //   return redirect()->route('admin.event.all')->with('success', 'Event deleted successfully');
  // }
  public function destroy($id)
  {
    $event = Event::findOrFail($id);

    if (!empty($event->file_path)) {
      Storage::delete($event->file_path);
    }

    $event->delete();

    return redirect()->route('admin.event.all')->with('success', 'Event deleted successfully.');
  }


  public function categories()
  {
    $categories = Category::all(); // Fetch all categories from the database
    return view('admin.event.categories', compact('categories')); // Return to a Blade view
  }
}
