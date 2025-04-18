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
        Schema::create('user_slots', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('todayschedule_id');
            $table->unsignedBigInteger('user_id');
            $table->string('username');
            $table->string('mobileno');
            $table->integer('slotno');
            $table->time('time');
            $table->date('date');
            $table->timestamps();
            $table->foreign('todayschedule_id')->references('id')->on('today_schedules')->Delete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->Delete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_slots');
    }
};
