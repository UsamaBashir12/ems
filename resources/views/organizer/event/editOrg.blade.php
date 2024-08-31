<!-- resources/views/organizer/event/edit.blade.php -->

@extends('layouts.layout')

@section('content')
  <div class="container">
    <h1>Edit Event</h1>

    <!-- Edit event form -->
    <form action="{{ route('eventOrg.update', $event->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')

      <div class="form-group">
        <label for="title">Title</label>
        <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $event->title) }}"
          required>
      </div>

      <!-- Add other fields here -->

      <div class="form-group">
        <label for="category_id">Category</label>
        <select id="category_id" name="category_id" class="form-control" required>
          @foreach ($categories as $category)
            <option value="{{ $category->id }}" {{ $event->category_id == $category->id ? 'selected' : '' }}>
              {{ $category->name }}
            </option>
          @endforeach
        </select>
      </div>
      <a href="{{ route('organizer.dashboard') }}" class="btn btn-secondary mt-3">Go Back</a>

      <button type="submit" class="btn btn-primary">Update Event</button>
    </form>

    <!-- Back button -->
    {{-- <a href="{{ route('events.index') }}" class="btn btn-secondary mt-3">Back to List</a> --}}
  </div>
@endsection
