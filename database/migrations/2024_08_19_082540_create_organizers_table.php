<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up()
  {
    Schema::create('organizers', function (Blueprint $table) {
      $table->id();
      $table->string('name');
      // Add other columns as needed
      $table->timestamps();
    });
  }

  public function down()
  {
    Schema::dropIfExists('organizers');
  }
};
