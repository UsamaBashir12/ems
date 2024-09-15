<?php

namespace App\Http\Controllers\Organizer;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class NewController extends Controller
{
  public function index()
  {
    $user = Auth::user(); // Get the currently logged-in user
    $events = Event::where('organizer_id', $user->id)->get(); // Fetch only events for the current organizer
    $categories = Category::all(); // Fetch all categories from the database
    return view('organizer.event.allOrg', compact('events', 'categories')); // Pass events and categories to the view
  }

  public function deleteEvent($id)
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

    // Delete the event record
    $event->delete();

    return redirect()->route('event.all')->with('success', 'Event deleted successfully!');
  }

  public function create()
  {
    $categories = Category::all();
    $organizers = User::where('role_id', 2)->get(); // Ensure role_id 2 is correct for organizers
    return view('organizer.event.addOrg', compact('categories', 'organizers'));
  }

  public function store(Request $request)
  {
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
      'price' => 'required|numeric',  // Add validation for the price

    ]);

    $event = Event::create($validated);

    if ($request->hasFile('image')) {
      $event->image = $request->file('image')->store('images', 'public');
    }

    if ($request->hasFile('gallery')) {
      $galleryPaths = [];
      foreach ($request->file('gallery') as $galleryImage) {
        $galleryPaths[] = $galleryImage->store('gallery', 'public');
      }
      $event->gallery = json_encode($galleryPaths);
    }

    $event->save();

    return redirect()->route('event.all')->with('success', 'Event created successfully!');
  }

  public function allEvents()
  {
    $user = Auth::user(); // Get the currently logged-in user
    $events = Event::where('organizer_id', $user->id)->get(); // Fetch only events for the current organizer
    return view('organizer.event.allOrg', compact('events'));
  }




  public function destroy(Request $request, $id)
  {
    // Ensure that only DELETE requests are processed
    if ($request->isMethod('delete')) {
      try {
        $event = Event::findOrFail($id);
        $event->delete();
        return redirect()->back()->with('success', 'Event deleted successfully.');
      } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Failed to delete the event.');
      }
    } else {
      // If the request is not DELETE, deny access or redirect
      abort(403, 'Unauthorized action.');
    }
  }



  public function show($id)
  {
    $event = Event::findOrFail($id);
    return view('organizer.event.showOrg', compact('event'));
  }
  public function edit($id)
  {
    $event = Event::findOrFail($id);
    $categories = Category::all(); // Fetch all categories
    return view('organizer.event.editOrg', compact('event', 'categories'));
  }


  public function update(Request $request, $id)
  {
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
      'price' => 'required|numeric',  // Add validation for the price

    ]);

    $event = Event::findOrFail($id);
    $event->update($validated);

    if ($request->hasFile('image')) {
      if ($event->image) {
        Storage::disk('public')->delete($event->image);
      }
      $event->image = $request->file('image')->store('images', 'public');
    }

    if ($request->hasFile('gallery')) {
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

    return redirect()->route('event.all')->with('success', 'Event updated successfully.');
  }
}
