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
        Schema::table('bill', function (Blueprint $table) {
            $table->foreignId('room_booking_id')->constrained('room_booking')->onDelete('cascade');
            $table->string('sub_total')->nullable();
            $table->string('discount')->nullable();
            $table->string('vat')->nullable();
            $table->string('booking_date')->nullable();
            $table->string('check_in_date')->nullable();
            $table->string('check_out_date')->nullable();
            $table->json('items')->nullable();
            $table->longText('remarks')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bill', function (Blueprint $table) {
            $table->dropColumn('room_booking_id');
            $table->dropColumn('sub_total');
            $table->dropColumn('discount');
            $table->dropColumn('vat');
            $table->dropColumn('check_in_date');
            $table->dropColumn('check_out_date');
            $table->dropColumn('items');
            $table->dropColumn('remarks');
        });
    }
};
