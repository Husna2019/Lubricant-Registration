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
    Schema::create('lubricant_details', function (Blueprint $table) {
      $table->id();
      $table->string('lubricant_name');
      $table->string('lubricant_type');
      $table->string('lubricant_performance_level');
      $table->string('lubricant_brand');
      $table->string('certification_name');
      $table->string('approval_status')->default('Pending');//Approved, Appeal, Rejected

      
      $table->integer('company_detail_id');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('lubricant_details');
  }
};
