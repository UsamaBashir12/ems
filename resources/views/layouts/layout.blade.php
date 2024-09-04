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
  <style>
    /*.gallery*/
    .gallery {
      width: 100%;
      display: block;
      min-height: 100vh;
      /* background-color: #2a2932; */
      padding: 100px 0;
    }

    .gallery .gallery-filter {
      padding: 0 15px;
      width: 100%;
      text-align: center;
      margin-bottom: 20px;
    }

    .gallery .gallery-filter .filter-item {
      color: #ffffff;
      font-size: 18px;
      text-transform: uppercase;
      display: inline-block;
      margin: 0 10px;
      cursor: pointer;
      border-bottom: 2px solid transparent;
      line-height: 1.2;
      transition: all 0.3s ease;
    }

    .gallery .gallery-filter .filter-item.active {
      color: #ff9800;
      border-color: #ff9800;
    }

    .gallery .gallery-item {
      width: calc(100% / 3);
      padding: 15px;
    }

    .gallery .gallery-item-inner img {
      width: 100%;
    }

    .gallery .gallery-item.show {
      animation: fadeIn 0.5s ease;
    }

    .filter-item {
      color: black !important;
    }

    @keyframes fadeIn {
      0% {
        opacity: 0;
      }

      100% {
        opacity: 1;
      }
    }

    .gallery .gallery-item.hide {
      display: none;
    }

    /*responsive*/
    @media(max-width: 991px) {
      .gallery .gallery-item {
        width: 50%;
      }
    }

    @media(max-width: 767px) {
      .gallery .gallery-item {
        width: 100%;
      }

      .gallery .gallery-filter .filter-item {
        margin-bottom: 10px;
      }
    }
  </style>
  <style>
    /* Container styling */
    .search-container {
      background-color: #f8f9fa;
      border-radius: 8px;
      padding: 20px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    /* Select dropdown styling */
    .select-category {
      max-width: 200px;
      border: 1px solid #ddd;
      border-radius: 5px;
      transition: border-color 0.3s;
    }

    .select-category:focus {
      border-color: #007bff;
      box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }

    /* Search input styling */
    .search-input {
      max-width: 300px;
      border: 1px solid #ddd;
      border-radius: 5px;
      transition: border-color 0.3s;
    }

    .search-input:focus {
      border-color: #007bff;
      box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }

    /* Button styling */
    .search-button {
      background-color: #007bff;
      border: none;
      border-radius: 5px;
      padding: 8px 16px;
      transition: background-color 0.3s, transform 0.3s;
    }

    .search-button:hover {
      background-color: #0056b3;
      transform: translateY(-2px);
    }

    .search-button:focus {
      outline: none;
      box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }
  </style>
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Include your JS files -->
  <script src="{{ asset('js/script.js') }}"></script>
  <script src="{{ asset('bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('bootstrap-5.3.3-dist/js/bootstrap.min.js') }}"></script>
  <!-- Additional JS Files -->
  @stack('scripts')
</body>

</html>
