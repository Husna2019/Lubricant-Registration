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
      $table->integer('company_detail_id');
      $table->timestamps();
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
