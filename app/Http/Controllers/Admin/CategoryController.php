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
    // Fetch the category from the database or perform your logic
    $category = Category::findOrFail($id);

    // Return a view with the category data
    return view('admin.category.view', compact('category'));
  }
  public function edit($id = null)
  {
    if (!$id) {
      abort(404, 'Category not found.');
    }

    $category = Category::findOrFail($id);
    $categories = Category::all(); // or get your parent categories here
    return view('admin.category.edit', compact('category', 'categories'));
  }
  public function all()
  {
    $categories = Category::all(); // Assuming Category is a model
    return view('admin.category.view', compact('categories'));
  }

  public function store(Request $request)
  {
    $request->validate([
      'title' => 'required|string|max:255',
      'description' => 'required|string',
      'parent_id' => 'nullable|exists:categories,id',
      'status' => 'required|boolean',
      'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    if ($request->hasFile('image')) {
      $imagePath = $request->file('image')->store('public/categories');
    } else {
      $imagePath = null;
    }

    $category = Category::create([
      'title' => $request->input('title'),
      'description' => $request->input('description'),
      'parent_id' => $request->input('parent_id'),
      'status' => $request->input('status'),
      'image' => $imagePath ? basename($imagePath) : null,
    ]);

    return redirect()->route('admin.dashboard', ['id' => $category->id])->with('success', 'Category created successfully.');
  }

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
      $image = $request->file('image');
      $filename = time() . '.' . $image->getClientOriginalExtension();
      $image->storeAs('public/images', $filename);
      $category->image = $filename;
    }

    $category->save();

    return redirect()->route('admin.category.view', ['id' => $id])->with('success', 'Category updated successfully.');
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

    // Delete associated image if exists
    if ($category->image) {
      Storage::delete('public/categories/' . $category->image);
    }

    $category->delete();
    return redirect()->route('admin.dashboard')->with('success', 'Category deleted successfully.');
  }
}
