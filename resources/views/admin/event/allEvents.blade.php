<x-app-layout>
  <style>
    /* Add your custom styles here */
  </style>
  <div class="row">
    <!-- Left Sidebar -->
    @include('admin.partials.sidebar')

    <!-- Right Sidebar -->
    <main class="col-md-9 p-3" id="content-area">
      <div id="add-event-content" class="content-pane">
        <div class="card">
          <div class="card-header bg-primary text-white">
            <h3 class="m-0 p-0">Manage Events</h3>
          </div>
          <div class="card-body">
            <table class="w-100 table-hover table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Title</th>
                  <th>Description</th> <!-- Add more columns as needed -->
                  <th>Date</th>
                  <th>Location</th>
                  <th>Organizer</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($events as $event)
                  <tr>
                    <td>{{ $event->id }}</td>
                    <td>{{ $event->title }}</td>
                    <td>{{ $event->description }}</td> <!-- Display event description -->
                    <td>{{ $event->date }}</td> <!-- Display event date -->
                    <td>{{ $event->location }}</td> <!-- Display event location -->
                    <td>{{ $event->organizer }}</td> <!-- Display event organizer -->
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </main>
  </div>
  <!-- Custom JS to handle link clicks -->
</x-app-layout>
