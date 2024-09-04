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

  input {
    widows: 50%;
  }

  .gallery {
    padding: 0px !important;
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
    {{--  --}}
    <div class="container mt-5">
      <div class="row">
        <!-- Search and Filters Section -->
        <div class="col-md-3">
          <form>
            <!-- Search Bar -->
            <div class="mb-3">
              <label for="search" class="form-label">Search</label>
              <div class="input-group">
                <form action="">
                  <input type="search" class="form-control" id="search" placeholder="Search events">
                  <button class="btn btn-primary" type="submit">Go</button>
                </form>
              </div>
            </div>

            <!-- Filter by Date -->
            <div class="mb-3">
              <label for="startDate" class="form-label">Start Date</label>
              <input type="date" class="form-control" id="startDate">
            </div>
            <div class="mb-3">
              <label for="endDate" class="form-label">End Date</label>
              <input type="date" class="form-control" id="endDate">
            </div>

            <!-- Location Field -->
            <div class="mb-3">
              <label for="location" class="form-label">Location</label>
              <input type="text" class="form-control" id="location" placeholder="Enter location">
            </div>

            <!-- Category Field -->
            <div class="mb-3">
              <label for="category" class="form-label">Category</label>
              <select class="form-select" id="category">
                <option selected>Select category</option>
                <option value="1">Music</option>
                <option value="2">Sports</option>
                <option value="3">Conferences</option>
                <option value="4">Workshops</option>
              </select>
            </div>

            <!-- Event Type -->
            <div class="mb-3">
              <label class="form-label">Event Type</label>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="eventType" id="onlineEvent" value="online">
                <label class="form-check-label" for="onlineEvent">
                  Online
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="eventType" id="offlineEvent" value="offline">
                <label class="form-check-label" for="offlineEvent">
                  Offline
                </label>
              </div>
            </div>

            <!-- Price Filter -->
            <div class="mb-3">
              <label for="priceRange" class="form-label">Price Range ($)</label>
              <input type="range" class="form-range" id="priceRange" min="0" max="1000" step="10"
                oninput="updatePriceRange(this.value)">
              <div class="mt-2">Selected Price: $<span id="priceRangeValue">500</span></div>
            </div>
          </form>
        </div>

        <!-- Event Listing Section -->
        <div class="col-md-9">
          <section class="gallery">
            <div class="container">
              <div class="row">
                <!-- gallery item start -->
                <div class="gallery-item shoe">
                  <div class="gallery-item-inner">
                    <img src="https://i.postimg.cc/7PJ4yYHh/revolt-164-6w-VEHf-I-unsplash.jpg" alt="shoe">
                    <div>
                      <small>admin</small>
                      <h3>heading</h3>
                      <p>paragraph of this and that those even are and these are those in this and these are thoser ins
                        thse
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
                      <p>paragraph of this and that those even are and these are those in this and these are thoser ins
                        thse
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
                      <p>paragraph of this and that those even are and these are those in this and these are thoser ins
                        thse
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
                      <p>paragraph of this and that those even are and these are those in this and these are thoser ins
                        thse
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
                      <p>paragraph of this and that those even are and these are those in this and these are thoser ins
                        thse
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
                      <p>paragraph of this and that those even are and these are those in this and these are thoser ins
                        thse
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
        </div>
      </div>
    </div>
    {{--  --}}
    {{-- gallery filter --}}
  </div>
  <script>
    // Function to update the displayed price range
    function updatePriceRange(value) {
      document.getElementById('priceRangeValue').textContent = value;
    }

    // Initialize with the default value
    document.addEventListener('DOMContentLoaded', function() {
      document.getElementById('priceRange').value = 500; // Set initial value
      updatePriceRange(500); // Update display with the initial value
    });
  </script>
@endsection
