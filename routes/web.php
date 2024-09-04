<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\User\UserSideController;
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

// Event page
Route::get('/events', function () {
  return view('events');
})->name('events');
// =============================*** Admin Routes *** ==========================================
Route::prefix('admin')->middleware(['auth', 'role:1', 'checkActive'])->group(function () {
  Route::get('/admin/events/add', [EventController::class, 'create'])->name('admin.event.add');
  Route::post('/admin/events/store', [EventController::class, 'store'])->name('admin.events.store');
  Route::post('/admin/user/store', [UserController::class, 'store'])->name('admin.user.store');
  Route::put('/admin/user/update/{id}', [UserController::class, 'update'])->name('admin.user.update');
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
  Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
  Route::get('app-settings', [SettingsController::class, 'index'])->name('admin.appSettings');
  Route::get('booking/aa', [BookingController::class, 'index'])->name('admin.booking.aa');
  Route::get('admin/category/view/{id}', [CategoryController::class, 'view'])->name('admin.category.view');
  Route::get('/admin/categories', [CategoryController::class, 'index'])->name('dashboard');
  Route::post('category/store', [CategoryController::class, 'store'])->name('admin.category.store');
  Route::get('category/edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
  Route::put('category/update/{id}', [CategoryController::class, 'update'])->name('admin.category.update');
  Route::delete('category/delete/{id}', [CategoryController::class, 'destroy'])->name('admin.category.delete');
  Route::get('event/categories', [EventController::class, 'categories'])->name('event.categories');
  Route::get('/admin/category/view', [CategoryController::class, 'all'])->name('admin.category.all');
  Route::get('user/all', [UserController::class, 'index'])->name('admin.user.all');
  Route::get('user/add', [UserController::class, 'add'])->name('admin.user.add');
  Route::get('user/organizers', [UserController::class, 'organizers'])->name('admin.user.organizers');
  Route::get('user/edit/{id}', [UserController::class, 'edit'])->name('admin.user.edit');
  Route::get('user/view/{id}', [UserController::class, 'view'])->name('admin.user.view');
  Route::delete('user/delete/{id}', [UserController::class, 'delete'])->name('admin.user.delete');
});
// =============================*** Organizer *** ==========================================
Route::prefix('organizer')->middleware(['auth', 'role:2', 'checkActive'])->group(function () {
  Route::delete('/eventOrg/{id}', [OrganizerController::class, 'destroy'])->name('eventOrg.destroy');
  Route::get('/organizer/event/edit/{id}', [NewController::class, 'edit'])->name('eventOrg.edit');

  Route::delete('event/delete/{id}', [OrganizerController::class, 'deleteEvent'])->name('organizer.event.destroy');
  Route::get('dashboard', [OrganizerController::class, 'dashboard'])->name('organizer.dashboard');
  Route::get('event/show/{id}', [OrganizerController::class, 'showEvent'])->name('organizer.event.show');
  Route::get('event/edit/{id}', [OrganizerController::class, 'editEvent'])->name('organizer.event.edit');
  Route::get('events/all', [NewController::class, 'index'])->name('event.all');
  Route::post('/organizer/events/store', [NewController::class, 'store'])->name('organizer.addOrg.store');
  Route::get('/event-org/edit/{id}', [NewController::class, 'edit'])->name('eventOrg.edit');
  Route::get('/organizer/event/edit/{id}', [NewController::class, 'edit'])->name('eventOrg.edit');
  Route::delete('/organizer/event/delete/{id}', [NewController::class, 'destroy'])->name('organizer.event.destroy');
  Route::put('/organizer/event-org/update/{id}', [NewController::class, 'update'])->name('eventOrg.update');
  Route::get('events/create', [NewController::class, 'create'])->name('event.add');
  Route::delete('event/delete/{id}', [NewController::class, 'deleteEvent'])->name('organizer.event.destroy');
});
// =============================*** Users *** ==========================================
Route::prefix('user')->middleware(['auth', 'role:3', 'checkActive'])->group(function () {
  Route::get('dashboard', [UserSideController::class, 'dashboard'])->name('user.dashboard');
  Route::post('/events/book/{event}', [UserSideController::class, 'bookEvent'])->name('events.book');
  Route::post('/user/events/book/{event}', [UserSideController::class, 'bookEvent'])->name('events.book');
  Route::get('/user/events/booked', [UserSideController::class, 'viewBookedEvents'])->name('events.booked');
  Route::get('/user/events/booked', [UserSideController::class, 'viewBookedEvents'])->name('events.booked');
  Route::get('/user/events/booked', [UserSideController::class, 'viewBookedEvents'])->name('events.booked');
});
Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login.store');
Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
// =============================*** Auth *** ==========================================
Route::middleware(['auth'])->group(function () {
  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// =============================*** Register *** ==========================================
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store'])->name('register.store');
Route::patch('/admin/user/{id}/activate', [UserController::class, 'activate'])->name('admin.user.activate');
Route::patch('/admin/user/{id}/deactivate', [UserController::class, 'deactivate'])->name('admin.user.deactivate');

// Authentication routes
require __DIR__ . '/auth.php';
