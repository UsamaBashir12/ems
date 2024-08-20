<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up()
  {
    Schema::table('events', function (Blueprint $table) {
      $table->string('slug')->unique()->after('title'); // Adjust the column type and position as needed
    });
  }

  public function down()
  {
    Schema::table('events', function (Blueprint $table) {
      $table->dropColumn('slug');
    });
  }
};
