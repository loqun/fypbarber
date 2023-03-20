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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->String('name');
            $table->date('date');
            $table->foreignId('user_id');
            $table->foreignId('slot_id');
            $table->timestamps();
            $table->foreignId('staff_id');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('staff_id')->references('id')->on('staff')->onDelete('cascade');
            $table->foreign('slot_id')->references('id')->on('slots')->onDelete('cascade');

         
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('booking');
    }
};
