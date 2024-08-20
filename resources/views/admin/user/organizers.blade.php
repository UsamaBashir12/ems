<!-- resources/views/admin/user/organizers.blade.php -->

<x-app-layout>
  <div class="row">
    <!-- Left Sidebar -->
    @include('admin.partials.sidebar')

    <!-- Right Sidebar -->
    <main class="col-md-9 p-3" id="content-area">
      <div id="addUser-content" class="content-pane">
        <div class="container mt-5">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header bg-dark text-white d-flex justify-content-between">
                  <p class="m-0 p-0">
                    Manage Organizers
                  </p>
                  <p class="m-0 p-0">
                    Manage Users > Organizers
                  </p>
                </div>
                <div class="card-body">
                  <table class="table table-striped w-100 table-hover">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($organizers as $organizer)
                        <tr>
                          <td>{{ $organizer->id }}</td>
                          <td>{{ $organizer->first_name }}</td>
                          <td>{{ $organizer->last_name }}</td>
                          <td>
                            <a href="{{ route('admin.user.view', $organizer->id) }}"
                              class="btn btn-sm btn-info">View</a>
                            <a href="{{ route('admin.user.edit', $organizer->id) }}"
                              class="btn btn-sm btn-success">Edit</a>
                            <form action="{{ route('admin.user.delete', $organizer->id) }}" method="POST"
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
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>

  <!-- Custom JS to handle link clicks -->
</x-app-layout>
