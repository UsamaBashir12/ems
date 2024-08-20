<x-app-layout>
  </style>
  <div class="row">
    <!-- Left Sidebar -->
    @include('admin.partials.sidebar')

    <!-- Right Sidebar -->
    <main class="col-md-9 p-3" id="content-area">
      <div id="dashboard-content" class="content-pane">
        <!-- Dashboard Cards -->
        <div class="container my-4">
          <div class="row g-4">
            <!-- Events Card -->
            <div class="col-lg-3 col-md-6 mb-4">
              <div class="card shadow-lg border-0 rounded-lg h-100">
                <div class="card-body text-center">
                  <h4 class="card-title mb-3">Events</h4>
                  <p class="display-4 text-primary mb-3">{{ $eventCount }}</p>
                  <p class="text-muted">Number of events scheduled</p>
                </div>
              </div>
            </div>
            <!-- Categories Card -->
            <div class="col-lg-3 col-md-6 mb-4">
              <div class="card shadow-lg border-0 rounded-lg h-100">
                <div class="card-body text-center">
                  <h4 class="card-title mb-3">Categories</h4>
                  <p class="display-4 text-success mb-3">{{ $categoryCount }}</p>
                  <p class="text-muted">Total categories available</p>
                </div>
              </div>
            </div>
            <!-- Organizers Card -->
            <div class="col-lg-3 col-md-6 mb-4">
              <div class="card shadow-lg border-0 rounded-lg h-100">
                <div class="card-body text-center">
                  <h4 class="card-title mb-3">Organizers</h4>
                  <p class="display-4 text-warning mb-3">{{ $organizerCount }}</p>
                  <p class="text-muted">Organizers currently involved</p>
                </div>
              </div>
            </div>
            <!-- Users Card -->
            <div class="col-lg-3 col-md-6 mb-4">
              <div class="card shadow-lg border-0 rounded-lg h-100">
                <div class="card-body text-center">
                  <h4 class="card-title mb-3">Users</h4>
                  <p class="display-4 text-danger mb-3">{{ $userCount }}</p>
                  <p class="text-muted">Total number of users</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Upcoming Events Table -->
        <div class="container-fluid">
          <div class="row my-4">
            <div class="col-12">
              <h3 class="text-center my-3">Upcoming Events</h3>
              <div class="table-responsive">
                <table class="table table-hover table-striped text-center">
                  <thead class="table-dark">
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Organizer</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>Usama</td>
                      <td>Old</td>
                      <td>Active</td>
                      <td>
                        <a href="#" class="btn btn-sm btn-primary">View</a>
                        <a href="#" class="btn btn-sm btn-success">Edit</a>
                        <a href="#" class="btn btn-sm btn-danger">Delete</a>
                      </td>
                    </tr>
                    <!-- Add more rows as needed -->
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <!-- Categories Table -->
          <div class="row my-4">
            <div class="col-12">
                <h3 class="text-center my-3">Categories</h3>
                <div class="table-responsive">
                    <table class="table table-hover table-striped text-center">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $category->title }}</td>
                                <td>
                                    <a href="{{ route('admin.category.view', $category->id) }}" class="btn btn-sm btn-primary">View</a>
                                    <a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-sm btn-success">Edit</a>
                                    <form action="{{ route('admin.category.delete', $category->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        </div>
      </div>
    </main>

  </div>

  <!-- Custom JS to handle link clicks -->
</x-app-layout>
