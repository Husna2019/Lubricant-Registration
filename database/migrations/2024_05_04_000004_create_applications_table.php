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
        if (!Schema::hasTable('applications')) {
            Schema::create('applications', function (Blueprint $table) {
                $table->id();
                $table->string('application_number');
              
                $table->unsignedBigInteger('company_detail_id');
                $table->rememberToken();
                $table->timestamps();

                // Add the foreign key constraint
                $table->foreign('company_detail_id')
                      ->references('id')
                     ->on('company_details')
                      ->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('applications')) {
            Schema::dropIfExists('applications');
        }
    }
};
