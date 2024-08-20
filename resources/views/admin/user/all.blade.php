<x-app-layout>
  <div class="row">
    <!-- Left Sidebar -->
    @include('admin.partials.sidebar')

    <!-- Right Sidebar -->
    <main class="col-md-9 p-3" id="content-area">
      <div id="addUser-content" class="content-pane">
        <div class="container mt-5">
          <div class="row justify-content-center">
            <div class="col-md-8 w-100">
              <div class="card">
                <div class="card-header bg-dark text-white d-flex justify-content-between">
                  <p class="m-0 p-0">
                    Manage Users
                  </p>
                  <p class="m-0 p-0">
                    Manage Users > All Users
                  </p>
                </div>
                <div class="card-body">
                  <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($users as $user)
                        <tr>
                          <td>{{ $user->id }}</td>
                          <td>{{ $user->first_name }}</td>
                          <td>
                            @if ($user->is_active)
                              <a href="#" class="btn btn-sm btn-success">Active</a>
                            @else
                              <a href="#" class="btn btn-sm btn-danger">Inactive</a>
                            @endif
                            <!-- Add select options if needed -->
                          </td>
                          <td>
                            <a href="{{ route('admin.user.view', $user->id) }}" class="btn btn-sm btn-info">View</a>
                            <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-sm btn-success">Edit</a>
                            <a href="{{ route('admin.user.delete', $user->id) }}"
                              class="btn btn-sm btn-danger">Delete</a>
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
        <br><br><br><br>
      </div>
    </main>
  </div>
</x-app-layout>
