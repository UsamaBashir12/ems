<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
  {{-- Bootstrap links --}}
  <link rel="stylesheet" href="{{ asset('bootstrap-5.3.3-dist/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('bootstrap-5.3.3-dist/css/bootstrap.bundle.css') }}">
  {{-- styling --}}
  <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
  {{-- <link rel="stylesheet" href="{{ asset('css/admins.css') }}"> --}}
  {{-- box icons --}}
  <link rel="stylesheet" href="{{ asset('boxicons-2.1.4/css/box-icons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('boxicons-2.1.4/css/boxicons.css') }}">
  <!-- Additional CSS Files -->
  @stack('styles')
</head>

<body>
  <!-- Header -->
  <header>
    @include('partials.header')
  </header>

  <!-- Main Content -->
  <main>
    @yield('content')
  </main>

  <!-- Footer -->
  <footer>
    @include('partials.footer')
  </footer>

  <!-- Include your JS files -->
  <script src="{{ asset('js/script.js') }}"></script>
  <script src="{{ asset('bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('bootstrap-5.3.3-dist/js/bootstrap.min.js') }}"></script>
  <!-- Additional JS Files -->
  @stack('scripts')
</body>

</html>
