<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewBookingsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('bookings', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('event_id'); // Foreign key for event
      $table->unsignedBigInteger('user_id');  // Foreign key for user booking the ticket
      $table->integer('free_quantity')->default(0);
      $table->integer('normal_quantity')->default(0);
      $table->integer('all_quantity')->default(0);
      $table->integer('business_quantity')->default(0);
      $table->integer('first_quantity')->default(0);
      $table->decimal('total_price', 10, 2);  // Total price of the booking
      $table->timestamps();

      // Add foreign key constraint for event and user
      $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
      $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('bookings');
  }
}
