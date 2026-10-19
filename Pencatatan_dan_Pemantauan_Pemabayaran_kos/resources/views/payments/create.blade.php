<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catat Pembayaran Baru</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Catat Pembayaran Kos Baru</h1>

        <form action="{{ route('payments.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <div>
                <label class="block text-sm font-medium text-gray-700">Penghuni Kos</label>
                <select name="tenant_id" required class="w-full mt-1 p-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500">
                    <option value="">-- Pilih Penghuni --</option>
                    @foreach($tenants as $tenant)
                        <option value="{{ $tenant->id }}">
                            {{ $tenant->name }} (Kamar {{ $tenant->room->room_number ?? '-' }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Pembayaran Bulan</label>
                <input type="text" name="month_paid" placeholder="Contoh: Oktober 2026" required class="w-full mt-1 p-2 border rounded-lg">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Jumlah (Rp)</label>
                <input type="number" name="amount" placeholder="500000" required class="w-full mt-1 p-2 border rounded-lg">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Tanggal Bayar</label>
                <input type="date" name="payment_date" required class="w-full mt-1 p-2 border rounded-lg">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Metode Pembayaran</label>
                <select name="payment_method" required class="w-full mt-1 p-2 border rounded-lg">
                    <option value="transfer">Transfer Bank</option>
                    <option value="cash">Tunai (Cash)</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Bukti Transfer (Opsional)</label>
                <input type="file" name="proof_image" accept="image/*" class="w-full mt-1 p-2 border rounded-lg">
            </div>

            <div class="flex justify-end space-x-3 pt-4">
                <a href="{{ route('payments.index') }}" class="px-4 py-2 border rounded-lg text-gray-600 hover:bg-gray-50">Batal</a>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Simpan Pembayaran</button>
            </div>
        </form>
    </div>
</body>
</html>


