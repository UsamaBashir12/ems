@extends('layouts.layout')

@section('title', 'HOME PAGE')
@section('content')
  {{-- banner hero --}}
  <div class="container-fluid">
    <div class="row p-0">
      <div class="col-md-12 p-0">
        <div class="banner-img-setting">
          <img src="{{ asset('images/banners.jpg') }}" alt="" class="w-100 h-100">
        </div>
      </div>
    </div>
  </div>
  {{-- upcoming events --}}
  <div class="container my-5">
    <h2 class="fw-bold my-5 text-center">UP COMING EVENTS</h2>
    <div class="row card-header-style d-flex flex-wrap">
      {{--  --}}
      <div class="col-md-4">
        <a href="{{ route('eventDetails') }}" class="text-decoration-none">
          <div class="card h-100">
            <div class="card-header">
              <img src="{{ asset('images/events/event_1.png') }}" alt="event_1 image" class="w-100">
            </div>
            <div class="card-body">
              <h3>Title of events</h3>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum sapiente nesciunt perferendis impedit
                suscipit expedita porro reiciendis mollitia quasi totam?
              </p>
            </div>
            <div class="card-footer d-flex justify-content-between">
              <p>location</p>
              <p>price</p>
            </div>
          </div>
        </a>
      </div>
      {{--  --}}
      <div class="col-md-4">
        <a href="{{ route('eventDetails') }}" class="text-decoration-none">
          <div class="card h-100">
            <div class="card-header">
              <img src="{{ asset('images/events/event_2.png') }}" alt="event_1 image" class="w-100">
            </div>
            <div class="card-body">
              <h3>Title of events</h3>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum sapiente nesciunt perferendis impedit
                suscipit expedita porro
              </p>
            </div>
            <div class="card-footer d-flex justify-content-between">
              <p>location</p>
              <p>price</p>
            </div>
          </div>
        </a>
      </div>
      {{--  --}}
      <div class="col-md-4">
        <a href="{{ route('eventDetails') }}" class="text-decoration-none">
          <div class="card h-100">
            <div class="card-header">
              <img src="{{ asset('images/events/event_3.png') }}" alt="event_1 image" class="w-100">
            </div>
            <div class="card-body">
              <h3>Title of events</h3>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum sapiente nesciunt perferendis impedit
                suscipit expedita porro reiciendis mollitia quasi totam? Sequi velit ea nulla voluptate, ipsa
                praesentium
                autem ducimus minima.
              </p>
            </div>
            <div class="card-footer d-flex justify-content-between">
              <p>location</p>
              <p>price</p>
            </div>
          </div>
        </a>
      </div>
    </div>
  </div>
  {{-- Explore Categories --}}
  <div class="container my-5">
    <h3 class="my-5 text-center">Explore Categories</h3>
    <div class="row d-flex flex-wrap">
      <div class="col">
        <div class="card h-100">
          <div class="card-header">
            <img src="{{ asset('images/categories/category_1.png') }}" alt="" class="w-100">
          </div>
          <div class="card-footer">
            <p>Category Name</p>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card h-100">
          <div class="card-header">
            <img src="{{ asset('images/categories/category_1.png') }}" alt="" class="w-100">
          </div>
          <div class="card-footer">
            <p>Category Name</p>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card h-100">
          <div class="card-header">
            <img src="{{ asset('images/categories/category_1.png') }}" alt="" class="w-100">
          </div>
          <div class="card-footer">
            <p>Category Name</p>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card h-100">
          <div class="card-header">
            <img src="{{ asset('images/categories/category_1.png') }}" alt="" class="w-100">
          </div>
          <div class="card-footer">
            <p>Category Name</p>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card h-100">
          <div class="card-header">
            <img src="{{ asset('images/categories/category_1.png') }}" alt="" class="w-100">
          </div>
          <div class="card-footer">
            <p>Category Name</p>
          </div>
        </div>
      </div>
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
@endsection;
