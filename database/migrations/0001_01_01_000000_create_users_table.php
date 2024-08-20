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
      $table->string('gender'); // Ensure these are present
      $table->date('dob');
      $table->enum('status', ['active', 'deactive']);
      $table->string('password');
      $table->timestamps();

      // Define foreign key relationship for 'role_id'
      $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
    });



    Schema::create('password_reset_tokens', function (Blueprint $table) {
      $table->string('email')->primary(); // primary key for email
      $table->string('token'); // reset token
      $table->timestamp('created_at')->nullable(); // timestamp for token creation
    });

    Schema::create('sessions', function (Blueprint $table) {
      $table->string('id')->primary(); // session id as primary key
      $table->foreignId('user_id')->nullable()->index(); // foreign key referencing users table
      $table->string('ip_address', 45)->nullable(); // IP address
      $table->text('user_agent')->nullable(); // user agent
      $table->longText('payload'); // session data
      $table->integer('last_activity')->index(); // timestamp of last activity
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('users');
    Schema::dropIfExists('password_reset_tokens');
    Schema::dropIfExists('sessions');
  }
};
