@extends('layouts.layout')

@section('title', 'Organizers')

@section('content')
  <div class="container my-5">
    <h2 class="text-center mb-4">All Organizers</h2>

    @if ($organizers->isEmpty())
      <p class="text-center">No organizers found.</p>
    @else
      <div class="table-responsive">
        <table class="table table-striped table-bordered">
          <thead class="thead-dark">
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Gender</th>
              <th>Date of Birth</th>
              <th>Status</th>
              <th>Joined At</th>
              <th>Is Active</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($organizers as $organizer)
              <tr>
                <td>{{ $loop->iteration }}</td> <!-- Auto-incrementing row number -->
                <td>{{ $organizer->first_name }} {{ $organizer->last_name }}</td>
                <td>{{ $organizer->email }}</td>
                <td>{{ $organizer->phone }}</td>
                <td>{{ ucfirst($organizer->gender) }}</td>
                <td>{{ $organizer->dob ? \Carbon\Carbon::parse($organizer->dob)->format('d M, Y') : 'N/A' }}</td>
                <td>{{ ucfirst($organizer->status) }}</td>
                <td>{{ $organizer->created_at->format('d M, Y') }}</td>
                <td>{{ $organizer->is_active ? 'Active' : 'Inactive' }}</td>
                <td>
                  <a href="#" class="btn btn-info btn-sm">View</a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    @endif
  </div>
  <br><br><br>
@endsection
