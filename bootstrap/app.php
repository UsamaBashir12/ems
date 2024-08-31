<?php

use Illuminate\Foundation\Application;

return Application::configure(basePath: dirname(__DIR__))
  ->withRouting(
    web: __DIR__ . '/../routes/web.php',
    commands: __DIR__ . '/../routes/console.php',
    health: '/up'
  )
  ->withMiddleware(function ($middleware) {
    $middleware->alias([
      'role' => \App\Http\Middleware\RoleMiddleware::class,
      'checkRole' => \App\Http\Middleware\CheckRole::class,
      'checkActive' => \App\Http\Middleware\CheckUserIsActive::class,
    ]);
  })
  ->withExceptions(function ($exceptions) {
    // Configure custom exception handling if needed
  })
  ->create();
