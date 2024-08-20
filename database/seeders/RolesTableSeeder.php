<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
  /**
   * Seed the roles table.
   */
  public function run(): void
  {
    $roles = [
      ['name' => 'admin'],
      ['name' => 'organizer'],
      ['name' => 'user'],
    ];

    DB::table('roles')->insert($roles);
  }
}
