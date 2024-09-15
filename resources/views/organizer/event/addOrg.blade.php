<x-app-layout>
  <div class="row">
    <!-- Left Sidebar -->
    @include('organizer.partials.sidebar')

    <!-- Right Sidebar -->
    <main class="col-md-9 p-3" id="content-area">
      <div id="add-event-content" class="content-pane">
        <div class="container mt-5">
          @if (auth()->check() && auth()->user()->role_id == 2)
            <div class="alert alert-info">
              Logged in as: {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}
            </div>
          @endif
          @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          <h1 class="mb-4">Add Event</h1>
          <form action="{{ route('organizer.addOrg.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-8">
                  <div class="form-group mb-3">
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}"
                      required>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group mb-3">
                    <label for="slug">Slug</label>
                    <input type="text" id="slug" name="slug" class="form-control" value="{{ old('slug') }}"
                      readonly>
                  </div>
                </div>

                <div class="form-group mb-3">
                  <label for="description">Description</label>
                  <textarea id="description" name="description" class="form-control" rows="4" required>{{ old('description') }}</textarea>
                </div>

                <div class="col-md-6">
                  <div class="form-group mb-3">
                    <label for="start_date">Start Date</label>
                    <input type="date" id="start_date" name="start_date" class="form-control"
                      value="{{ old('start_date') }}" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group mb-3">
                    <label for="start_time">Start Time</label>
                    <input type="time" id="start_time" name="start_time" class="form-control"
                      value="{{ old('start_time') }}" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group mb-3">
                    <label for="end_date">End Date</label>
                    <input type="date" id="end_date" name="end_date" class="form-control"
                      value="{{ old('end_date') }}" required>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group mb-3">
                    <label for="end_time">End Time</label>
                    <input type="time" id="end_time" name="end_time" class="form-control"
                      value="{{ old('end_time') }}" required>
                  </div>
                </div>
                <div class="form-group mb-3">
                  <label for="address">Address</label>
                  <input type="text" id="address" name="address" class="form-control" value="{{ old('address') }}"
                    required>
                </div>
                <div class="col-md-4">
                  <div class="form-group mb-3">
                    <label for="city">City</label>
                    <input type="text" id="city" name="city" class="form-control"
                      value="{{ old('city') }}" required>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group mb-3">
                    <label for="state">State</label>
                    <input type="text" id="state" name="state" class="form-control"
                      value="{{ old('state') }}" required>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group mb-3">
                    <label for="zip_code">Zip Code</label>
                    <input type="text" id="zip_code" name="zip_code" class="form-control"
                      value="{{ old('zip_code') }}" required>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group mb-3">
                    <label for="seats_available">Seats Available</label>
                    <input type="number" id="seats_available" name="seats_available" class="form-control"
                      value="{{ old('seats_available') }}" required>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group mb-3">
                    <label for="organizer_id">Organizer</label>
                    <select id="organizer_id" name="organizer_id" class="form-control">
                      <option value="{{ auth()->user()->id }}" selected>
                        {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}
                      </option>
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group mb-3">
                    <label for="category_id">Category</label>
                    <select id="category_id" name="category_id" class="form-control" required>
                      @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                          {{ old('category_id') == $category->id ? 'selected' : '' }}>
                          {{ $category->title }}
                        </option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group mb-3">
                    <label for="image">Image</label>
                    <input type="file" id="image" name="image" class="form-control">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group mb-3">
                    <label for="gallery">Gallery</label>
                    <input type="file" id="gallery" name="gallery[]" class="form-control" multiple>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="price">Price</label>
                    <input class="form-control" type="text" name="price" value="{{ old('price') }}" />
                  </div>
                </div>
              </div>
            </div>

















            <div class="form-group mb-3">
              <label for="status">Status</label>
              <select id="status" name="status" class="form-control" required>
                <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Active</option>
                <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Inactive</option>
              </select>
            </div>

            <button type="submit" class="btn btn-primary">Create Event</button>
          </form>

          <br><br><br><br>
        </div>
      </div>
    </main>
  </div>

  <!-- JavaScript to handle slug generation -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const titleInput = document.getElementById('title');
      const slugInput = document.getElementById('slug');

      titleInput.addEventListener('input', function() {
        const slug = generateSlug(this.value);
        slugInput.value = slug;
      });

      function generateSlug(text) {
        return text
          .toString()
          .toLowerCase()
          .trim()
          .replace(/[^a-z0-9 -]/g, '') // Remove invalid characters
          .replace(/\s+/g, '-') // Replace spaces with dashes
          .replace(/-+/g, '-'); // Replace multiple dashes with a single dash
      }
    });
  </script>
</x-app-layout>
