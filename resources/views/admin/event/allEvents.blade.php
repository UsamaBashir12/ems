<x-app-layout>
  <style>
    /* Add your custom styles here */
    .card-header {
      background-color: #007bff;
      color: white;
    }

    .table th,
    .table td {
      text-align: center;
      vertical-align: middle;
    }

    .table thead {
      background-color: #f8f9fa;
    }

    .table-bordered {
      border: 1px solid #dee2e6;
    }

    .table-hover tbody tr:hover {
      background-color: #f1f1f1;
    }

    .content-pane {
      padding: 20px;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .card-body {
      padding: 1.5rem;
    }

    .card {
      margin-bottom: 20px;
    }

    .row {
      margin: 0;
    }

    .main-content {
      padding: 1rem;
    }
  </style>

  <div class="container-fluid">
    <div class="row">
      <!-- Left Sidebar -->
      @include('admin.partials.sidebar')

      <!-- Main Content Area -->
      <main class="col-md-9 p-3">
        <div id="add-event-content" class="content-pane">
          <div class="card">
            <div class="card-header">
              <h3 class="m-0">Manage Events</h3>
            </div>
            <div class="card-body">
              <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Location</th>
                    <th>Organizer</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($events as $event)
                    <tr class="text-justify">
                      <td>{{ $event->id }}</td>
                      <td>{{ $event->title }}</td>
                      <td style="text-align: justify">{{ $event->description }}</td>
                      <td>{{ \Carbon\Carbon::parse($event->start_date)->format('d-m-Y') }}</td>
                      <td>{{ \Carbon\Carbon::parse($event->end_date)->format('d-m-Y') }}</td>
                      <td>{{ $event->address }}</td>
                      <td>{{ $event->organizer }}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>

  <!-- Optional Custom JS to handle link clicks -->
  <script>
    // Add any custom JavaScript here if needed
  </script>
</x-app-layout>
