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
        Schema::create('quantities', function (Blueprint $table) {

            $table->unsignedBigInteger('id');
            $table->foreignId('order_id')->cascadeOnDelete();
            $table->foreignId('food_id')->cascadeOnDelete();
            $table->primary(['order_id', 'food_id'], 'id');
            $table->integer('quantity');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quantities');
    }
};
