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
    Schema::create('supporting_documents', function (Blueprint $table) {
      $table->id();
      $table->string('name');
      $table->string('path');
      $table->string('extension');
      $table->string('size');
      $table->string('type');
      
      $table->unsignedBigInteger('company_detail_id'); // Change to unsignedBigInteger
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
    Schema::dropIfExists('supporting_documents');
  }
};
