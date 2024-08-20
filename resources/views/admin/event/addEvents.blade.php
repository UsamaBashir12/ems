<x-app-layout>
  <div class="row">
    <!-- Left Sidebar -->
    @include('admin.partials.sidebar')

    <!-- Right Sidebar -->
    <main class="col-md-9 p-3a" id="content-area">
      <div id="add-event-content" class="content-pane">
        <div class="container mt-5">
          <h1>Add Event</h1>
          <form action="{{ route('admin.events.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="title">Title</label>
              <input type="text" id="title" name="title" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="slug">Slug</label>
              <input type="text" id="slug" name="slug" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="description">Description</label>
              <textarea id="description" name="description" class="form-control" rows="4" required></textarea>
            </div>
            <div class="form-group">
              <label for="organizer_id">Organizer</label>
              <select id="organizer_id" name="organizer_id" class="form-control" required>
                @foreach ($users as $user)
                  <option value="{{ $user->id }}">{{ $user->first_name }} {{ $user->last_name }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="category_id">Category</label>
              <select id="category_id" name="category_id" class="form-control" required>
                @foreach ($categories as $category)
                  <option value="{{ $category->id }}" class="text-dark">{{ $category->title }}</option>
                @endforeach
              </select>
            </div>
            <!-- Other form fields here -->
            <div class="form-group">
              <label for="start_date">Start Date</label>
              <input type="date" id="start_date" name="start_date" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="start_time">Start Time</label>
              <input type="time" id="start_time" name="start_time" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="end_date">End Date</label>
              <input type="date" id="end_date" name="end_date" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="end_time">End Time</label>
              <input type="time" id="end_time" name="end_time" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="address">Address</label>
              <input type="text" id="address" name="address" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="city">City</label>
              <input type="text" id="city" name="city" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="state">State</label>
              <input type="text" id="state" name="state" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="zip_code">Zip Code</label>
              <input type="text" id="zip_code" name="zip_code" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="seats_available">Seats Available</label>
              <input type="number" id="seats_available" name="seats_available" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="image">Image</label>
              <input type="file" id="image" name="image" class="form-control">
            </div>
            <div class="form-group">
              <label for="gallery">Gallery</label>
              <input type="file" id="gallery" name="gallery[]" class="form-control" multiple>
            </div>
            <div class="form-group">
              <label for="status">Status</label>
              <select id="status" name="status" class="form-control" required>
                <option value="1">Active</option>
                <option value="0">Inactive</option>
              </select>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Create Event</button>
          </form>
          <br><br><br><br>
        </div>
      </div>
    </main>
  </div>

  <!-- Custom JS to handle link clicks -->
</x-app-layout>
