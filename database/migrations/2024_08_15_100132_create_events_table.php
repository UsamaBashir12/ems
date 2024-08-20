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
      $table->id(); // id column (primary key)
      $table->foreignId('user_id')->constrained()->onDelete('cascade'); // user_id column with a foreign key constraint
      $table->enum('status', ['pending', 'confirmed', 'canceled']); // status column with enum values
      $table->string('image')->nullable(); // image column (nullable)
      $table->string('title'); // title column
      $table->text('description'); // description column
      $table->string('location'); // location column
      $table->timestamp('start_time'); // start_time column
      $table->timestamp('end_time'); // end_time column
      $table->timestamps(); // created_at and updated_at columns
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
