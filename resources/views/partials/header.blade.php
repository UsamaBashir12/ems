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
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">LOGO</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav m-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Events</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Organizers</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Categories</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Blog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
