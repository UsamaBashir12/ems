@extends('layouts.layout')

@section('content')
  <div class="container">
    <h1>User Details</h1>

    <div class="card">
      <div class="card-body">
        <h5 class="card-title">{{ $user->name }}</h5>
        <p class="card-text">Email: {{ $user->email }}</p>
        <p class="card-text">Role_id: {{ $user->role_id }}</p>
        <!-- Add other user details as needed -->
      </div>
    </div>

    <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-primary mt-3">Edit User</a>
    <form action="{{ route('admin.user.delete', $user->id) }}" method="POST" class="d-inline mt-3">
      @csrf
      @method('DELETE')
      <button type="submit" class="btn btn-danger">Delete User</button>
    </form>
    <a href="{{ route('admin.user.all') }}" class="btn btn-secondary mt-3">Back to Users List</a>
  </div>
@endsection
