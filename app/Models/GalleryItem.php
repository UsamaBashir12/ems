<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryItem extends Model
{
  use HasFactory;

  // Define fillable attributes or guarded attributes as needed
  protected $fillable = ['title', 'description', 'image_url', 'category', 'location', 'price'];
}
