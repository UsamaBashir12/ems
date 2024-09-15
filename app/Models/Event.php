<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
  protected $fillable = [
    'title',
    'slug',
    'description',
    'organizer_id',
    'category_id',
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
    'price'
  ];

  protected $casts = [
    'gallery' => 'array',
  ];

  public function organizer()
  {
    return $this->belongsTo(User::class, 'organizer_id');
  }

  public function category()
  {
    return $this->belongsTo(Category::class, 'category_id');
  }
  public function users()
  {
      return $this->belongsToMany(User::class);
  }
}
