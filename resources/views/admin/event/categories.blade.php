<!-- resources/views/admin/event/categories.blade.php -->
<x-app-layout>
  <div class="row">
    <!-- Left Sidebar -->
    @include('admin.partials.sidebar')

    <!-- Right Sidebar -->
    <main class="col-md-9 p-3" id="content-area">
      <div id="add-event-content" class="content-pane">
        <div class="container mt-5">
          <h1>Add Category</h1>
          <form action="{{ route('admin.category.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="title">Title</label>
              <input type="text" id="title" name="title" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="description">Description</label>
              <textarea id="description" name="description" class="form-control" rows="4" required></textarea>
            </div>
            <div class="form-group">
              <label for="parent_id">Parent Category</label>
              <select id="parent_id" name="parent_id" class="form-control">
                <option value="">None</option>
                <!-- Populate categories dynamically -->
                @foreach ($categories as $category)
                  <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="image">Image</label>
              <input type="file" id="image" name="image" class="form-control">
            </div>
            <div class="form-group">
              <label for="status">Status</label>
              <select id="status" name="status" class="form-control">
                <option value="1">Active</option>
                <option value="0">Inactive</option>
              </select>
            </div>
            <button type="submit" class="btn btn-primary">Create Category</button>
          </form>
          <br><br><br>
        </div>
      </div>
    </main>
  </div>
</x-app-layout>
