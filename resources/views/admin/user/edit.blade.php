<!-- resources/views/admin/user/edit.blade.php -->

@extends('layouts.layout')

@section('content')
<div class="container">
    <h1>Edit User</h1>

    <form action="{{ route('admin.user.update', $user->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" required>
        </div>
        <div class="form-group">
            <label for="role">Role</label>
            <input type="text" name="role" id="role" class="form-control" value="{{ $user->role }}" required>
        </div>
        <!-- Add other fields as needed -->

        <button type="submit" class="btn btn-primary mt-3">Update User</button>
    </form>

    <a href="{{ route('admin.user.all') }}" class="btn btn-secondary mt-3">Back to Users List</a>
</div>
@endsection
