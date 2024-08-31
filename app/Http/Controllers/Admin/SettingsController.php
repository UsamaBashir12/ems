<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class SettingsController extends Controller
{
  /**
   * Show the app settings page.
   *
   * @return \Illuminate\View\View
   */
  public function index()
  {
    // Perform any necessary logic to prepare data for app settings
    return view('admin.appSettings');
  }
}
