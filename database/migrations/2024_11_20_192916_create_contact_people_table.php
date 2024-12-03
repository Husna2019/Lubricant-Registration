<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactPeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_people', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('title');
            $table->string('address2');
            $table->string('cellphone');
            $table->string('cellphone1');
            $table->string('email2');
            $table->unsignedBigInteger('company_detail_id'); // Change to unsignedBigInteger
            $table->timestamps();

            // Add the foreign key constraint
            $table->foreign('company_detail_id')->references('id')->on('company_details')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contact_people');
    }
}
