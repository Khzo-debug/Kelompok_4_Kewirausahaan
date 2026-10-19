<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dasbor Pengelolaan Rumah Kos</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 pb-10">

    <!-- Navbar Navigasi -->
    @include('layouts.navigation')

    <div class="max-w-6xl mx-auto px-4 space-y-6">
        
        <!-- Welcome Banner -->
        <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100 flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Selamat Datang, {{ auth()->user()->name }}!</h1>
                <p class="text-gray-500 text-sm">Sistem Informasi Pengelolaan & Pemantauan Pembayaran Kos</p>
            </div>
            @if(auth()->check() && auth()->user()->role === 'admin')
                <a href="{{ route('payments.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-blue-700 transition shadow">
                    + Catat Pembayaran Baru
                </a>
            @endif
        </div>

        <!-- Kartu Ringkasan (Summary) -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div class="bg-white p-5 rounded-lg shadow-sm border-l-4 border-blue-500">
                <p class="text-xs font-bold text-gray-500 uppercase">Total Kamar</p>
                <p class="text-2xl font-bold text-gray-800 mt-1">{{ $totalRooms }} Kamar</p>
                <p class="text-xs text-gray-500 mt-1">{{ $occupiedRooms }} Terisi | {{ $availableRooms }} Kosong</p>
            </div>

            <div class="bg-white p-5 rounded-lg shadow-sm border-l-4 border-green-500">
                <p class="text-xs font-bold text-gray-500 uppercase">Penghuni Aktif</p>
                <p class="text-2xl font-bold text-gray-800 mt-1">{{ $totalTenants }} Orang</p>
            </div>

            <div class="bg-white p-5 rounded-lg shadow-sm border-l-4 border-purple-500">
                <p class="text-xs font-bold text-gray-500 uppercase">Total Pemasukan</p>
                <p class="text-2xl font-bold text-purple-700 mt-1">Rp {{ number_format($totalIncome, 0, ',', '.') }}</p>
            </div>

            <div class="bg-white p-5 rounded-lg shadow-sm border-l-4 border-amber-500">
                <p class="text-xs font-bold text-gray-500 uppercase">Role Anda</p>
                <p class="text-lg font-bold text-amber-700 uppercase mt-1">{{ auth()->user()->role }}</p>
            </div>
        </div>

        <!-- Tabel Transaksi Terbaru -->
        <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-bold text-gray-800">Transaksi Pembayaran Terbaru</h2>
                <a href="{{ route('payments.index') }}" class="text-sm text-blue-600 hover:underline">Lihat Semua →</a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full border-collapse border border-gray-200 text-sm">
                    <thead>
                        <tr class="bg-gray-50 text-left font-semibold text-gray-600 uppercase text-xs">
                            <th class="p-3 border">No. Kamar</th>
                            <th class="p-3 border">Nama Penghuni</th>
                            <th class="p-3 border">Bulan</th>
                            <th class="p-3 border">Jumlah</th>
                            <th class="p-3 border">Metode</th>
                            <th class="p-3 border">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse($recentPayments as $payment)
                            <tr class="hover:bg-gray-50">
                                <td class="p-3 border font-semibold text-gray-700">{{ $payment->tenant->room->room_number ?? '-' }}</td>
                                <td class="p-3 border">{{ $payment->tenant->name ?? '-' }}</td>
                                <td class="p-3 border">{{ $payment->month_paid }}</td>
                                <td class="p-3 border">Rp {{ number_format($payment->amount, 0, ',', '.') }}</td>
                                <td class="p-3 border uppercase text-xs font-semibold">
                                    <span class="px-2 py-1 rounded {{ $payment->payment_method == 'transfer' ? 'bg-blue-100 text-blue-800' : 'bg-amber-100 text-amber-800' }}">
                                        {{ $payment->payment_method }}
                                    </span>
                                </td>
                                <td class="p-3 border">
                                    <span class="px-2 py-1 text-xs font-semibold rounded bg-green-100 text-green-800">
                                        {{ ucfirst($payment->status) }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center p-4 text-gray-500">Belum ada transaksi pembayaran.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</body>
</html>
