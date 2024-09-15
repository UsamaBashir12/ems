@extends('layouts.layout')
<style>
  .select-category {
    color: black;
    background-color: white;
  }
</style>
@section('title', 'HOME PAGE')
@section('content')
  {{-- banner hero --}}
  <div class="container-fluid">
    <div class="row p-0">
      <div class="col-md-12 p-0">
        <div class="banner-img-setting">
          <img src="{{ asset('images/banners.jpg') }}" alt="" class="w-100 h-100">
        </div>
        {{-- search bar --}}
        <div class="container d-flex justify-content-center align-items-center mt-3">
          <form action="{{ route('home') }}" method="GET" class="search-container p-3 bg-light rounded shadow">
            <div class="d-flex align-items-center">
              <select class="form-select me-2 select-category" name="category" aria-label="Select Category">
                <option value="">Choose Category</option>
                @foreach ($categories as $category)
                  <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                    {{ $category->title }}
                  </option>
                @endforeach
              </select>
              <input type="text" class="form-control me-2 search-input" name="search" placeholder="Search..."
                value="{{ request('search') }}" aria-label="Search">
              <button type="submit" class="btn btn-primary search-button">Search</button>
            </div>
          </form>
        </div>
        {{-- gallery filter --}}
        <div>
          <h2 class="text-center mt-5">Explore Our Events</h2>
        </div>
        <div class="container">
          <div class="row">
            @if ($events->isEmpty())
              <!-- If there are no events, show this message -->
              <div class="col-12">
                <p class="text-center mt-5">No events available today or upcoming. Please check back later!</p>
              </div>
            @else
              <!-- Loop through events if available -->
              @foreach ($events as $event)
                <div class="col-md-4 d-flex flex-wrap mb-3">
                  <div class="card h-100 w-100">
                    <div class="card-header">
                      <div style="height: 250px">
                        <img class="w-100 h-100"
                          src="{{ $event->image ? asset('storage/' . $event->image) : asset('images/default_image.png') }}"
                          alt="{{ $event->title }}">
                      </div>
                    </div>
                    <div class="card-body">
                      <h5 class="text-primary">
                        By: {{ $event->organizer->first_name }}
                      </h5>
                      <h3>Event Title: {{ $event->title }}</h3>
                      <p style="text-align: justify">
                        <b>Description:</b> {{ Str::limit($event->description, 150) }}
                      </p>
                      <p style="text-align: justify">
                        <b>Price:</b> {{ $event->price }}
                      </p>
                    </div>
                    <div class="card-footer">
                      @if ($event->id)
                        <a href="{{ route('user.book', ['event' => $event->id]) }}" class="btn btn-primary">Book
                          Event</a>
                      @else
                        <span>No booking available</span>
                      @endif
                    </div>
                  </div>
                </div>
              @endforeach
            @endif
          </div>
        </div>
        {{--  --}}
      </div>
    </div>
    {{-- resources/views/admin/category/index.blade.php --}}
    <div class="container my-5">
      <h3 class="my-5 text-center">Explore Categories</h3>
      <div class="row">
        @foreach ($categories as $category)
          <div class="col-md-4 mb-4">
            <div class="d-flex flex-wrap card h-100">
              <div class="card-header">
                @php
                  $imageUrl = $category->image ? asset('storage/categories/' . $category->image) : 'default-image-url';
                @endphp
                <img src="{{ $imageUrl }}" alt="{{ $category->title }}" class="img-fluid w-100">
              </div>
              <div class="card-footer">
                <p class="text-center">{{ $category->title }}</p>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  @endsection;
