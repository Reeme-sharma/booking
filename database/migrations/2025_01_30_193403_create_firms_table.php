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
        Schema::create('firms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('firm_name')->unique();
            $table->string('firm_mobile');
            $table->string('pincode');
            $table->date('since')->nullable();
            $table->string('street');
            $table->string('landmark');
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->string('pan_no')->nullable();
            $table->string('map')->nullable();
            $table->string('register_no')->nullable();
            $table->string('gst_no')->nullable();
            $table->string('profilepic')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->delete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('firms');
    }
};
