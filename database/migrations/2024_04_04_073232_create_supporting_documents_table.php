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
      $table->string('company_detail_id');

      $table->timestamps();
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
