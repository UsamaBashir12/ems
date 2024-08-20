<x-app-layout>
  <div class="row">
    <!-- Left Sidebar -->
    @include('admin.partials.sidebar')

    <!-- Right Sidebar -->
    <main class="col-md-9 p-3" id="content-area">
      <div id="addUser-content" class="content-pane">
        <div class="container">
          <h1>App Settings</h1>

          @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
          @endif

          <form action="{{ route('admin.appSettings') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
              <div class="col-md-6">
                <!-- Application Name -->
                <div class="mb-3">
                  <label for="app_name" class="form-label">Application Name</label>
                  <input type="text" class="form-control" id="app_name" name="app_name"
                    value="{{ old('app_name', $settings['app_name'] ?? '') }}" required>
                </div>

                <!-- Application Email -->
                <div class="mb-3">
                  <label for="app_email" class="form-label">Application Email</label>
                  <input type="email" class="form-control" id="app_email" name="app_email"
                    value="{{ old('app_email', $settings['app_email'] ?? '') }}" required>
                </div>

                <!-- Application URL -->
                <div class="mb-3">
                  <label for="app_url" class="form-label">Application URL</label>
                  <input type="url" class="form-control" id="app_url" name="app_url"
                    value="{{ old('app_url', $settings['app_url'] ?? '') }}" required>
                </div>

                <!-- Application Timezone -->
                <div class="mb-3">
                  <label for="app_timezone" class="form-label">Application Timezone</label>
                  <select class="form-select" id="app_timezone" name="app_timezone" required>
                    @foreach (timezone_identifiers_list() as $timezone)
                      <option value="{{ $timezone }}"
                        {{ old('app_timezone', $settings['app_timezone'] ?? '') == $timezone ? 'selected' : '' }}>
                        {{ $timezone }}
                      </option>
                    @endforeach
                  </select>
                </div>

                <!-- Application Locale -->
                <div class="mb-3">
                  <label for="app_locale" class="form-label">Application Locale</label>
                  <select class="form-select" id="app_locale" name="app_locale" required>
                    <option value="en"
                      {{ old('app_locale', $settings['app_locale'] ?? 'en') == 'en' ? 'selected' : '' }}>English
                    </option>
                    <option value="es"
                      {{ old('app_locale', $settings['app_locale'] ?? '') == 'es' ? 'selected' : '' }}>Spanish</option>
                    <!-- Add more locales as needed -->
                  </select>
                </div>

                <!-- Application Logo -->
                <div class="mb-3">
                  <label for="app_logo" class="form-label">Application Logo</label>
                  <input type="file" class="form-control" id="app_logo" name="app_logo">
                  @if ($settings['app_logo'] ?? '')
                    <img src="{{ asset('storage/' . $settings['app_logo']) }}" alt="Logo" class="mt-2"
                      style="max-height: 100px;">
                  @endif
                </div>
              </div>

              <div class="col-md-6">
                <!-- Support Email -->
                <div class="mb-3">
                  <label for="support_email" class="form-label">Support Email</label>
                  <input type="email" class="form-control" id="support_email" name="support_email"
                    value="{{ old('support_email', $settings['support_email'] ?? '') }}">
                </div>

                <!-- Contact Phone -->
                <div class="mb-3">
                  <label for="contact_phone" class="form-label">Contact Phone</label>
                  <input type="text" class="form-control" id="contact_phone" name="contact_phone"
                    value="{{ old('contact_phone', $settings['contact_phone'] ?? '') }}">
                </div>

                <!-- Social Media Links -->
                <div class="mb-3">
                  <label for="facebook_url" class="form-label">Facebook URL</label>
                  <input type="url" class="form-control" id="facebook_url" name="facebook_url"
                    value="{{ old('facebook_url', $settings['facebook_url'] ?? '') }}">
                </div>

                <div class="mb-3">
                  <label for="twitter_url" class="form-label">Twitter URL</label>
                  <input type="url" class="form-control" id="twitter_url" name="twitter_url"
                    value="{{ old('twitter_url', $settings['twitter_url'] ?? '') }}">
                </div>

                <div class="mb-3">
                  <label for="instagram_url" class="form-label">Instagram URL</label>
                  <input type="url" class="form-control" id="instagram_url" name="instagram_url"
                    value="{{ old('instagram_url', $settings['instagram_url'] ?? '') }}">
                </div>
              </div>
            </div>

            <button type="submit" class="btn btn-primary">Save Changes</button>
          </form>
        </div>
      </div>
      <br><br>
      <br><br>
      <br><br>
    </main>
  </div>
</x-app-layout>
