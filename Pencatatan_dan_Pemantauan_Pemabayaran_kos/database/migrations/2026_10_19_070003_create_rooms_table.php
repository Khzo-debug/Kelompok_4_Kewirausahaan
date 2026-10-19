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
            $table->string('room_number')->unique(); // Nomor kamar (cth: A01, B02)
            $table->string('type')->default('Standard'); // Tipe kamar
            $table->decimal('price', 12, 2); // Harga sewa per bulan
            $table->enum('status', ['available', 'occupied'])->default('available'); // Status terisi/kosong
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
