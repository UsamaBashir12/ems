<?php

namespace App\Models;
// use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
