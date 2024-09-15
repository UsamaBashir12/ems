@extends('layouts.layout')

@section('title', 'Event Details')

<style>
  .banner {
    background: linear-gradient(to right, #2c3e50, #3498db);
    color: white;
    padding: 50px 20px;
    text-align: center;
  }

  .banner h1 {
    font-size: 2.5rem;
    font-weight: bold;
  }

  .banner p {
    font-size: 1.25rem;
    margin-top: 20px;
  }

  .gallery {
    padding: 0px !important;
  }

  input[type="search"],
  input[type="text"],
  select {
    width: 100%;
  }
</style>

@section('content')
  <div class="my-5">
    <div class="banner">
      <div class="container py-5">
        <h1>Our Events</h1>
        <h5>Home / <a href="#" class="text-decoration-none text-white">Events</a></h5>
      </div>
    </div>
    <div class="container mt-5">
      <div class="row">
        <!-- Search and Filters Section -->
        <div class="col-md-3">
          <form method="GET" action="">
            <!-- Search Bar -->
            <div class="mb-3">
              <label for="search" class="form-label">Search</label>
              <input type="search" class="form-control" id="search" name="search" placeholder="Search events"
                value="{{ request('search') }}">
            </div>

            <!-- Filter by Date -->
            <div class="mb-3">
              <label for="startDate" class="form-label">Start Date</label>
              <input type="date" class="form-control" id="startDate" name="start_date"
                value="{{ request('start_date') }}">
            </div>
            <div class="mb-3">
              <label for="endDate" class="form-label">End Date</label>
              <input type="date" class="form-control" id="endDate" name="end_date" value="{{ request('end_date') }}">
            </div>

            <!-- Location Field -->
            <div class="mb-3">
              <label for="location" class="form-label">Location</label>
              <input type="text" class="form-control" id="location" name="location" placeholder="Enter location"
                value="{{ request('location') }}">
            </div>

            <!-- Category Field -->
            <div class="mb-3">
              <label for="category" class="form-label">Category</label>
              <select class="form-select" id="category" name="category">
                <option value="">Select category</option>
                @foreach ($categories as $category)
                  <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                    {{ $category->title }}
                  </option>
                @endforeach
              </select>
            </div>

            <!-- Event Type -->
            {{-- <div class="mb-3">
              <label class="form-label">Event Type</label>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="event_type" id="onlineEvent" value="online"
                  {{ request('event_type') == 'online' ? 'checked' : '' }}>
                <label class="form-check-label" for="onlineEvent">Online</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="event_type" id="offlineEvent" value="offline"
                  {{ request('event_type') == 'offline' ? 'checked' : '' }}>
                <label class="form-check-label" for="offlineEvent">Offline</label>
              </div>
            </div> --}}

            <!-- Price Filter -->
            <div class="mb-3">
              <label for="priceRange" class="form-label">Price Range ($)</label>
              <input type="range" class="form-range" id="priceRange" name="price_range" min="0" max="1000"
                step="10" value="{{ request('price_range', 500) }}" oninput="updatePriceRange(this.value)">
              <div class="mt-2">Selected Price: $<span id="priceRangeValue">{{ request('price_range', 500) }}</span>
              </div>
            </div>

            <button type="submit" class="btn btn-primary">Apply Filters</button>
          </form>
        </div>

        <!-- Event Listing Section -->
        <div class="col-md-9">
          <div class="row d-flex flex-wrap">
            @forelse ($events as $event)
              <div class="col-md-4 mb-4 h-100 d-flex flex-wrap">
                <a href="{{ route('events.show', $event->id) }}" class="text-decoration-none">
                  <div class="card h-100">
                    <div class="card-header p-0">
                      @php
                        // Use default event image if no image is provided
                        $imageUrl = $event->image
                            ? asset('storage/events/' . $event->image)
                            : asset('images/default-event.png');
                      @endphp
                      <div style="height: 250px;">
                        <img src="{{ $imageUrl }}" alt="{{ $event->title }}"
                          class="h-100 w-100 img-fluid card-img-top">
                      </div>
                    </div>
                    <div class="card-body">
                      <p class="text-primary fs-5 fw-bold">
                        By: {{ $event->organizer->first_name }}
                      </p>
                      <h5 class="card-title">{{ $event->title }}</h5>
                      <p class="card-text">{{ Str::limit($event->description, 100) }}</p>
                    </div>
                    <div class="card-footer">
                      <p><b>Price:</b> ${{ number_format($event->price, 2) }}</p>
                      <div class="d-flex justify-content-between">
                        <p class="mb-0">{{ \Carbon\Carbon::parse($event->start_date)->format('M d, Y') }}</p>
                        <p class="mb-0">{{ \Carbon\Carbon::parse($event->end_date)->format('M d, Y') }}</p>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
            @empty
              <!-- If there are no events available today or upcoming, show this message -->
              <div class="col-12">
                <p class="text-center mt-5">No events available today or upcoming. Please check back later!</p>
              </div>
            @endforelse
          </div>

          <!-- Paginate the events -->
          <div class="d-flex justify-content-center">
            {{ $events->appends(request()->query())->links() }}
          </div>
        </div>

      </div>
    </div>
  </div>

  <script>
    // Function to update the displayed price range
    function updatePriceRange(value) {
      document.getElementById('priceRangeValue').textContent = value;
    }

    // Initialize with the default value
    document.addEventListener('DOMContentLoaded', function() {
      document.getElementById('priceRange').value = {{ request('price_range', 500) }}; // Set initial value
      updatePriceRange({{ request('price_range', 500) }}); // Update display with the initial value
    });
  </script>
@endsection
