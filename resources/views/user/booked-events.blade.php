@extends('layouts.user')

@section('title', 'My Booked Events')

@section('content')
  <div class="container mt-5">
    <h1 class="mb-4">My Booked Events</h1>

    @if ($events->isEmpty())
      <p>You have not booked any events yet.</p>
    @else
      <div class="row">
        @foreach ($events as $event)
          <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
              @php
                $imageUrl = asset('storage/' . $event->image);
              @endphp
              <img src="{{ $imageUrl }}" class="card-img-top" alt="{{ $event->title }}"
                style="height: 200px; object-fit: cover;">
              <div class="card-body">
                <h5 class="card-title">{{ $event->title }}</h5>
                <p class="card-text">{{ Str::limit($event->description, 100) }}</p>
                <p><strong>Start:</strong> {{ $event->start_date }} {{ $event->start_time }}</p>
                <p><strong>End:</strong> {{ $event->end_date }} {{ $event->end_time }}</p>
              </div>
              <div class="card-footer text-muted">
                <small>Event ID: {{ $event->id }}</small>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    @endif
  </div>
@endsection
