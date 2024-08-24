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
    Schema::create('users', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('role_id');
      $table->string('first_name');
      $table->string('last_name');
      $table->string('email')->unique();
      $table->string('phone');
      $table->string('gender');
      $table->date('dob');
      $table->enum('status', ['active', 'deactive']);
      $table->string('password');
      $table->timestamps();

      // Foreign key relationship for 'role_id'
      $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
    });

    Schema::create('password_reset_tokens', function (Blueprint $table) {
      $table->string('email')->primary(); // Email as primary key
      $table->string('token'); // Reset token
      $table->timestamp('created_at')->nullable(); // Timestamp for token creation
    });

    Schema::create('sessions', function (Blueprint $table) {
      $table->string('id')->primary(); // Session ID as primary key
      $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null'); // Foreign key referencing users table
      $table->string('ip_address', 45)->nullable(); // IP address
      $table->text('user_agent')->nullable(); // User agent
      $table->longText('payload'); // Session data
      $table->integer('last_activity')->index(); // Timestamp of last activity
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('sessions');
    Schema::dropIfExists('password_reset_tokens');
    Schema::dropIfExists('users');
  }
};
