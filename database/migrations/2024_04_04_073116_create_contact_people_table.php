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
    Schema::create('contact_people', function (Blueprint $table) { 
      $table->increments('id');
      $table->string('name');
      $table->string('title');
      $table->string('address2');
      $table->string('cellphone');
      $table->string('cellphone1');
      $table->string('email2');
   //   $table->integer('company_detail_id'); 
      $table->timestamps(); 

      // Add the foreign key constraint
      $table->unsignedBigInteger('company_detail_id'); // Ensures it's an unsignedBigInteger
      $table->timestamps();
  
      // Add the foreign key constraint
      $table->foreign('company_detail_id')->references('id')->on('company_details')->onDelete('cascade');
  });
  
  
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('contact_people');
  }
};
