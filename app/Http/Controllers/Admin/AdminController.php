<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Models\Event;
use App\Models\User;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
  // Method to view a single category
  public function viewCategory($id)
  {
    $category = Category::findOrFail($id);
    return view('admin.category.view', compact('category'));
  }

  // Method to show edit form for a category
  public function editCategory($id)
  {
    $category = Category::findOrFail($id);
    $categories = Category::all(); // For parent category dropdown
    return view('admin.category.edit', compact('category', 'categories'));
  }

  // Method to delete a category
  public function deleteCategory($id)
  {
    $category = Category::findOrFail($id);

    // Delete associated image if exists
    if ($category->image) {
      Storage::delete('public/categories/' . $category->image);
    }

    $category->delete();
    return redirect()->route('admin.category.all')->with('success', 'Category deleted successfully!');
  }

  // Method to update a category
  public function updateCategory(Request $request, $id)
  {
    $request->validate([
      'title' => 'required|string|max:255',
      'description' => 'required|string',
      'parent_id' => 'nullable|exists:categories,id',
      'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
      'status' => 'required|boolean',
    ]);

    $category = Category::findOrFail($id);
    $category->title = $request->title;
    $category->slug = Str::slug($request->title); // Automatically generate slug
    $category->description = $request->description;
    $category->parent_id = $request->parent_id;
    $category->status = $request->status;

    if ($request->hasFile('image')) {
      // Delete old image if exists
      if ($category->image) {
        Storage::delete('public/categories/' . $category->image);
      }
      $imagePath = $request->file('image')->store('public/categories');
      $category->image = basename($imagePath);
    }

    $category->save();

    return redirect()->route('admin.category.all')->with('success', 'Category updated successfully!');
  }

  public function dashboard()
  {
    $eventCount = Event::count();
    $categoryCount = Category::count();
    $organizerCount = User::where('role_id', 2)->count();
    $userCount = User::count();

    $categories = Category::all();
    $users = User::all();
    return view('admin.dashboard', compact('eventCount', 'categoryCount', 'organizerCount', 'userCount', 'categories', 'users'));
  }

  // Method to show create event form
  public function create()
  {
    $organizers = User::where('role_id', 2)->get();
    return view('admin.events.create', compact('organizers'));
  }

  // Method to show add event form
  public function addEvent()
  {
    $categories = Category::all();
    $users = User::where('role_id', 2)->get();
    return view('admin.event.addEvents', compact('users', 'categories'));
  }

  // Method to show add user form
  public function add()
  {
    return view('admin.user.add');
  }

  // Method to show all users
  public function all()
  {
    $users = User::all();
    return view('admin.user.all', compact('users'));
  }

  // Method to show organizers
  public function organizers()
  {
    $organizers = User::where('role_id', 2)->get();
    return view('admin.user.organizers', compact('organizers'));
  }

  // Method to show app settings
  public function appSettings()
  {
    return view('admin.appSettings');
  }

  // Method to show all events
  public function allEvent()
  {
    $events = Event::all();
    return view('admin.event.allEvents', compact('events'));
  }

  // Method to show categories form and pass existing categories
  public function categories()
  {
    $categories = Category::all();
    return view('admin.event.categories', compact('categories'));
  }

  // Method to store new category
  public function storeCategory(Request $request)
  {
    $request->validate([
      'title' => 'required|string|max:255',
      'description' => 'required|string',
      'parent_id' => 'nullable|exists:categories,id',
      'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
      'status' => 'required|boolean',
    ]);

    $category = new Category();
    $category->title = $request->title;
    $category->slug = Str::slug($request->title); // Automatically generate slug
    $category->description = $request->description;
    $category->parent_id = $request->parent_id;
    $category->status = $request->status;

    if ($request->hasFile('image')) {
      $imagePath = $request->file('image')->store('public/categories');
      $category->image = basename($imagePath);
    }

    $category->save();

    return redirect()->route('admin.category.all')->with('success', 'Category created successfully!');
  }
}
