<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="{{ asset('bootstrap-5.3.3-dist/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('boxicons-2.1.4/css/boxicons.min.css') }}">
  <!-- Optional: Custom CSS -->
  <link rel="stylesheet" href="{{ asset('css/admins.css') }}">

  <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
</head>

<body>
  <div class="d-flex flex-column min-vh-100 bg-light">
    @include('layouts.navigation')

    <!-- Page Heading -->
    @isset($header)
      <header class="bg-white shadow-sm">
        <div class="container py-3">
          {{ $header }}
        </div>
      </header>
    @endisset

    <!-- Page Content -->
    <main class="flex-grow-1">
      <div class="container-fluid">
        {{ $slot }}
      </div>
    </main>

    <!-- Optional: Footer -->
    <footer class="bg-white border-top">
      <div class="container py-3">
        <p class="text-center mb-0">© {{ date('Y') }} {{ config('app.name', 'Laravel') }}. All rights reserved.</p>
      </div>
    </footer>
  </div>

  <!-- Bootstrap JS and Popper.js -->
  <script src="{{ asset('bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
