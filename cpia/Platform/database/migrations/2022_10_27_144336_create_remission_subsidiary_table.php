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
        Schema::create('remission_subsidiary', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('remission_id');
            $table->unsignedBigInteger('subsidiary_id');
            $table->foreign('remission_id')
                ->references('id')
                ->on('remissions');
                $table->foreign('subsidiary_id')
                ->references('id')
                ->on('subsidiaries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('remission_subsidiary');
    }
};
