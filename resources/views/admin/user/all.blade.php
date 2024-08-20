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
                  <p class="m-0 p-0">Manage Users</p>
                  <p class="m-0 p-0">Manage Users > All Users</p>
                </div>
                <div class="card-body">
                  @if (session('status'))
                    <div class="alert alert-success">
                      {{ session('status') }}
                    </div>
                  @endif

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
                              <span class="badge badge-success">Active</span>
                            @else
                              <span class="badge badge-danger">Inactive</span>
                            @endif
                          </td>
                          <td>
                            <a href="{{ route('admin.user.view', $user->id) }}" class="btn btn-sm btn-info">View</a>
                            <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-sm btn-success">Edit</a>

                            @if ($user->is_active)
                              <!-- Deactivate User Button -->
                              <button type="button" class="btn btn-sm btn-warning" 
                                onclick="deactivateUser({{ $user->id }})">
                                Deactivate
                              </button>
                            @else
                              <!-- Activate User Button -->
                              <button type="button" class="btn btn-sm btn-primary" 
                                onclick="activateUser({{ $user->id }})">
                                Activate
                              </button>
                            @endif

                            <!-- Delete User Form -->
                            <form id="delete-form-{{ $user->id }}"
                              action="{{ route('admin.user.delete', $user->id) }}" method="POST"
                              style="display: inline;">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-sm btn-danger"
                                onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
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
        <br><br><br><br>
      </div>
    </main>
  </div>

  <script>
    function activateUser(userId) {
        if (!confirm('Are you sure you want to activate this user?')) return;

        fetch(`/admin/user/${userId}/activate`, {
            method: 'PATCH',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            alert(data.message);
            location.reload(); // Reload the page to reflect changes
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }

    function deactivateUser(userId) {
        if (!confirm('Are you sure you want to deactivate this user?')) return;

        fetch(`/admin/user/${userId}/deactivate`, {
            method: 'PATCH',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            alert(data.message);
            location.reload(); // Reload the page to reflect changes
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }
  </script>
</x-app-layout>
