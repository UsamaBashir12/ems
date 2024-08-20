<x-app-layout>
  <div class="row">
    <!-- Left Sidebar -->
    @include('admin.partials.sidebar')

    <!-- Right Sidebar -->
    <main class="col-md-9 p-3" id="content-area">
      <div id="addUser-content" class="content-pane">
        <div class="container mt-5">
          <div class="row justify-content-center">
            <div class="col-md-8 w-100">
              <div class="card">
                <div class="card-header bg-dark text-white d-flex justify-content-between">
                  <p class="m-0 p-0">Manage Users</p>
                  <p class="m-0 p-0">Manage Users > add users</p>
                </div>
                <div class="card-body">
                  <!-- Tabs Navigation -->
                  <ul class="nav nav-tabs" id="userTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                      <a class="nav-link active" id="user-tab" data-bs-toggle="tab" href="#user" role="tab"
                        aria-controls="user" aria-selected="true">User</a>
                    </li>
                    <li class="nav-item" role="presentation">
                      <a class="nav-link" id="organizer-tab" data-bs-toggle="tab" href="#organizer" role="tab"
                        aria-controls="organizer" aria-selected="false">Organizer</a>
                    </li>
                  </ul>
                  <!-- Display success message -->
                  @if (session('success'))
                    <div class="alert alert-success mt-3">
                      {{ session('success') }}
                    </div>
                  @endif
                  <!-- Tabs Content -->
                  <div class="tab-content mt-3" id="userTabsContent">
                    <!-- User Tab -->
                    <div class="tab-pane fade show active" id="user" role="tabpanel" aria-labelledby="user-tab">
                      <form method="POST" action="{{ route('admin.user.store') }}">
                        @csrf

                        <!-- First Name and Last Name -->
                        <div class="row">
                          <div class="col-md-6 mb-3">
                            <label for="firstName" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="firstName" name="first_name"
                              placeholder="Enter first name" value="{{ old('first_name') }}">
                            @error('first_name')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>

                          <div class="col-md-6 mb-3">
                            <label for="lastName" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="lastName" name="last_name"
                              placeholder="Enter last name" value="{{ old('last_name') }}">
                            @error('last_name')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                        </div>

                        <!-- Email and Phone Number -->
                        <div class="row">
                          <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email"
                              placeholder="Enter email" value="{{ old('email') }}">
                            @error('email')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>

                          <div class="col-md-6 mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="tel" class="form-control" id="phone" name="phone"
                              placeholder="Enter phone number" value="{{ old('phone') }}">
                            @error('phone')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                        </div>

                        <!-- Date of Birth -->
                        <div class="row">
                          <div class="col-md-6 mb-3">
                            <label for="dob" class="form-label">Date of Birth</label>
                            <input type="date" class="form-control" id="dob" name="dob"
                              value="{{ old('dob') }}">
                            @error('dob')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                          <div class="col-md-6 mb-3">
                            <label for="gender" class="form-label">Gender</label>
                            <select id="gender" name="gender" class="form-select">
                              <option value="" disabled selected>Select gender</option>
                              <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                              <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                              <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
                            </select>
                            @error('gender')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                        </div>

                        <!-- Password and Confirm Password -->
                        <div class="row">
                          <div class="col-md-6 mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password"
                              placeholder="Enter password">
                            @error('password')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>

                          <div class="col-md-6 mb-3">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="password_confirmation"
                              name="password_confirmation" placeholder="Confirm password">
                            @error('password_confirmation')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                        </div>

                        <!-- Role Selection (hidden, default selected) -->
                        <input type="hidden" name="role_id" id="role_id" value="3" />

                        <!-- Terms and Conditions -->
                        <div class="form-check mb-3">
                          <input id="terms" type="checkbox" class="form-check-input" name="terms"
                            {{ old('terms') ? 'checked' : '' }} />
                          <label for="terms" class="form-check-label">
                            {{ __('I agree to the terms and conditions') }}
                          </label>
                          @error('terms')
                            <span class="text-danger mt-2">{{ $message }}</span>
                          @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="text-center">
                          <button type="submit" class="btn btn-primary">Add User</button>
                        </div>
                      </form>
                    </div>

                    <!-- Organizer Tab -->
                    <div class="tab-pane fade" id="organizer" role="tabpanel" aria-labelledby="organizer-tab">
                      <form method="POST" action="{{ route('admin.user.store') }}">
                        @csrf

                        <!-- Same form fields as above, with role_id set to 2 -->
                        <div class="row">
                          <div class="col-md-6 mb-3">
                            <label for="firstName" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="firstName" name="first_name"
                              placeholder="Enter first name" value="{{ old('first_name') }}">
                            @error('first_name')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>

                          <div class="col-md-6 mb-3">
                            <label for="lastName" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="lastName" name="last_name"
                              placeholder="Enter last name" value="{{ old('last_name') }}">
                            @error('last_name')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email"
                              placeholder="Enter email" value="{{ old('email') }}">
                            @error('email')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>

                          <div class="col-md-6 mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="tel" class="form-control" id="phone" name="phone"
                              placeholder="Enter phone number" value="{{ old('phone') }}">
                            @error('phone')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-6 mb-3">
                            <label for="dob" class="form-label">Date of Birth</label>
                            <input type="date" class="form-control" id="dob" name="dob"
                              value="{{ old('dob') }}">
                            @error('dob')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                          <div class="col-md-6 mb-3">
                            <label for="gender" class="form-label">Gender</label>
                            <select id="gender" name="gender" class="form-select">
                              <option value="" disabled selected>Select gender</option>
                              <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                              <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                              <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
                            </select>
                            @error('gender')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-6 mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password"
                              placeholder="Enter password">
                            @error('password')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>

                          <div class="col-md-6 mb-3">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="password_confirmation"
                              name="password_confirmation" placeholder="Confirm password">
                            @error('password_confirmation')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                        </div>

                        <!-- Hidden Role ID for Organizer -->
                        <input type="hidden" name="role_id" id="role_id" value="2" />

                        <div class="form-check mb-3">
                          <input id="terms" type="checkbox" class="form-check-input" name="terms"
                            {{ old('terms') ? 'checked' : '' }} />
                          <label for="terms" class="form-check-label">
                            {{ __('I agree to the terms and conditions') }}
                          </label>
                          @error('terms')
                            <span class="text-danger mt-2">{{ $message }}</span>
                          @enderror
                        </div>

                        <div class="text-center">
                          <button type="submit" class="btn btn-primary">Add Organizer</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <br><br><br>

          <!-- Display success message -->
          @if (session('success'))
            <div class="alert alert-success mt-3">
              {{ session('success') }}
            </div>
          @endif
        </div>
      </div>
    </main>
  </div>
</x-app-layout>
