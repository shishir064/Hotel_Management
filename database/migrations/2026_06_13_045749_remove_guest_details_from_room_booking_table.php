<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('room_booking', function (Blueprint $table) {
            $table->dropColumn(['guest_name', 'email', 'phone']);
        });
    }

    public function down(): void
    {
        Schema::table('room_booking', function (Blueprint $table) {
            $table->string('guest_name');
            $table->string('email');
            $table->string('phone');
        });
    }
};
