<nav class="bg-white border-b border-gray-200 shadow-sm mb-6">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Logo / Judul Sistem & Menu -->
            <div class="flex items-center space-x-8">
                <a href="{{ route('dashboard') }}" class="flex items-center space-x-2 text-xl font-bold text-blue-600">
                    <span>🏠 KosManager</span>
                </a>

                <!-- Link Navigasi Utama -->
                <div class="flex space-x-4 text-sm font-medium">
                    <a href="{{ route('dashboard') }}" 
                       class="px-3 py-2 rounded-md transition {{ request()->routeIs('dashboard') ? 'bg-blue-50 text-blue-600 font-semibold' : 'text-gray-600 hover:text-blue-600' }}">
                        📊 Dasbor
                    </a>
                    
                    <a href="{{ route('payments.index') }}" 
                       class="px-3 py-2 rounded-md transition {{ request()->routeIs('payments.index') ? 'bg-blue-50 text-blue-600 font-semibold' : 'text-gray-600 hover:text-blue-600' }}">
                        💳 Riwayat Pembayaran
                    </a>

                    @if(auth()->check() && auth()->user()->role === 'admin')
                        <a href="{{ route('payments.create') }}" 
                           class="px-3 py-2 rounded-md transition {{ request()->routeIs('payments.create') ? 'bg-blue-50 text-blue-600 font-semibold' : 'text-gray-600 hover:text-blue-600' }}">
                            ➕ Catat Bayar
                        </a>
                    @endif
                </div>
            </div>

            <!-- Bagian Kanan: User Info, Unduh PDF & Logout -->
            <div class="flex items-center space-x-4">
                @if(auth()->check() && auth()->user()->role === 'admin')
                    <a href="{{ route('payments.exportPdf') }}" class="hidden sm:inline-flex items-center px-3 py-1.5 bg-red-600 text-white text-xs font-semibold rounded-lg hover:bg-red-700 transition">
                        📄 Unduh PDF
                    </a>
                @endif

                <div class="text-right">
                    <p class="text-xs font-semibold text-gray-800">{{ auth()->user()->name ?? 'Pengguna' }}</p>
                    <span class="text-[10px] px-2 py-0.5 rounded uppercase font-bold {{ auth()->user()->role === 'admin' ? 'bg-purple-100 text-purple-800' : 'bg-green-100 text-green-800' }}">
                        {{ auth()->user()->role ?? 'Tenant' }}
                    </span>
                </div>

                <!-- Form Logout -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-xs text-red-600 font-semibold hover:underline border-l pl-3 border-gray-300">
                        Keluar 🚪
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>
