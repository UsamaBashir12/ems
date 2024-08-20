<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Organizer\OrganizerController;
use App\Http\Controllers\User\UserController;
// use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
// use App\Http\Controllers\EventController;
use App\Http\Controllers\Admin\EventController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

// Home route
Route::get('/', function () {
  return view('welcome');
})->name('home');
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
Route::delete('/admin/user/delete/{id}', [UserController::class, 'destroy'])->name('user.destroy');

// web.php
Route::get('/admin/event/all', [AdminController::class, 'allEvent'])->name('event.all');
Route::get('/admin/events', [EventController::class, 'index'])->name('admin.events.create');
// Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

// Event details route
Route::get('/event-details', function () {
  return view('eventDetails');
})->name('eventDetails');

// Activate user
Route::patch('/admin/user/{id}/activate', [UserController::class, 'activate'])->name('admin.user.activate');

// Deactivate user
Route::patch('/admin/user/{id}/deactivate', [UserController::class, 'deactivate'])->name('admin.user.deactivate');

// Delete user
Route::delete('/admin/user/{id}', [UserController::class, 'destroy'])->name('admin.user.delete');
Route::patch('/admin/user/{id}/status', [AdminController::class, 'updateStatus'])->name('admin.user.status');



// In your web.php or routes file
Route::get('/admin/event/all', [AdminController::class, 'allEvent'])->name('event.all');

// Authentication routes
require __DIR__ . '/auth.php';
// Cleaned up routes
Route::prefix('admin')->middleware(['auth', 'role:1', 'checkActive'])->group(function () {
  Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

  Route::get('/event/create', [EventController::class, 'create'])->name('admin.events.create');
  Route::post('/event/store', [EventController::class, 'store'])->name('admin.events.store');

  // Other admin routes...
});


// Routes for categories
Route::get('/admin/categories', [AdminController::class, 'categories'])->name('admin.category.all');
Route::get('/admin/category/{id}', [AdminController::class, 'viewCategory'])->name('admin.category.view');
Route::get('/admin/category/{id}/edit', [AdminController::class, 'editCategory'])->name('admin.category.edit');
Route::put('/admin/category/{id}', [AdminController::class, 'updateCategory'])->name('admin.category.update');
Route::delete('/admin/category/{id}', [AdminController::class, 'deleteCategory'])->name('admin.category.delete');



// Admin routes
Route::prefix('admin')->middleware(['auth', 'role:1', 'checkActive'])->group(function () {
  Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');



  Route::get('/admin/event/categories', [AdminController::class, 'categories'])->name('admin.category.form');
  Route::post('/admin/event/store-category', [AdminController::class, 'storeCategory'])->name('admin.category.store');
  // Route::post('/admin/category/store', [CategoryController::class, 'store'])->name('admin.category.store');
  // routes/web.php
  Route::get('/admin/event/add', [EventController::class, 'addEvent'])->name('event.add');
  // Route::get('admin/category/all', [CategoryController::class, 'all'])->name('admin.category.all');




  // events add
  Route::get('/admin/events/create', [EventController::class, 'create'])->name('admin.events.create');
  Route::post('/admin/events/store', [EventController::class, 'store'])->name('admin.events.store');



  Route::get('/admin/event/add', [AdminController::class, 'addEvent'])->name('event.add');
  Route::get('/admin/event/add', [AdminController::class, 'addEvent'])->name('admin.event.add');



  // User management routes
  Route::get('user/add', [AdminUserController::class, 'add'])->name('admin.user.add');
  Route::post('user/add', [AdminUserController::class, 'store'])->name('admin.user.store');
  Route::get('user/all', [AdminUserController::class, 'all'])->name('admin.user.all');
  Route::get('user/view/{id}', [AdminUserController::class, 'view'])->name('admin.user.view');
  Route::get('user/edit/{id}', [AdminUserController::class, 'edit'])->name('admin.user.edit');
  Route::patch('user/update/{id}', [AdminUserController::class, 'update'])->name('admin.user.update'); // Fixed route
  Route::delete('user/delete/{id}', [AdminUserController::class, 'delete'])->name('admin.user.delete');
  Route::get('user/organizers', [AdminUserController::class, 'organizers'])->name('admin.user.organizers');



  // Event management routes
  Route::prefix('event')->name('event.')->group(function () {
    Route::get('/all', [AdminController::class, 'allEvent'])->name('all');
    Route::get('/add', [AdminController::class, 'addEvent'])->name('add');
    Route::post('/store', [AdminController::class, 'storeEvent'])->name('store'); // Store event route
    Route::get('/categories', [AdminController::class, 'categories'])->name('categories');
  });


  // Application settings route
  Route::get('app-settings', [AdminUserController::class, 'appSettings'])->name('admin.appSettings');
});




// Organizer routes
Route::prefix('organizer')->middleware(['auth', 'role:2', 'checkActive'])->group(function () {
  Route::get('dashboard', [OrganizerController::class, 'dashboard'])->name('organizer.dashboard');
  Route::get('events', [OrganizerController::class, 'events'])->name('organizer.events');
  Route::get('users', [OrganizerController::class, 'users'])->name('organizer.users');
  Route::get('settings', [OrganizerController::class, 'settings'])->name('organizer.settings');
});




// User routes
Route::prefix('user')->middleware(['auth', 'role:3', 'checkActive'])->group(function () {
  Route::get('dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
});




// Authentication (login) routes
Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login.store');




// Logout route
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');




// Profile management routes
Route::middleware(['auth'])->group(function () {
  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



// Register routes
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store'])->name('register.store');
