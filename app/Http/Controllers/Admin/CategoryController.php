<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
  public function index()
  {
    $categories = Category::all();
    return view('admin.category.index', compact('categories'));
  }

  public function view($id)
  {
    $category = Category::findOrFail($id);
    return view('admin.category.view', compact('category'));
  }

  public function edit($id)
  {
    $category = Category::findOrFail($id);
    $categories = Category::all(); // Fetch parent categories if needed
    return view('admin.category.edit', compact('category', 'categories'));
  }

  public function all()
  {
    $categories = Category::all();
    return view('admin.category.view', compact('categories'));
  }

  // Store method
  public function store(Request $request)
  {
    $request->validate([
      'title' => 'required|string|max:255',
      'description' => 'required|string',
      'parent_id' => 'nullable|exists:categories,id',
      'status' => 'required|boolean',
      'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $imagePath = $request->hasFile('image') ? $request->file('image')->store('public/categories') : null;

    $category = Category::create([
      'title' => $request->input('title'),
      'description' => $request->input('description'),
      'parent_id' => $request->input('parent_id'),
      'status' => $request->input('status'),
      'image' => $imagePath ? basename($imagePath) : null,
    ]);

    return redirect()->route('admin.dashboard')->with('success', 'Category created successfully.');
  }

  // Update method
  public function update(Request $request, $id)
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

    $category->title = $request->input('title');
    $category->slug = $request->input('slug');
    $category->description = $request->input('description');
    $category->parent_id = $request->input('parent_id');
    $category->status = $request->input('status');

    if ($request->hasFile('image')) {
      if ($category->image && Storage::exists('public/categories/' . $category->image)) {
        Storage::delete('public/categories/' . $category->image);
      }

      $imagePath = $request->file('image')->store('public/categories');
      $category->image = basename($imagePath);
    }

    $category->save();

    return redirect()->route('admin.category.view', ['id' => $id])
      ->with('success', 'Category updated successfully.');
  }


  public function show($id)
  {
    $category = Category::find($id);
    if (!$category) {
      abort(404);
    }
    return view('admin.category.view', compact('category'));
  }

  public function destroy($id)
  {
    $category = Category::findOrFail($id);

    if ($category->image_path) {
      Storage::delete($category->image_path);
    }

    $category->delete();
    return redirect()->route('admin.dashboard')->with('success', 'Category deleted successfully.');
  }
}
