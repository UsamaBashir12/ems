<?php
// database/migrations/xxxx_xx_xx_create_categories_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
  public function up()
  {
    Schema::create('categories', function (Blueprint $table) {
      $table->id();
      $table->string('title');
      $table->string('slug')->unique();
      $table->text('description');
      $table->foreignId('parent_id')->nullable()->constrained('categories')->onDelete('set null');
      $table->string('image')->nullable();
      $table->boolean('status')->default(true);
      $table->timestamps();
    });
  }

  public function down()
  {
    Schema::dropIfExists('categories');
  }
}
