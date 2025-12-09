<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('email');
            $table->string('phone');
            $table->string('country');
            $table->string('language')->nullable();

            $table->string('package');
            $table->integer('travelers');
            $table->integer('adults');
            $table->string('children_ages')->nullable();

            $table->date('start_date');
            $table->date('end_date');
            $table->string('alternative_dates')->nullable();

            $table->string('accommodation_level')->default('Luxury');
            $table->string('room_type')->default('Double');
            $table->string('dietary_restrictions')->default('None');
            $table->text('special_requests')->nullable();

            $table->string('arrival_method')->default('Flight');
            $table->dateTime('arrival_date_time');
            $table->string('flight_number')->nullable();

            $table->string('payment_method');
            $table->string('payment_option')->default('Deposit');

            $table->string('emergency_name');
            $table->string('emergency_relation');
            $table->string('emergency_phone');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
