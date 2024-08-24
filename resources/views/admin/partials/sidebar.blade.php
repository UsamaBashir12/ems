<!-- Sidebar -->
<nav class="col-md-3 bg-light p-3 left-sidebar shadow-sm" id="sidebar" style="height: 500px; overflow-y: auto;">
  <ul class="nav flex-column">
    <li class="nav-item">
      <a class="nav-link" href="{{ route('admin.dashboard') }}">
        <i class="bi bi-house-door"></i> Dashboard
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link dropdown-toggle" data-bs-toggle="collapse" href="#collapseEvents" role="button"
        aria-expanded="false" aria-controls="collapseEvents">
        <i class="bi bi-calendar-event"></i> Manage Events
      </a>
      <div class="collapse" id="collapseEvents">
        <ul class="nav flex-column ms-3">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('event.all') }}">All Events</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('event.add') }}">Add Event</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('event.categories') }}">Categories</a>
          </li>

        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link dropdown-toggle" data-bs-toggle="collapse" href="#collapseBookings" role="button"
        aria-expanded="false" aria-controls="collapseBookings">
        <i class="bi bi-journal"></i> Manage Bookings
      </a>
      <div class="collapse" id="collapseBookings">
        <ul class="nav flex-column ms-3">
          <li class="nav-item">
            <a class="nav-link" href="#">All Bookings</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Add Booking</a>
          </li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link dropdown-toggle" data-bs-toggle="collapse" href="#collapseUsers" role="button"
        aria-expanded="false" aria-controls="collapseUsers">
        <i class="bi bi-people"></i> Manage Users
      </a>
      <div class="collapse" id="collapseUsers">
        <ul class="nav flex-column ms-3">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.user.all') }}">All Users</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.user.add') }}">Add Users</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.user.organizers') }}">Organizers</a>
          </li>
          {{-- <li class="nav-item">
            <a class="nav-link" href="#">Customers</a>
          </li> --}}
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('admin.appSettings') }}">
        <i class="bi bi-gear"></i> App Settings
      </a>
    </li>
  </ul>
</nav>


<!-- JavaScript to handle dynamic active class -->
<script>
  // Get the current URL path
  const currentPath = window.location.pathname;

  // Loop through all the sidebar links
  document.querySelectorAll('#sidebar .nav-link').forEach(link => {
    // Get the href attribute from each link
    const linkPath = link.getAttribute('href');

    // Check if the current path matches the link's path
    if (currentPath.includes(linkPath)) {
      // Remove active class from all links
      document.querySelectorAll('#sidebar .nav-link').forEach(item => {
        item.classList.remove('active');
      });

      // Add active class to the matching link
      link.classList.add('active');
    }
  });
</script>
<style>
  #sidebar {
    background-color: #f8f9fa;
    border-right: 1px solid #e0e0e0;
  }

  #sidebar .nav-link {
    color: #333;
    padding: 10px 15px;
    border-radius: 5px;
    margin: 5px 0;
  }

  #sidebar .nav-link:hover {
    background-color: #007bff;
    color: #fff;
  }

  #sidebar .nav-link.active {
    background-color: #0056b3;
    color: #fff;
  }

  #sidebar .dropdown-toggle::after {
    float: right;
  }

  #sidebar .collapse .nav-link {
    padding-left: 25px;
  }

  #sidebar h4 {
    color: #0056b3;
    font-weight: bold;
  }
</style>
