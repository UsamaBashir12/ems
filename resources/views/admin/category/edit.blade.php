@extends('layouts.layout')

@section('content')
  <div class="container">
    <h1>Edit Category</h1>
    <form action="{{ route('admin.category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" value="{{ old('title', $category->title) }}" class="form-control"
          required>
      </div>
      <div class="form-group">
        <label for="slug">Slug</label>
        <input type="text" name="slug" id="slug" value="{{ old('slug', $category->slug) }}"
          class="form-control" required>
      </div>
      <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" id="description" class="form-control" required>{{ old('description', $category->description) }}</textarea>
      </div>
      <div class="form-group">
        <label for="parent_id">Parent Category</label>
        <select name="parent_id" id="parent_id" class="form-control">
          <option value="">None</option>
          @foreach ($categories as $cat)
            <option value="{{ $cat->id }}" {{ $category->parent_id == $cat->id ? 'selected' : '' }}>
              {{ $cat->title }}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label for="image">Image</label>
        <input type="file" name="image" id="image" class="form-control">
      </div>
      <div class="form-group">
        <label for="status">Status</label>
        <select name="status" id="status" class="form-control">
          <option value="1" {{ $category->status ? 'selected' : '' }}>Active</option>
          <option value="0" {{ !$category->status ? 'selected' : '' }}>Inactive</option>
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Update Category</button>
    </form>
    <a href="{{ route('admin.category.all') }}" class="btn btn-secondary">Back to Categories</a>

  </div>
@endsection
