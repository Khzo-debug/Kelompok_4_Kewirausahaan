<?php

use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Rute Umum setelah Login (Akses Admin & Tenant)
Route::middleware(['auth'])->group(function () {
    Route::get('/', [PaymentController::class, 'dashboard'])->name('dashboard');
    Route::get('/payments', [PaymentController::class, 'index'])->name('payments.index');

    // Profile Routes (Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rute Khusus Admin (Pemilik Kos)
Route::middleware(['auth', \App\Http\Middleware\IsAdmin::class])->group(function () {
    Route::get('/payments/create', [PaymentController::class, 'create'])->name('payments.create');
    Route::post('/payments', [PaymentController::class, 'store'])->name('payments.store');
    Route::get('/payments/export-pdf', [PaymentController::class, 'exportPdf'])->name('payments.exportPdf');
});

require __DIR__.'/auth.php';