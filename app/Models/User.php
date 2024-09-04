<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
  protected $fillable = [
    'first_name',
    'last_name',
    'email',
    'phone',
    'gender',
    'dob',
    'role_id',
    'password'
  ];

  /**
   * Define the relationship between the User and Role.
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function role(): BelongsTo
  {
    return $this->belongsTo(Role::class);
  }

  /**
   * Check if the user has a specific role.
   *
   * @param int $roleId
   * @return bool
   */
  public function hasRole($roleId): bool
  {
    return $this->role_id === (int) $roleId;
  }

  /**
   * Check if the user is an admin.
   *
   * @return bool
   */
  public function isAdmin(): bool
  {
    return $this->role_id === 1; // Assuming 1 is the ID for 'admin'
  }

  /**
   * Check if the user is an organizer.
   *
   * @return bool
   */
  public function isOrganizer(): bool
  {
    return $this->role_id === 2; // Assuming 2 is the ID for 'organizer'
  }

  /**
   * Check if the user is a regular user.
   *
   * @return bool
   */
  public function isUser(): bool
  {
    return $this->role_id === 3; // Assuming 3 is the ID for 'user'
  }

  /**
   * Define the relationship between the User and Event.
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function events(): HasMany
  {
    return $this->hasMany(Event::class, 'organizer_id');
  }
  //   public function events()
  // {
  //     return $this->belongsToMany(Event::class);
  // }
  public function bookedEvents()
  {
    return $this->belongsToMany(Event::class, 'bookings'); // Assuming you have a 'bookings' pivot table
  }
}
