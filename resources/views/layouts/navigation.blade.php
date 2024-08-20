<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom">
  <div class="container">
    <!-- Logo -->
    <a class="navbar-brand" href="{{ route('admin.dashboard') }}">
      <x-application-logo class="d-inline-block align-top" style="height: 36px; width: auto;" />
    </a>

    <!-- Hamburger Button for Mobile -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navigation Links -->
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
            {{ __('Dashboard') }}
          </a>
        </li>
        <!-- Add more navigation links here -->
      </ul>

      <!-- User Dropdown Menu -->
      @auth
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 d-flex align-items-center justify-content-center">
          <li>
            <a href="#" class="position-relative">
              <i class="bx bxs-bell fs-2"></i>
              <span
                class="position-absolute top-1 start-100 translate-middle p-2 bg-danger border border-light rounded-circle">
                <span class="visually-hidden">New alerts</span>
              </span>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
              data-bs-toggle="dropdown" aria-expanded="false">
              {{ Auth::user()->name }}
              <div class="profile-design d-inline-block">
                <img src="{{ asset('images/profile.png') }}" alt="profile_image" class="w-100">
              </div>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="{{ route('profile.edit') }}">{{ __('Profile') }}</a></li>
              <li>
                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                               this.closest('form').submit();">
                    {{ __('Log Out') }}
                  </a>
                </form>
              </li>
            </ul>
          </li>
        </ul>
      @endauth
    </div>
  </div>
</nav>
