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
        {{-- search bar --}}
        <div class="container d-flex justify-content-center align-items-center mt-3">
          <div class="search-container p-3 bg-light rounded shadow">
            <div class="d-flex align-items-center">
              <select class="form-select me-2 select-category" aria-label="Select Category">
                <option selected>Choose Category</option>
                <option value="1">Category 1</option>
                <option value="2">Category 2</option>
                <option value="3">Category 3</option>
              </select>
              <input type="text" class="form-control me-2 search-input" placeholder="Search..." aria-label="Search">
              <button class="btn btn-primary search-button">Search</button>
            </div>
          </div>

        </div>
        {{-- gallery filter --}}
        <section class="gallery">
          <div class="container">
            <div class="row">
              <div class="gallery-filter">
                <span class="filter-item active" data-filter="all">All</span>
                <span class="filter-item" data-filter="shoe">Wedding</span>
                <span class="filter-item" data-filter="headphone">Business</span>
                <span class="filter-item" data-filter="camera">Career</span>
              </div>
            </div>
            <div class="row">
              <!-- gallery item start -->
              <div class="gallery-item shoe">
                <div class="gallery-item-inner">
                  <img src="https://i.postimg.cc/7PJ4yYHh/revolt-164-6w-VEHf-I-unsplash.jpg" alt="shoe">
                  <div>
                    <small>admin</small>
                    <h3>heading</h3>
                    <p>paragraph of this and that those even are and these are those in this and these are thoser ins thse
                      ar ehtos ein these.</p>
                    <div class="container-fluid">
                      <div class="row">
                        <div class="col-md-6 m-0 p-0 ">
                          Wilton , United States
                        </div>
                        <div class="col-md-6 m-0 p-0 text-end">
                          <span class="text-primary">$95</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- gallery item end -->
              <!-- gallery item start -->
              <div class="gallery-item headphone">
                <div class="gallery-item-inner">
                  <img src="https://i.postimg.cc/zf7MT4q9/istockphoto-1289318271-170667a.jpg" alt="headphone">
                  <div>
                    <small>admin</small>
                    <h3>heading</h3>
                    <p>paragraph of this and that those even are and these are those in this and these are thoser ins thse
                      ar ehtos ein these.</p>
                    <div class="container-fluid">
                      <div class="row">
                        <div class="col-md-6 m-0 p-0 ">
                          Wilton , United States
                        </div>
                        <div class="col-md-6 m-0 p-0 text-end">
                          <span class="text-primary">$95</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- gallery item end -->
              <!-- gallery item start -->
              <div class="gallery-item camera">
                <div class="gallery-item-inner">
                  <img src="https://i.postimg.cc/vZ7QQdMP/nordwood-themes-F3-Dde-9thd8-unsplash.jpg" alt="camera">
                  <div>
                    <small>admin</small>
                    <h3>heading</h3>
                    <p>paragraph of this and that those even are and these are those in this and these are thoser ins thse
                      ar ehtos ein these.</p>
                    <div class="container-fluid">
                      <div class="row">
                        <div class="col-md-6 m-0 p-0 ">
                          Wilton , United States
                        </div>
                        <div class="col-md-6 m-0 p-0 text-end">
                          <span class="text-primary">$95</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- gallery item end -->
              <!-- gallery item start -->
              <div class="gallery-item headphone">
                <div class="gallery-item-inner">
                  <img src="https://i.postimg.cc/3xTY15HR/c-d-x-PDX-a-82obo-unsplash.jpg" alt="headphone">
                  <div>
                    <small>admin</small>
                    <h3>heading</h3>
                    <p>paragraph of this and that those even are and these are those in this and these are thoser ins thse
                      ar ehtos ein these.</p>
                    <div class="container-fluid">
                      <div class="row">
                        <div class="col-md-6 m-0 p-0 ">
                          Wilton , United States
                        </div>
                        <div class="col-md-6 m-0 p-0 text-end">
                          <span class="text-primary">$95</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- gallery item end -->
              <!-- gallery item start -->
              <div class="gallery-item camera">
                <div class="gallery-item-inner">
                  <img src="https://i.postimg.cc/PrYL89TD/patrick-dozk-Vh-Dyvh-Q-unsplash.jpg" alt="camera">
                  <div>
                    <small>admin</small>
                    <h3>heading</h3>
                    <p>paragraph of this and that those even are and these are those in this and these are thoser ins thse
                      ar ehtos ein these.</p>
                    <div class="container-fluid">
                      <div class="row">
                        <div class="col-md-6 m-0 p-0 ">
                          Wilton , United States
                        </div>
                        <div class="col-md-6 m-0 p-0 text-end">
                          <span class="text-primary">$95</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- gallery item end -->
              <!-- gallery item start -->
              <div class="gallery-item headphone">
                <div class="gallery-item-inner">
                  <img src="https://i.postimg.cc/PqYyN2Nr/ervo-rocks-Zam8-Tv-Eg-N5o-unsplash.jpg" alt="headphone3">
                  <div>
                    <small>admin</small>
                    <h3>heading</h3>
                    <p>paragraph of this and that those even are and these are those in this and these are thoser ins thse
                      ar ehtos ein these.</p>
                    <div class="container-fluid">
                      <div class="row">
                        <div class="col-md-6 m-0 p-0 ">
                          Wilton , United States
                        </div>
                        <div class="col-md-6 m-0 p-0 text-end">
                          <span class="text-primary">$95</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- gallery item end -->
            </div>
          </div>
        </section>
        {{--  --}}
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
    {{--  --}}

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
