<link rel="stylesheet" href="{{ asset('bootstrap-5.3.3-dist/css/bootstrap.min.css') }}">

<x-guest-layout>
  <form method="POST" action="{{ route('register') }}">
    @csrf

    <!-- Tabs for User and Organizer -->
    <ul class="nav nav-tabs mb-3" id="roleTabs" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="user-tab" data-bs-toggle="tab" data-bs-target="#user" type="button"
          role="tab" aria-controls="user" aria-selected="true" onclick="selectRole(3, 'user')">User</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="organizer-tab" data-bs-toggle="tab" data-bs-target="#organizer" type="button"
          role="tab" aria-controls="organizer" aria-selected="false" onclick="selectRole(2, 'organizer')">Organizer</button>
      </li>
    </ul>

    <!-- Hidden input field for Role ID -->
    <input type="hidden" id="role_id" name="role_id" value="3"> <!-- Default selected as User -->

    <!-- First Row: First Name and Last Name -->
    <div class="row mb-3">
      <div class="col-md-6">
        <x-input-label for="first_name" :value="__('First Name')" />
        <x-text-input id="first_name" class="form-control" type="text" name="first_name" :value="old('first_name')" autofocus
          autocomplete="first_name" />
        @error('first_name')
          <span class="text-danger mt-2">{{ $message }}</span>
        @enderror
      </div>
      <div class="col-md-6">
        <x-input-label for="last_name" :value="__('Last Name')" />
        <x-text-input id="last_name" class="form-control" type="text" name="last_name" :value="old('last_name')" autofocus
          autocomplete="last_name" />
        @error('last_name')
          <span class="text-danger mt-2">{{ $message }}</span>
        @enderror
      </div>
    </div>

    <!-- Second Row: Email Address and Phone Number -->
    <div class="row mb-3">
      <div class="col-md-6">
        <x-input-label for="email" :value="__('Email')" />
        <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')"
          autocomplete="email" />
        @error('email')
          <span class="text-danger mt-2">{{ $message }}</span>
        @enderror
      </div>
      <div class="col-md-6">
        <x-input-label for="phone" :value="__('Phone Number')" />
        <x-text-input id="phone" class="form-control" type="text" name="phone" :value="old('phone')"
          autocomplete="phone" />
        @error('phone')
          <span class="text-danger mt-2">{{ $message }}</span>
        @enderror
      </div>
    </div>

    <!-- Third Row: Gender and Date of Birth -->
    <div class="row mb-3">
      <div class="col-md-6">
        <x-input-label for="gender" :value="__('Gender')" />
        <select id="gender" class="form-select" name="gender">
          <option value="" disabled selected>Select your gender</option>
          <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
          <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
          <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
        </select>
        @error('gender')
          <span class="text-danger mt-2">{{ $message }}</span>
        @enderror
      </div>
      <div class="col-md-6">
        <x-input-label for="dob" :value="__('Date of Birth')" />
        <x-text-input id="dob" class="form-control" type="date" name="dob" :value="old('dob')" />
        @error('dob')
          <span class="text-danger mt-2">{{ $message }}</span>
        @enderror
      </div>
    </div>

    <!-- Fourth Row: Password and Confirm Password -->
    <div class="row mb-3">
      <div class="col-md-6">
        <x-input-label for="password" :value="__('Password')" />
        <x-text-input id="password" class="form-control" type="password" name="password" autocomplete="new-password" />
        @error('password')
          <span class="text-danger mt-2">{{ $message }}</span>
        @enderror
      </div>
      <div class="col-md-6">
        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
        <x-text-input id="password_confirmation" class="form-control" type="password" name="password_confirmation"
          autocomplete="new-password" />
        @error('password_confirmation')
          <span class="text-danger mt-2">{{ $message }}</span>
        @enderror
      </div>
    </div>

    <!-- Terms and Conditions -->
    <div class="form-check mb-3">
      <input id="terms" type="checkbox" class="form-check-input" name="terms" />
      <label for="terms" class="form-check-label">
        {{ __('I agree to the terms and conditions') }}
      </label>
      @error('terms')
        <span class="text-danger mt-2">{{ $message }}</span>
      @enderror
    </div>

    <!-- Submit and Login Link -->
    <div class="d-flex justify-content-between align-items-center mt-4">
      <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
        href="{{ route('login') }}">
        {{ __('Already registered? Login') }}
      </a>
      <x-primary-button class="ms-4">
        {{ __('Register') }}
      </x-primary-button>
    </div>
  </form>

  <script>
    function selectRole(roleId, tabName) {
      // Set the role ID in the hidden field
      document.getElementById('role_id').value = roleId;

      // Manually toggle the active class between tabs
      const userTab = document.getElementById('user-tab');
      const organizerTab = document.getElementById('organizer-tab');

      // Remove active class from both tabs
      userTab.classList.remove('active');
      organizerTab.classList.remove('active');

      // Add active class to the clicked tab
      if (tabName === 'user') {
        userTab.classList.add('active');
      } else if (tabName === 'organizer') {
        organizerTab.classList.add('active');
      }
    }
  </script>
</x-guest-layout>
