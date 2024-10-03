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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('trainer_id');
            $table->unsignedBigInteger('class_time_id');
            $table->string('book_id')->unique();
            $table->string('name');
            $table->string('email');
            $table->string('phone_number');
            $table->date('date');
            $table->time('start_time');
            $table->time('end_time');
            $table->string('status')->default('Pending');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('trainer_id')->references('id')->on('trainers')->onDelete('set null');
            $table->foreign('class_time_id')->references('id')->on('class_times')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
