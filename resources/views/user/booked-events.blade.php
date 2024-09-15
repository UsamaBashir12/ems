@extends('layouts.user')

@section('content')
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <!-- Navigation Section -->
        <div class="mb-4 d-flex justify-content-between m-0 border border-1 border-black p-2 rounded-2">
          <div>
            Back to user Dashboard
          </div>
          <div>
            <a href="{{ route('user.dashboard') }}" class="btn btn-info">GO
            </a>
          </div>
        </div>
        <div class="card shadow-lg">
          <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Your Booked Events</h3>
          </div>

          <div class="card-body">
            @if ($bookedEvents->isEmpty())
              <div class="alert alert-warning text-center">
                <strong>No Bookings Found!</strong> You have not booked any events yet.
              </div>
            @else
              <div class="table-responsive">
                <table class="table table-bordered table-hover">
                  <thead class="thead-dark">
                    <tr>
                      <th>Event Id</th>
                      <th>Date</th>
                      <th>Free Tickets</th>
                      <th>Normal Tickets</th>
                      <th>All Tickets</th>
                      <th>Business Tickets</th>
                      <th>First Class Tickets</th>
                      <th>Total Price</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($bookedEvents as $booking)
                      <tr>
                        <td>{{ $booking->event->id }}</td>
                        <td>{{ \Carbon\Carbon::parse($booking->event->date)->format('d M, Y') }}</td>
                        <td>{{ $booking->free_quantity }}</td>
                        <td>{{ $booking->normal_quantity }}</td>
                        <td>{{ $booking->all_quantity }}</td>
                        <td>{{ $booking->business_quantity }}</td>
                        <td>{{ $booking->first_quantity }}</td>
                        <td class="text-success font-weight-bold">${{ number_format($booking->total_price, 2) }}</td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
