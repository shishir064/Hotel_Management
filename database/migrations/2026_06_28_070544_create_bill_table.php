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
        Schema::create('bill', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')->constrained('room_booking')->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('room_id')->constrained()->onDelete('cascade');
            $table->integer('total');
            $table->string('status');
            $table->string('payment_method');
            $table->string('sub_total')->nullable();
            $table->string('discount')->nullable();
            $table->string('vat')->nullable();
            $table->string('booking_date')->nullable();
            $table->string('check_in_date')->nullable();
            $table->string('check_out_date')->nullable();
            $table->json('items')->nullable();
            $table->longText('remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bill');
    }
};
