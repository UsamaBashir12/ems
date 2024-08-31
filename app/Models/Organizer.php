<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organizer extends Model
{
  use HasFactory;

  protected $fillable = [
    'first_name',
    'last_name',
    'email',
    'phone',
    'gender',
    'dob',
  ];
  // Define the relationship with Event model
  public function events()
  {
    return $this->hasMany(Event::class);
  }
  // Optionally, you can define relationships here if needed
}
