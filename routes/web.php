<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Organizer\OrganizerController;
use App\Http\Controllers\Organizer\NewController;
use App\Http\Controllers\Admin\SettingsController;
use Illuminate\Support\Facades\Route;


// Home route
Route::get('/', function () {
  return view('welcome');
})->name('home');

// Event details route
Route::get('/event-details', function () {
  return view('eventDetails');
})->name('eventDetails');


// Cleaned up routes
// Admin Routes with Middleware
// Admin Routes with Middleware
// Route::prefix('admin')->middleware(['auth', 'role:1', 'checkActive'])->group(function () {
//   Route::get('event/add', [EventController::class, 'create'])->name('admin.event.create');

//   // Dashboard Route
//   Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

//   // App Settings Route
//   Route::get('app-settings', [SettingsController::class, 'index'])->name('admin.appSettings');

//   // Booking Routes
//   Route::get('booking/aa', [BookingController::class, 'index'])->name('admin.booking.aa');


//   Route::get('/admin/category/view/{id}', [CategoryController::class, 'view'])->name('admin.category.view');





//   // Category Routes
//   Route::post('/admin/category/store', [CategoryController::class, 'store'])->name('admin.category.store');

//   Route::get('category/edit', [CategoryController::class, 'edit'])->name('admin.category.edit');
//   Route::get('/events/all', [EventController::class, 'index'])->name('event.all');
//   Route::get('/events/add', [EventController::class, 'add'])->name('event.add');
//   Route::get('/events/categories', [EventController::class, 'categories'])->name('event.categories');
//   Route::post('/admin/events/store', [EventController::class, 'store'])->name('admin.events.store');

//   Route::get('user/all', [UserController::class, 'index'])->name('admin.user.all');
//   Route::get('user/add', [UserController::class, 'add'])->name('admin.user.add');
//   Route::get('user/organizers', [UserController::class, 'organizers'])->name('admin.user.organizers');
//   // Route::get('user/all', [UserController::class, 'index'])->name('admin.user.all');
//   // Route::get('user/add', [UserController::class, 'add'])->name('admin.user.add');
//   // Route::get('user/organizers', [UserController::class, 'organizers'])->name('admin.user.organizers');
//   Route::get('user/edit/{id}', [UserController::class, 'edit'])->name('admin.user.edit');
//   Route::get('user/view/{id}', [UserController::class, 'view'])->name('admin.user.view');
//   Route::get('user/view/{id}', [UserController::class, 'delete'])->name('admin.user.delete');
//   Route::post('user/store', [UserController::class, 'store'])->name('admin.user.store');
//   Route::post('/admin/user/store', [UserController::class, 'store'])->name('admin.user.store');

//   Route::get('/admin/user/view', [UserController::class, 'view'])->name('admin.user.view');
//   Route::put('/admin/user/update/{id}', [UserController::class, 'update'])->name('admin.user.update');
//   // Route to view a user (supports GET)
//   Route::get('/admin/user/view/{id}', [UserController::class, 'view'])->name('admin.user.view');

//   // Route to delete a user (supports DELETE)
//   Route::delete('/admin/user/delete/{id}', [UserController::class, 'delete'])->name('admin.user.delete');

//   Route::get('admin/category/view/{id}', [CategoryController::class, 'view'])->name('admin.category.view');


//   // Update Category
//   Route::put('/admin/category/update/{id}', [CategoryController::class, 'update'])->name('admin.category.update');

//   // Back to Categories (if this route is used)
//   Route::get('/admin/category/all', [CategoryController::class, 'index'])->name('admin.category.all');
//   Route::delete('/admin/category/{id}', [CategoryController::class, 'destroy'])->name('admin.category.delete');
//   Route::get('/admin/category/edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
//   Route::post('/admin/category/store', [CategoryController::class, 'store'])->name('admin.category.store');
//   Route::get('admin/category/view/{id}', [CategoryController::class, 'view'])->name('admin.category.view');



//   // Event Routes
//   Route::get('event/add', [EventController::class, 'create'])->name('admin.event.create');
//   Route::post('event/store', [EventController::class, 'store'])->name('admin.event.store');
//   Route::get('event/all', [EventController::class, 'index'])->name('admin.event.all');
//   Route::get('event/{id}/edit', [EventController::class, 'edit'])->name('admin.event.edit');
//   Route::put('event/{id}', [EventController::class, 'update'])->name('admin.event.update');
//   Route::delete('event/{id}', [EventController::class, 'destroy'])->name('admin.event.destroy');
// });
// routes/web.php

// Route::prefix('admin')->middleware(['auth', 'role:1', 'checkActive'])->group(function () {
//   Route::get('event/add', [EventController::class, 'create'])->name('admin.event.create');
//   Route::post('event/store', [EventController::class, 'store'])->name('admin.event.store');
//   Route::get('event/all', [EventController::class, 'index'])->name('admin.event.all');
//   Route::get('event/{id}/edit', [EventController::class, 'edit'])->name('admin.event.edit');
//   Route::put('event/{id}', [EventController::class, 'update'])->name('admin.event.update');
//   Route::delete('event/{id}', [EventController::class, 'destroy'])->name('admin.event.destroy');

//   // Other routes
//   Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
//   Route::get('app-settings', [SettingsController::class, 'index'])->name('admin.appSettings');
//   Route::get('booking/aa', [BookingController::class, 'index'])->name('admin.booking.aa');
//   Route::get('category/view/{id}', [CategoryController::class, 'view'])->name('admin.category.view');
//   Route::post('category/store', [CategoryController::class, 'store'])->name('admin.category.store');
//   Route::get('category/edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
//   Route::put('category/update/{id}', [CategoryController::class, 'update'])->name('admin.category.update');
//   Route::delete('category/delete/{id}', [CategoryController::class, 'destroy'])->name('admin.category.delete');
//   Route::get('user/all', [UserController::class, 'index'])->name('admin.user.all');
//   Route::get('user/add', [UserController::class, 'add'])->name('admin.user.add');
//   Route::get('user/organizers', [UserController::class, 'organizers'])->name('admin.user.organizers');
//   Route::get('user/edit/{id}', [UserController::class, 'edit'])->name('admin.user.edit');
//   Route::get('user/view/{id}', [UserController::class, 'view'])->name('admin.user.view');
//   Route::delete('user/delete/{id}', [UserController::class, 'delete'])->name('admin.user.delete');
// });

Route::prefix('admin')->middleware(['auth', 'role:1', 'checkActive'])->group(function () {
  // Event Routes
  // Route::get('event/all', [EventController::class, 'index'])->name('admin.event.all');
  // Route::get('event/add', [EventController::class, 'create'])->name('admin.event.create');
  Route::get('/admin/events/add', [EventController::class, 'create'])->name('admin.event.add');
  // Example route definition in routes/web.php or routes/admin.php
  Route::post('/admin/events/store', [EventController::class, 'store'])->name('admin.events.store');
  // routes/web.php
  Route::post('/admin/user/store', [UserController::class, 'store'])->name('admin.user.store');

  Route::get('event/add', [EventController::class, 'create'])->name('admin.event.create');
  Route::post('event/store', [EventController::class, 'store'])->name('admin.event.store');
  Route::get('event/all', [EventController::class, 'index'])->name('admin.event.all');
  Route::get('event/{id}/edit', [EventController::class, 'edit'])->name('admin.event.edit');
  Route::put('event/{id}', [EventController::class, 'update'])->name('admin.event.update');
  Route::delete('event/{id}', [EventController::class, 'destroy'])->name('admin.event.destroy');
  Route::get('admin/event/add', [EventController::class, 'create'])->name('admin.event.create');
  Route::get('admin/event/all', [EventController::class, 'index'])->name('admin.event.index');
  Route::get('/admin/event/all', [EventController::class, 'index'])->name('admin.event.all');
  Route::get('/admin/event/add', [EventController::class, 'create'])->name('admin.event .add');
  Route::get('/admin/event/all', [EventController::class, 'all'])->name('admin.event.all');

  // Dashboard Route
  Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

  // App Settings Route
  Route::get('app-settings', [SettingsController::class, 'index'])->name('admin.appSettings');

  // Booking Routes
  Route::get('booking/aa', [BookingController::class, 'index'])->name('admin.booking.aa');
  // Route::get('/admin/category/view/{id}', [CategoryController::class, 'view'])->name('admin.category.view');
  // Route::get('/admin/category/view/{id}', [CategoryController::class, 'view'])->name('admin.category.view');
  Route::get('admin/category/view/{id}', [CategoryController::class, 'view'])->name('admin.category.view');
  Route::get('/admin/categories', [CategoryController::class, 'index'])->name('dashboard');

  // Category Routes
  // Route::get('category/view/{id}', [CategoryController::class, 'view'])->name('admin.category.view');
  Route::post('category/store', [CategoryController::class, 'store'])->name('admin.category.store');
  Route::get('category/edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
  Route::put('category/update/{id}', [CategoryController::class, 'update'])->name('admin.category.update');
  Route::delete('category/delete/{id}', [CategoryController::class, 'destroy'])->name('admin.category.delete');
  Route::get('event/categories', [EventController::class, 'categories'])->name('event.categories');
  // Route::get('/admin/category/all', [CategoryController::class, 'all'])->name('admin.category.all');
  Route::get('/admin/category/view', [CategoryController::class, 'all'])->name('admin.category.all');

  // User Routes
  Route::get('user/all', [UserController::class, 'index'])->name('admin.user.all');
  Route::get('user/add', [UserController::class, 'add'])->name('admin.user.add');
  Route::get('user/organizers', [UserController::class, 'organizers'])->name('admin.user.organizers');
  Route::get('user/edit/{id}', [UserController::class, 'edit'])->name('admin.user.edit');
  Route::get('user/view/{id}', [UserController::class, 'view'])->name('admin.user.view');
  Route::delete('user/delete/{id}', [UserController::class, 'delete'])->name('admin.user.delete');
});

// Organizer routes
// Route::prefix('organizer')->middleware(['auth', 'role:2', 'checkActive'])->group(function () {
//   Route::get('dashboard', [OrganizerController::class, 'dashboard'])->name('organizer.dashboard');

//   // Event routes
//   // Route::get('event/add', [NewController::class, 'create'])->name('organizer.event.create');
//   // Route::post('event/store', [NewController::class, 'store'])->name('organizer.event.store');
//   // Route::get('event/all', [NewController::class, 'allEvents'])->name('organizer.events.allOrg');
//   // Route::get('event/edit/{id}', [NewController::class, 'edit'])->name('organizer.event.edit');
//   // Route::put('event/update/{id}', [NewController::class, 'update'])->name('organizer.event.update');
//   // Route::get('event/show/{id}', [NewController::class, 'show'])->name('organizer.event.show');
//   // Route::delete('event/delete/{id}', [NewController::class, 'destroy'])->name('organizer.event.destroy');
//   Route::get('event/add', [OrganizerController::class, 'addEvent'])->name('organizer.event.create');
//   Route::get('event/all', [OrganizerController::class, 'allEvents'])->name('organizer.event.allOrg');
//   Route::get('/organizer/events/all', [EventController::class, 'all'])->name('organizer.events.allOrg');

//   Route::get('event/edit/{id}', [OrganizerController::class, 'editEvent'])->name('organizer.event.edit');
//   Route::get('event/show/{id}', [OrganizerController::class, 'showEvent'])->name('organizer.event.show');
//   // Inside routes/web.php
//   Route::get('/event/{id}/edit', [NewController::class, 'edit'])->name('eventOrg.edit');
//   Route::delete('/event/{id}', [NewController::class, 'destroy'])->name('eventOrg.destroy');
//   Route::put('/events/update/{id}', [NewController::class, 'update'])->name('eventOrg.update');
//   Route::delete('/events/{id}', [NewController::class, 'destroy'])->name('organizer.event.destroy');
// });
// routes/web.php

Route::prefix('organizer')->middleware(['auth', 'role:2', 'checkActive'])->group(function () {
  // Route::get('dashboard', [OrganizerController::class, 'dashboard'])->name('organizer.dashboard');

  // Event routes
  // Route::get('event/add', [OrganizerController::class, 'addEvent'])->name('organizer.event.create');
  // Route::post('event/store', [OrganizerController::class, 'storeEvent'])->name('organizer.event.store');
  // Route::get('event/all', [OrganizerController::class, 'allEvents'])->name('organizer.event.all');
  // Route::get('event/edit/{id}', [OrganizerController::class, 'editEvent'])->name('organizer.event.edit');
  // Route::put('event/update/{id}', [OrganizerController::class, 'updateEvent'])->name('organizer.event.update');
  // Route::get('event/show/{id}', [OrganizerController::class, 'showEvent'])->name('organizer.event.show');
  // routes/web.php
  Route::delete('/eventOrg/{id}', [OrganizerController::class, 'destroy'])->name('eventOrg.destroy');
  Route::get('/organizer/event/edit/{id}', [NewController::class, 'edit'])->name('eventOrg.edit');

  Route::delete('event/delete/{id}', [OrganizerController::class, 'deleteEvent'])->name('organizer.event.destroy');
  Route::get('dashboard', [OrganizerController::class, 'dashboard'])->name('organizer.dashboard');
  Route::get('event/show/{id}', [OrganizerController::class, 'showEvent'])->name('organizer.event.show');
  Route::get('event/edit/{id}', [OrganizerController::class, 'editEvent'])->name('organizer.event.edit');
  Route::get('events/all', [NewController::class, 'index'])->name('event.all');
  Route::post('/organizer/events/store', [NewController::class, 'store'])->name('organizer.addOrg.store');
  Route::get('/event-org/edit/{id}', [NewController::class, 'edit'])->name('eventOrg.edit');
  // Route::get('/event-org/destroy/{id}', [NewController::class, 'destroy'])->name('eventOrg.destroy');
  // Route definition
  Route::get('/organizer/event/edit/{id}', [NewController::class, 'edit'])->name('eventOrg.edit');
  // Route definition for delete
  Route::delete('/organizer/event/delete/{id}', [NewController::class, 'destroy'])->name('organizer.event.destroy');

  Route::put('/organizer/event-org/update/{id}', [NewController::class, 'update'])->name('eventOrg.update');

  Route::get('events/create', [NewController::class, 'create'])->name('event.add');
  Route::delete('event/delete/{id}', [NewController::class, 'deleteEvent'])->name('organizer.event.destroy');
});





// User routes
Route::prefix('user')->middleware(['auth', 'role:3', 'checkActive'])->group(function () {});




// Authentication (login) routes
Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login.store');
// Logout route
Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');





// Profile management routes
Route::middleware(['auth'])->group(function () {
  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



// Register routes
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store'])->name('register.store');
Route::patch('/admin/user/{id}/activate', [UserController::class, 'activate'])->name('admin.user.activate');
Route::patch('/admin/user/{id}/deactivate', [UserController::class, 'deactivate'])->name('admin.user.deactivate');

// Authentication routes
require __DIR__ . '/auth.php';
