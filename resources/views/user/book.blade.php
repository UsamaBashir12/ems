@extends('layouts.user')

@section('content')
  <div class="container">
    <h1>Book Event: {{ $event->name }}</h1>

    <form action="{{ route('events.book', ['event' => $event->id]) }}" method="POST">
      @csrf
      <div class="form-group">
        <label for="free_quantity">Free Tickets:</label>
        <input type="number" name="free_quantity" id="free_quantity" class="form-control" value="0" min="0">
      </div>
      <div class="form-group">
        <label for="normal_quantity">Normal Tickets:</label>
        <input type="number" name="normal_quantity" id="normal_quantity" class="form-control" value="0"
          min="0">
      </div>
      <div class="form-group">
        <label for="all_quantity">All Tickets:</label>
        <input type="number" name="all_quantity" id="all_quantity" class="form-control" value="0" min="0">
      </div>
      <div class="form-group">
        <label for="business_quantity">Business Tickets:</label>
        <input type="number" name="business_quantity" id="business_quantity" class="form-control" value="0"
          min="0">
      </div>
      <div class="form-group">
        <label for="first_quantity">First Class Tickets:</label>
        <input type="number" name="first_quantity" id="first_quantity" class="form-control" value="0"
          min="0">
      </div>
      <button type="submit" class="btn btn-primary">Book Now</button>
    </form>
  </div>
@endsection
