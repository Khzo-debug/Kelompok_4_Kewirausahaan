<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pembayaran Kos</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 pb-10">

    <!-- Navbar Navigasi -->
    @include('layouts.navigation')

    <div class="max-w-6xl mx-auto px-4 bg-white p-6 rounded-lg shadow-sm border border-gray-100">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Riwayat Pembayaran Kos</h1>

            <div class="space-x-2">
                @if(auth()->check() && auth()->user()->role === 'admin')
                    <a href="{{ route('payments.exportPdf') }}" class="bg-red-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-red-700 transition">
                        📄 Unduh PDF
                    </a>
                    <a href="{{ route('payments.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-blue-700 transition">
                        + Tambah Pembayaran
                    </a>
                @endif
            </div>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 text-sm">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4 text-sm">
                {{ session('error') }}
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="w-full border-collapse border border-gray-200 text-sm">
                <thead>
                    <tr class="bg-gray-50 text-left font-semibold text-gray-600 uppercase text-xs">
                        <th class="p-3 border">No. Kamar</th>
                        <th class="p-3 border">Nama Penghuni</th>
                        <th class="p-3 border">Bulan</th>
                        <th class="p-3 border">Jumlah</th>
                        <th class="p-3 border">Tanggal Bayar</th>
                        <th class="p-3 border">Metode</th>
                        <th class="p-3 border">Bukti</th>
                        <th class="p-3 border">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($payments as $payment)
                        <tr class="hover:bg-gray-50">
                            <td class="p-3 border font-semibold text-gray-700">{{ $payment->tenant->room->room_number ?? '-' }}</td>
                            <td class="p-3 border">{{ $payment->tenant->name ?? '-' }}</td>
                            <td class="p-3 border">{{ $payment->month_paid }}</td>
                            <td class="p-3 border">Rp {{ number_format($payment->amount, 0, ',', '.') }}</td>
                            <td class="p-3 border">{{ $payment->payment_date }}</td>
                            <td class="p-3 border uppercase text-xs font-semibold">
                                <span class="px-2 py-1 rounded {{ $payment->payment_method == 'transfer' ? 'bg-blue-100 text-blue-800' : 'bg-amber-100 text-amber-800' }}">
                                    {{ $payment->payment_method }}
                                </span>
                            </td>
                            <td class="p-3 border text-center">
                                @if($payment->proof_image)
                                    <a href="{{ asset('storage/' . $payment->proof_image) }}" target="_blank" class="text-blue-600 underline text-xs font-semibold">
                                        🖼️ Lihat Bukti
                                    </a>
                                @else
                                    <span class="text-gray-400 text-xs">-</span>
                                @endif
                            </td>
                            <td class="p-3 border">
                                <span class="px-2 py-1 text-xs font-semibold rounded bg-green-100 text-green-800">
                                    {{ ucfirst($payment->status) }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center p-4 text-gray-500">Belum ada data pembayaran.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
