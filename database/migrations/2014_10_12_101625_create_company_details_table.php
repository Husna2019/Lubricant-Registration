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
        Schema::create('company_details', function (Blueprint $table) {
            $table->id(); // Ensures it's an unsignedBigInteger
            $table->string('company_name');
            $table->string('license');
            $table->string('region');
            $table->string('block');
            $table->string('address');
            $table->string('telephone');
            $table->string('email');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
        
            // Add foreign key constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_details');
    }
};
