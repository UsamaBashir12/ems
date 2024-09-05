<?php

namespace App\Http\Controllers;

use App\Models\Event; // Import Event model
use App\Models\Category; // Import Category model
use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function welcome()
  {
    // Fetch events and categories from the database
    $events = Event::all(); // or use your specific query
    $categories = Category::all(); // or use your specific query

    // Pass the data to the view
    return view('welcome', compact('events', 'categories'));
  }
  public function welcoming()
  {
    $events = Event::all();
    $categories = Category::all();

    return view('welcome', compact('events', 'categories'));
  }
  public function index()
  {
    $categories = Category::all();
    $events = Event::all();
    // dd($categories);

    return view('events', compact('categories', 'events'));
  }
  // public function welcome()
  // {

  // }
}
