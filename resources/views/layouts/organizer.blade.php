<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title') - Organizer Dashboard</title>
  <!-- Include CSS files -->
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('bootstrap-5.3.3-dist/css/bootstrap.min.css') }}">
  <!-- Add any additional CSS here -->
</head>

<body>
  <header>
    <nav>
      <!-- Add your navigation menu here -->
      <ul>
        {{-- <li><a href="{{ route('organizer.dashboard') }}">Dashboard</a></li> --}}
        {{-- <li><a href="{{ route('organizer.events') }}">Events</a></li> --}}
        {{-- <li><a href="{{ route('organizer.profile') }}">Profile</a></li> --}}
        <!-- Add more links as needed -->
      </ul>
    </nav>
  </header>

  <main>
    @yield('content') <!-- This is where the content of each page will be injected -->
  </main>

  <footer>
    <p>&copy; {{ date('Y') }} Your Company Name. All rights reserved.</p>
  </footer>

  <!-- Include JS files -->
  <script src="{{ asset('js/app.js') }}"></script>
  <script src={{ asset('bootstrap-5.3.3-dist/js/bootstrap.min.js') }}></script>
  <!-- Add any additional JS here -->
</body>

</html>
