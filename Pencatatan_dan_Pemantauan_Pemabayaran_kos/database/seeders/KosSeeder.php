<?php

namespace Database\Seeders;

use App\Models\Tenant;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class KosSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buat Akun Pengguna (User & Admin)
        User::create([
            'name'     => 'Pemilik Kos',
            'email'    => 'admin@kos.com',
            'password' => Hash::make('password123'),
            'role'     => 'admin',
        ]);

        User::create([
            'name'     => 'Budi Santoso',
            'email'    => 'budi@gmail.com',
            'password' => Hash::make('password123'),
            'role'     => 'tenant',
        ]);

        // 2. Buat Data Kamar
        $room1Id = DB::table('rooms')->insertGetId([
            'room_number' => 'A01',
            'type'        => 'VIP',
            'price'       => 1500000,
            'status'      => 'occupied',
            'created_at'  => now(),
            'updated_at'  => now(),
        ]);

        $room2Id = DB::table('rooms')->insertGetId([
            'room_number' => 'A02',
            'type'        => 'Standard',
            'price'       => 1000000,
            'status'      => 'occupied',
            'created_at'  => now(),
            'updated_at'  => now(),
        ]);

        DB::table('rooms')->insert([
            'room_number' => 'B01',
            'type'        => 'Standard',
            'price'       => 1000000,
            'status'      => 'available',
            'created_at'  => now(),
            'updated_at'  => now(),
        ]);

        // 3. Buat Data Penghuni
        $tenant1 = Tenant::create([
            'room_id'      => $room1Id,
            'name'         => 'Budi Santoso',
            'phone_number' => '081234567890',
            'entry_date'   => '2026-01-10',
            'status'       => 'active',
        ]);

        $tenant2 = Tenant::create([
            'room_id'      => $room2Id,
            'name'         => 'Siti Rahma',
            'phone_number' => '089876543210',
            'entry_date'   => '2026-02-01',
            'status'       => 'active',
        ]);

        // 4. Buat Data Pembayaran
        Payment::create([
            'tenant_id'      => $tenant1->id,
            'month_paid'     => 'Oktober 2026',
            'amount'         => 1500000,
            'payment_date'   => '2026-10-01',
            'payment_method' => 'transfer',
            'status'         => 'paid',
        ]);

        Payment::create([
            'tenant_id'      => $tenant2->id,
            'month_paid'     => 'Oktober 2026',
            'amount'         => 1000000,
            'payment_date'   => '2026-10-03',
            'payment_method' => 'cash',
            'status'         => 'paid',
        ]);
    }
}
