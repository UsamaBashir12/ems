  {{-- top-bar --}}
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12 d-flex justify-content-between border-bottom p-2">
        <p class="m-0 p-0">Usamab@mudsoft.tech</p>
        <header>
          @if (Route::has('login'))
            <nav>
              @auth
                @if (auth()->user()->role_id === 1)
                  <a href="{{ url('/admin/dashboard') }}" class="text-decoration-none">
                    Dashboard
                  </a>
                @elseif (auth()->user()->role_id === 2)
                  <a href="{{ url('/organizer/dashboard') }}" class="text-decoration-none">
                    Organizer Dashboard
                  </a>
                @elseif (auth()->user()->role_id === 3)
                  <a href="{{ url('/user/dashboard') }}" class="text-decoration-none">
                    User Dashboard
                  </a>
                @else
                  <a href="{{ url('/home') }}" class="text-decoration-none">
                    Home
                  </a>
                @endif

                <a href="{{ url('/logout') }}" class="text-decoration-none">
                  Log out
                </a>
              @else
                <a href="{{ route('login') }}" class="text-decoration-none">
                  Log in
                </a>

                @if (Route::has('register'))
                  <a href="{{ route('register') }}" class="text-decoration-none">
                    Register
                  </a>
                @endif
              @endauth
            </nav>
          @endif
        </header>
      </div>
    </div>
  </div>

  {{-- navbar --}}
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <!-- Logo on the left side -->
      <a class="navbar-brand" href="{{ route('home') }}">
        LOGO
      </a>

      <!-- Toggler for mobile view -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Navbar items -->
      <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
        <!-- Centered nav links -->
        <ul class="navbar-nav mx-auto">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('events') }}">Events</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
        </ul>
        <style>

        </style>

        <!-- Buttons on the right side -->
        <div class="d-flex">
          <!-- Customer button with dropdown -->
          <div class="btn-group me-2">
            <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown"
              aria-expanded="false">
              @auth
                <!-- Show the logged-in user's name -->
                Logged In: {{ Auth::user()->first_name }} <!-- Adjust this if you want to display a specific field like first_name -->
              @else
                Customer
              @endauth
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
              @auth
                <!-- Display logout option for authenticated users -->
                <li><a class="dropdown-item" href="{{ route('user.dashboard') }}">Dashboard</a></li>
                <li><a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
              @else
                <!-- Display login and signup options for unauthenticated users -->
                <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
                <li><a class="dropdown-item" href="{{ route('register') }}">Signup</a></li>
              @endauth
            </ul>
          </div>

          <!-- Organizer button with dropdown -->
          <div class="btn-group">
            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
              aria-expanded="false">
              @auth
                <!-- Show the logged-in user's name if the user is an organizer -->
                @if (Auth::user()->role_id == 2)
                  <!-- Assuming '2' is the Organizer role -->
                  {{ Auth::user()->name }} <!-- Adjust this if needed -->
                @else
                  Organizer
                @endif
              @else
                Organizer
              @endauth
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
              @auth
                @if (Auth::user()->role_id == 2)
                  <!-- Display organizer-specific options for authenticated organizers -->
                  <li><a class="dropdown-item" href="{{ route('organizer.dashboard') }}">Dashboard</a></li>
                  <li><a class="dropdown-item" href="{{ route('logout') }}"
                      onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                  </form>
                @else
                  <!-- Display login and signup options for unauthenticated users -->
                  <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
                  <li><a class="dropdown-item" href="{{ route('register') }}">Signup</a></li>
                @endif
              @else
                <!-- Display login and signup options for unauthenticated users -->
                <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
                <li><a class="dropdown-item" href="{{ route('register') }}">Signup</a></li>
              @endauth
            </ul>
          </div>
        </div>
        {{-- @if (Auth::check())
          <p>Logged in as: {{ Auth::user()->first_name }}</p>
        @else
          <p>Not logged in</p>
        @endif --}}

      </div>
    </div>
  </nav>
  <script>
    // Select all dropdown toggles and bind hover events
    document.querySelectorAll('.btn-group').forEach((dropdown) => {
      // Show dropdown on mouse enter
      dropdown.addEventListener('mouseenter', () => {
        const toggle = dropdown.querySelector('.dropdown-toggle');
        const menu = dropdown.querySelector('.dropdown-menu');

        // Show dropdown menu
        toggle.classList.add('show');
        menu.classList.add('show');
        menu.style.top = `${toggle.offsetHeight}px`; // Ensure dropdown is below the button
        menu.style.left = '0'; // Align dropdown with the button
      });

      // Hide dropdown on mouse leave
      dropdown.addEventListener('mouseleave', () => {
        const toggle = dropdown.querySelector('.dropdown-toggle');
        const menu = dropdown.querySelector('.dropdown-menu');

        // Hide dropdown menu
        toggle.classList.remove('show');
        menu.classList.remove('show');
      });
    });
  </script>
