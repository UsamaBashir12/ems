<?php

namespace App\Http\Controllers\Admin;

use App\Models\Event;
use App\Models\User;
use App\Models\Category;
use App\Models\Organizer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
    $category->delete();
    return redirect()->route('admin.category.all')->with('success', 'Category deleted successfully!');
}
public function updateCategory(Request $request, $id)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'slug' => 'required|string|max:255|unique:categories,slug,' . $id,
        'description' => 'required|string',
        'parent_id' => 'nullable|exists:categories,id',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'status' => 'required|boolean',
    ]);

    $category = Category::findOrFail($id);
    $category->title = $request->title;
    $category->slug = $request->slug;
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
    // Fetch counts or any other necessary data
    $eventCount = Event::count();
    $categoryCount = Category::count();
    $organizerCount = User::where('role_id', 2)->count(); // Count users with role_id 2
    $userCount = User::count();

    // Fetch categories if needed in the dashboard
    $categories = Category::all(); // Or any other method to get categories

    // Pass the data to the view
    return view('admin.dashboard', compact('eventCount', 'categoryCount', 'organizerCount', 'userCount', 'categories'));
  }


  public function create()
  {
    // Fetch users with role_id = 2
    $organizers = User::where('role_id', 2)->get();
    return view('admin.events.create', compact('organizers'));
  }

  public function addEvent()
  {
    $categories = Category::all(); // Replace with your method to get categories
    // Fetch users with role_id = 2
    $users = User::where('role_id', 2)->get();
    // Pass users to the view
    return view('admin.event.addEvents', compact('users', 'categories'));
  }

  public function add()
  {
    return view('admin.user.add');
  }

  public function all()
  {
    // Logic for displaying all users
    return view('admin.user.all');
  }

  public function organizers()
  {
    return view('admin.user.organizers');
  }

  public function appSettings()
  {
    return view('admin.appSettings');
  }

  public function allEvent()
  {
    // Fetch all events including any necessary details
    $events = Event::all(); // This fetches all records from the events table
    return view('admin.event.allEvents', compact('events')); // Pass the events to the view
  }

  // Method to show categories form and pass existing categories
  public function categories()
  {
    // Pass existing categories for parent category dropdown
    $categories = Category::all();
    return view('admin.event.categories', compact('categories'));
  }

  // Method to store new category
  public function storeCategory(Request $request)
  {
    $request->validate([
      'title' => 'required|string|max:255',
      'slug' => 'required|string|max:255|unique:categories',
      'description' => 'required|string',
      'parent_id' => 'nullable|exists:categories,id',
      'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
      'status' => 'required|boolean',
    ]);

    $category = new Category();
    $category->title = $request->title;
    $category->slug = $request->slug;
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
