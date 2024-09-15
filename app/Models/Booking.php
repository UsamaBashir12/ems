<?php

// app/Models/Booking.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
  use HasFactory;

  protected $fillable = [
    'event_id',
    'user_id',
    'free_quantity',
    'normal_quantity',
    'all_quantity',
    'business_quantity',
    'first_quantity',
    'total_price',
  ];
  public function event()
  {
    return $this->belongsTo(Event::class);
  }
}
