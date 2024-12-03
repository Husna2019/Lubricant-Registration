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
    Schema::create('comments', function (Blueprint $table) {
      $table->id();
      $table->string('application_id');
      $table->string('stage_id');
      
      $table->unsignedBigInteger('user_id'); // Change to unsignedBigInteger
      $table->string('comments');
      $table->rememberToken();
      $table->timestamps();
      
      // Add the foreign key constraint
      $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
      $table->foreign('application_id')->references('id')->on('applications')->onDelete('cascade');
  });
  
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('comments');
  }
};
