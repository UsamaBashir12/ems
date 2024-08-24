<!-- resources/views/admin/dashboard.blade.php -->
@extends('layouts.user')

@section('title', 'Dashboard')

@section('content')
<div class="row">
    <!-- Events Card -->
    <div class="col-lg-3 col-md-6 mb-4">
        <div class="card shadow-lg border-0 rounded-lg h-100">
            <div class="card-body text-center">
                <h4 class="card-title mb-3">Events</h4>
                {{-- <p class="display-4 text-primary mb-3">{{ $eventCount }}</p> --}}
                <p class="text-muted">Number of events scheduled</p>
            </div>
        </div>
    </div>
    <!-- Categories Card -->
    <div class="col-lg-3 col-md-6 mb-4">
        <div class="card shadow-lg border-0 rounded-lg h-100">
            <div class="card-body text-center">
                <h4 class="card-title mb-3">Categories</h4>
                {{-- <p class="display-4 text-success mb-3">{{ $categoryCount }}</p> --}}
                <p class="text-muted">Total categories available</p>
            </div>
        </div>
    </div>
</div>
@endsection
