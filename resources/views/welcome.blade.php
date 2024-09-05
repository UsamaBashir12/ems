@extends('layouts.layout')
<style>
  .select-category {
    color: black;
    /* Ensures text color is black */
    background-color: white;
    /* Ensures background is white */
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
          <div class="search-container p-3 bg-light rounded shadow">
            <div class="d-flex align-items-center">
              <select class="form-select me-2 select-category" aria-label="Select Category">
                <option selected>Choose Category</option>

                @foreach ($categories as $category)
                  <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
              </select>
              <input type="text" class="form-control me-2 search-input" placeholder="Search..." aria-label="Search">
              <button class="btn btn-primary search-button">Search</button>
            </div>
          </div>
        </div>
        {{-- gallery filter --}}
        <section class="events">
          <div class="container">
            <div class="row">
              @foreach ($events as $event)
                <div class="col-md-4 mb-4">
                  <div class="event-item">
                    <img src="{{ $event->image_url }}" alt="{{ $event->title }}" class="img-fluid">
                    <div class="event-details">
                      <h3>{{ $event->title }}</h3>
                      <p>{{ $event->description }}</p>
                      <p>{{ $event->address }}, {{ $event->city }}</p>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
        </section>

        {{--  --}}
      </div>
    </div>
    {{-- resources/views/admin/category/index.blade.php --}}
    <div class="container my-5">
      <h3 class="my-5 text-center">Explore Categories</h3>
      <div class="row d-flex flex-wrap">
        @foreach ($categories as $category)
          <div class="col  mb-4">
            <div class="card h-100">
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

    {{--  --}}
    <div class="container my-5">
      <h2 class="fw-bold my-5 text-center">UPCOMING EVENTS</h2>
      <div class="row card-header-style d-flex flex-wrap">
        @foreach ($events as $event)
          <div class="col-md-4 mb-4">
            <a href="{{ route('events.show', $event->id) }}" class="text-decoration-none">
              <div class="card h-100">
                <div class="card-header">
                  @php
                    $imageUrl = $event->image
                        ? asset('storage/events/' . $event->image)
                        : asset('images/default-event.png');
                  @endphp
                  <img src="{{ $event->image ? asset('storage/' . $event->image) : 'default_image_path' }}"
                    alt="{{ $event->title }}">

                </div>

                <div class="card-body">
                  <h3>{{ $event->title }}</h3>
                  <p>{{ $event->description }}</p>
                </div>
                <div class="card-footer d-flex justify-content-between">
                  <p>{{ $event->location }}</p>
                  <p>${{ number_format($event->price, 2) }}</p>
                </div>
              </div>
            </a>
          </div>
        @endforeach
      </div>
    </div>
    {{-- Latest News --}}
    <div class="container">
      <h3 class="text-center my-5">Latest News</h3>
      <div class="row d-flex flex-wrap">
        <div class="col-md-4">
          <div class="card h-100">
            <div class="card-header">
              <img src="{{ asset('images/news/news_1.png') }}" alt="" class="w-100">
            </div>
            <div class="card-body">
              <h3>Title</h3>
              <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis, nihil?</p>
            </div>
            <div class="card-footer text-center">
              <button class="btn btn-dark btn-md">Read more</button>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card h-100">
            <div class="card-header">
              <img src="{{ asset('images/news/news_1.png') }}" alt="" class="w-100">
            </div>
            <div class="card-body">
              <h3>Title</h3>
              <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis, nihil?</p>
            </div>
            <div class="card-footer text-center">
              <button class="btn btn-dark btn-md">Read more</button>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card h-100">
            <div class="card-header">
              <img src="{{ asset('images/news/news_1.png') }}" alt="" class="w-100">
            </div>
            <div class="card-body">
              <h3>Title</h3>
              <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis, nihil?</p>
            </div>
            <div class="card-footer text-center">
              <button class="btn btn-dark btn-md">Read more</button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script>
      const filterContainer = document.querySelector(".gallery-filter"),
        galleryItems = document.querySelectorAll(".gallery-item");

      filterContainer.addEventListener("click", (event) => {
        if (event.target.classList.contains("filter-item")) {
          // deactivate existing active 'filter-item'
          filterContainer.querySelector(".active").classList.remove("active");
          // activate new 'filter-item'
          event.target.classList.add("active");
          const filterValue = event.target.getAttribute("data-filter");
          galleryItems.forEach((item) => {
            if (item.classList.contains(filterValue) || filterValue === 'all') {
              item.classList.remove("hide");
              item.classList.add("show");
            } else {
              item.classList.remove("show");
              item.classList.add("hide");
            }
          });
        }
      });
    </script>

  @endsection;
