<x-app-layout>
  <style>
    /* Add any custom styles here */
  </style>
  <div class="row">
    <!-- Left Sidebar -->
    @include('organizer.partials.sidebar')

    <!-- Main Content Area -->
    <main class="col-md-9 p-3" id="content-area">
      <div id="dashboard-content" class="content-pane">
        <!-- Dashboard Cards -->
        <div class="container my-4">
          <div class="row g-4">
            <!-- Events Card -->
            <div class="col-lg-6 col-md-6 mb-4">
              <div class="card shadow-lg border-0 rounded-lg h-100">
                <div class="card-body text-center">
                  <h4 class="card-title mb-3">Events</h4>
                  <p class="display-4 text-primary mb-3">{{ $eventCount }}</p>
                  <p class="text-muted">Number of events scheduled</p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="container-fluid">
          <div class="row my-4">
            <div class="col-12">
              <h3 class="text-center my-3">Your Upcoming Events</h3>

              @if ($events->isEmpty())
                <p class="text-center">No upcoming events found.</p>
              @else
                <div class="table-responsive mb-4">
                  <table class="table table-hover table-striped text-center">
                    <thead class="thead-dark">
                      @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                      @endif

                      @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                      @endif

                      <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($events as $event)
                        <tr>
                          <td>{{ $event->id }}</td>
                          <td>{{ $event->title }}</td>
                          <td>{{ $event->status == 1 ? 'Active' : 'Inactive' }}</td>
                          <td>
                            <a href="{{ route('organizer.event.show', $event->id) }}"
                              class="btn btn-sm btn-primary">View</a>
                            <a href="{{ route('organizer.event.edit', $event->id) }}"
                              class="btn btn-sm btn-success">Edit</a>
                            <form action="{{ route('organizer.event.destroy', $event->id) }}" method="POST"
                              style="display:inline;">
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
              @endif
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
</x-app-layout>
