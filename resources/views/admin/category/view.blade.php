@extends('layouts.layout')

@section('content')
  <div class="container">
    <h1>Category Details</h1>
    <div>
      <p><strong>Title:</strong> {{ $category->title }}</p>
      <p><strong>Slug:</strong> {{ $category->slug }}</p>
      <p><strong>Description:</strong> {{ $category->description }}</p>
      <p><strong>Status:</strong> {{ $category->status ? 'Active' : 'Inactive' }}</p>
      @if ($category->image)
        <img src="{{ asset('storage/categories/' . $category->image) }}" alt="{{ $category->title }}"
          style="max-width: 200px;">
      @endif
      <a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-primary">Edit</a>
      <form action="{{ route('admin.category.delete', $category->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
      </form>
      <a href="{{ route('admin.category.all') }}" class="btn btn-secondary">Back to Categories</a>
    </div>
  </div>
@endsection
