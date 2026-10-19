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
        Schema::create('tenants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('room_id')->constrained('rooms')->onDelete('cascade'); // Relasi ke tabel kamar
            $table->string('name'); // Nama lengkap penghuni
            $table->string('phone_number'); // Nomor WhatsApp/HP
            $table->date('entry_date'); // Tanggal mulai masuk kos
            $table->enum('status', ['active', 'moved_out'])->default('active'); // Status huni
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tenants');
    }
};
