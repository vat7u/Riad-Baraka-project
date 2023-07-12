<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $currentDateTime = Carbon::now('GMT+1');
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('order_type_id')->constrained()->cascadeOnDelete();
            $table->longText('cart');
            $table->string('table');
            $table->longText('conditions');
            $table->double('amount');
            $table->string('status')->default('pending');
            $table->timestamp('created_time')->insert($currentDateTime);
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
        Schema::dropIfExists('orders');
    }
};
