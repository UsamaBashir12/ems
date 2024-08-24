<?php

namespace App\Models;
// use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\User;

class Event extends Model
{
  use HasFactory;

  protected $fillable = [
    'title',
    'slug',
    'description',
    'organizer_id',
    'start_date',
    'start_time',
    'end_date',
    'end_time',
    'address',
    'city',
    'state',
    'zip_code',
    'seats_available',
    'image',
    'gallery',
    'status',
    'category_id'
  ];

  public function category()
  {
    return $this->belongsTo(Category::class);
  }
  public function manageEvents()
{
    $events = Event::all(); // Fetch all events from the database
    return view('admin.event.manageEvents', compact('events')); // Pass events to the view
}
public function dashboard()
{
    // Assuming you need to get event and category counts from your models or database
    $eventCount = Event::count(); // Replace with your actual method to get event count
    $categoryCount = Category::count(); // Replace with your actual method to get category count

    return view('admin.dashboard', compact('eventCount', 'categoryCount'));
}

public function updateStatus(Request $request, $id)
{
    $user = User::find($id);

    if (!$user) {
        // Handle the case where the user is not found
    }

    // Your update logic here
}
}
