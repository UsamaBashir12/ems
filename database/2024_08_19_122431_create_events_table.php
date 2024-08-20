<?php
// database/migrations/xxxx_xx_xx_create_events_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->text('description');
            $table->unsignedBigInteger('category_id');
            $table->date('start_date'); // Ensure this column exists
            $table->time('start_time');
            $table->date('end_date'); // Ensure this column exists
            $table->time('end_time');
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('zip_code');
            $table->integer('seats_available');
            $table->integer('status');
            $table->string('image')->nullable();
            $table->json('gallery')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('events');
    }
};
