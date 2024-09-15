@extends('layouts.layout')

@section('title', 'Contact Us')

@section('content')
  <div class="container my-5">
    <!-- Go Back Button -->
    <div class="mt-4">
      <div class="d-flex justify-content-between border p-2">
        <h2 class="m-0 p-0">Go to Home Page</h2>
        <a href="{{ route('home') }}" class="btn btn-secondary">Go Back</a>
      </div>
    </div>
    <h2 class="text-center mb-4">Contact Us</h2>

    @if (session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('contact.store') }}" method="POST">
      @csrf
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" class="form-control" required>
        @error('name')
          <div class="text-danger">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" class="form-control" required>
        @error('email')
          <div class="text-danger">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-group">
        <label for="subject">Subject</label>
        <input type="text" id="subject" name="subject" class="form-control" required>
        @error('subject')
          <div class="text-danger">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-group">
        <label for="message">Message</label>
        <textarea id="message" name="message" class="form-control" rows="5" required></textarea>
        @error('message')
          <div class="text-danger">{{ $message }}</div>
        @enderror
      </div>

      <button type="submit" class="btn btn-primary">Send Message</button>
    </form>
  </div>
@endsection
