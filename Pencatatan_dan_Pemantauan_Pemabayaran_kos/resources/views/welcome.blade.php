<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KosManager - Sistem Informasi Pengelolaan Kos</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800 antialiased min-h-screen flex flex-col justify-between">

    <!-- Header / Navbar Landing Page -->
    <header class="bg-white border-b border-gray-200">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex justify-between items-center">
            <a href="/" class="flex items-center space-x-2 text-xl font-bold text-blue-600">
                <span>🏠 KosManager</span>
            </a>

            <div>
                @if (Route::has('login'))
                    <div class="space-x-3">
                        @auth
                            <a href="{{ route('dashboard') }}" class="px-4 py-2 bg-blue-600 text-white text-sm font-semibold rounded-lg hover:bg-blue-700 transition">
                                进入 Dasbor
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="px-4 py-2 border border-gray-300 text-gray-700 text-sm font-semibold rounded-lg hover:bg-gray-50 transition">
                                Masuk (Login)
                            </a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="px-4 py-2 bg-blue-600 text-white text-sm font-semibold rounded-lg hover:bg-blue-700 transition">
                                    Daftar Akun
                                </a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
        </div>
    </header>

    <!-- Hero Content Section -->
    <main class="max-w-4xl mx-auto px-4 py-16 text-center">
        <div class="inline-block px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-xs font-semibold uppercase tracking-wider mb-4">
            Sistem Informasi Pengelolaan & Pemantauan Kos
        </div>
        
        <h1 class="text-4xl sm:text-5xl font-extrabold text-gray-900 leading-tight mb-6">
            Kelola Pembayaran & Data Penghuni Kos Lebih Mudah
        </h1>

        <p class="text-lg text-gray-600 max-w-2xl mx-auto mb-8">
            Pantau status keterisian kamar, catat transaksi pembayaran, cetak laporan PDF keuangan, dan berikan akses pemantauan transparan untuk pemilik maupun penghuni kos.
        </p>

        <div class="flex justify-center space-x-4">
            @auth
                <a href="{{ route('dashboard') }}" class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 transition">
                    Buka Dasbor Pemantauan →
                </a>
            @else
                <a href="{{ route('login') }}" class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 transition">
                    Mulai Masuk Aplikasi
                </a>
            @endauth
        </div>

        <!-- Fitur Unggulan -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-16 text-left">
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                <div class="text-2xl mb-2">📊</div>
                <h3 class="font-bold text-gray-800 mb-1">Dasbor Keuangan</h3>
                <p class="text-sm text-gray-500">Ringkasan total pemasukan bulanan dan status keterisian kamar secara real-time.</p>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                <div class="text-2xl mb-2">📄</div>
                <h3 class="font-bold text-gray-800 mb-1">Laporan PDF</h3>
                <p class="text-sm text-gray-500">Cetak dan unduh rekapitulasi data pembayaran kos langsung dalam format PDF.</p>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                <div class="text-2xl mb-2">🔐</div>
                <h3 class="font-bold text-gray-800 mb-1">Pemisahan Akses</h3>
                <p class="text-sm text-gray-500">Akses khusus Admin untuk pencatatan dan User/Penghuni untuk pemantauan tagihan.</p>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200 py-6 text-center text-xs text-gray-500">
        <p>&copy; {{ date('Y') }} KosManager. Dibuat dengan Laravel {{ app()->version() }}.</p>
    </footer>

</body>
</html>
