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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tenant_id')->constrained('tenants')->onDelete('cascade'); // Relasi ke penghuni
            $table->string('month_paid'); // Bulan pembayaran (cth: "Oktober 2026")
            $table->decimal('amount', 12, 2); // Jumlah transfer
            $table->date('payment_date'); // Tanggal pembayaran dilakukan
            $table->enum('payment_method', ['transfer', 'cash']); // Transfer / Cash (sesuai temuan wawancara)
            $table->string('proof_image')->nullable(); // Foto bukti transfer
            $table->enum('status', ['paid', 'pending', 'overdue'])->default('paid'); // Status tagihan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
