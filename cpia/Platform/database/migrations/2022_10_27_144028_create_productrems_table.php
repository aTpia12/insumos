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
        Schema::create('productrems', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('remission_id');
            $table->foreign('remission_id')
                ->references('id')
                ->on('remissions');
            $table->unsignedBigInteger('product_id');
            $table->string('name');
            $table->integer('cant');
            $table->string('description');
            $table->double('price', 8, 2);
            $table->double('subtotal', 8, 2);
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
        Schema::dropIfExists('productrems');
    }
};
