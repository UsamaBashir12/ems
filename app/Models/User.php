<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class User extends Authenticatable
{
  protected $fillable = ['first_name', 'last_name', 'email', 'phone', 'gender', 'dob', 'role_id', 'password'];

  // public function role(): BelongsTo
  // {
  //   return $this->belongsTo(Role::class);
  // }
  public function role()
  {
    return $this->belongsTo(Role::class);
  }

  public function hasRole($roleId)
  {
    return $this->role_id == $roleId;
  }
  public function isAdmin()
  {
    return $this->role_id === 1; // Assuming 1 is the ID for 'admin'
  }

  public function isOrganizer()
  {
    return $this->role_id === 2; // Assuming 2 is the ID for 'organizer'
  }

  public function isUser()
  {
    return $this->role_id === 3; // Assuming 3 is the ID for 'user'
  }
}
