<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
  /**
   * Define your route model bindings, pattern filters, etc.
   */
  public function boot(): void
  {
    $this->routes(function () {
      // Register the default web.php routes
      Route::middleware('web')
        ->group(base_path('routes/web.php'));

      // Register the custom org.php routes
      Route::middleware('web')
        ->group(base_path('routes/org.php'));

      // You can add more route files here as needed
    });
  }
}
