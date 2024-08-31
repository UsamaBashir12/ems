@extends('layouts.layout')

@section('content')
  <div class="container">
    <h1>Event Details</h1>

    <!-- Display event details -->
    <div class="card">
      <div class="card-header">
        {{ $event->title }} {{-- Display event title --}}
      </div>
      <div class="card-body">
        <p><strong>Date:</strong> {{ $event->date ? $event->date->format('F j, Y') : 'Date not available' }}</p>
        {{-- Format the event date --}}
        <p><strong>Location:</strong> {{ $event->location }}</p>
        <p><strong>Description:</strong></p>
        <p>{{ $event->description }}</p>
      </div>
    </div>
    <a href="{{ route('organizer.dashboard') }}" class="btn btn-secondary mt-3">Go Back</a>

    <!-- Edit button -->
    <a href="{{ route('eventOrg.edit', $event->id) }}" class="btn btn-primary mt-3">Edit</a>

    <!-- Delete form -->
    <form action="{{ route('eventOrg.destroy', $event->id) }}" method="POST" class="mt-3">
      @csrf
      @method('DELETE')
      <button type="submit" class="btn btn-danger">Delete</button>
    </form>

    <!-- Back button -->
  </div>
@endsection
