<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('business_name')->unique();
            $table->string('rfc')->unique();
            $table->integer('zipcode');
            $table->string('colony');
            $table->string('street');
            $table->string('out_number');
            $table->string('int_number')->nullable();
            $table->string('city');
            $table->string('locally')->nullable();
            $table->string('state');
            $table->string('country');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
};
