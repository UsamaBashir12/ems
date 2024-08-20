<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('events', function (Blueprint $table) {
      $table->id();
      $table->string('title');
      $table->string('slug')->unique();
      $table->text('description');
      $table->unsignedBigInteger('category_id');
      $table->date('start_date');
      $table->time('start_time');
      $table->date('end_date');
      $table->time('end_time');
      $table->string('address');
      $table->string('city');
      $table->string('state');
      $table->string('zip_code');
      $table->integer('seats_available');
      $table->boolean('status');
      $table->string('image')->nullable();
      $table->json('gallery')->nullable();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('events');
  }
};
