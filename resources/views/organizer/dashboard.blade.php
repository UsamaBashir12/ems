@extends('layouts.organizer')

@section('title', 'Organizer Dashboard')

@section('content')

  <div class="container mt-4">
    <div class="row">
      <!-- Sidebar -->
      <div class="col-md-3">
        <div class="list-group">
          <a href="{{ route('organizer.dashboard') }}" class="list-group-item list-group-item-action active">
            Dashboard
          </a>
          <a href="{{ route('organizer.events') }}" class="list-group-item list-group-item-action">
            Manage Events
          </a>
          <a href="{{ route('organizer.users') }}" class="list-group-item list-group-item-action">
            Manage Users
          </a>
          <a href="{{ route('organizer.settings') }}" class="list-group-item list-group-item-action">
            Settings
          </a>
        </div>
      </div>

      <!-- Main Content -->
      <div class="col-md-9">
        <h1 class="mb-4">Welcome, Organizer</h1>

        <!-- Event Management Section -->
        <div class="mb-4">
          <h2>Upcoming Events</h2>
          <div class="card">
            <div class="card-header">
              Upcoming Events
            </div>
            <div class="card-body">
              <!-- Replace with dynamic event data -->
              <ul class="list-group">
                <li class="list-group-item">Event 1: Conference on Web Development</li>
                <li class="list-group-item">Event 2: Seminar on Cybersecurity</li>
                <!-- Add more events here -->
              </ul>
              <a href="{{ route('organizer.events') }}" class="btn btn-primary mt-3">Manage Events</a>
            </div>
          </div>
        </div>

        <!-- User Management Section -->
        <div class="mb-4">
          <h2>Users</h2>
          <div class="card">
            <div class="card-header">
              User Management
            </div>
            <div class="card-body">
              <!-- Replace with dynamic user data -->
              <ul class="list-group">
                <li class="list-group-item">User 1: John Doe</li>
                <li class="list-group-item">User 2: Jane Smith</li>
                <!-- Add more users here -->
              </ul>
              <a href="{{ route('organizer.users') }}" class="btn btn-primary mt-3">Manage Users</a>
            </div>
          </div>
        </div>

        <!-- Settings Section -->
        <div class="mb-4">
          <h2>Settings</h2>
          <div class="card">
            <div class="card-header">
              App Settings
            </div>
            <div class="card-body">
              <!-- Add settings options here -->
              <p>Manage application settings here.</p>
              <a href="{{ route('organizer.settings') }}" class="btn btn-primary mt-3">Go to Settings</a>
            </div>
          </div>
        </div>
        <!-- Logout Section -->
        <div class="mb-4">
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: inline;">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
          </form>
        </div>
      </div>
    </div>
  </div>

@endsection
