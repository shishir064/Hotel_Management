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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->integer('room_no');
            $table->foreignId('hotel_id')->constrained()->onDelete('cascade');
            $table->string('room_type')->default('single');
            $table->string('room_status')->default('available');
            $table->integer('room_price')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();

        Schema::dropIfExists('rooms');

        Schema::enableForeignKeyConstraints();
    }
};
