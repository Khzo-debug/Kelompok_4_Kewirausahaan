<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Room;
use App\Models\Tenant;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    // Halaman Dasbor Utama
    public function dashboard()
    {
        $totalRooms = Room::count();
        $occupiedRooms = Room::where('status', 'occupied')->count();
        $availableRooms = Room::where('status', 'available')->count();
        $totalTenants = Tenant::where('status', 'active')->count();

        // Total Pemasukan Bulan Ini
        $totalIncome = Payment::where('status', 'paid')->sum('amount');

        // Transaksi Pembayaran Terbaru
        $recentPayments = Payment::with('tenant.room')->latest()->take(5)->get();

        return view('dashboard', compact(
            'totalRooms',
            'occupiedRooms',
            'availableRooms',
            'totalTenants',
            'totalIncome',
            'recentPayments'
        ));
    }

    // Tampilkan semua riwayat pembayaran
    public function index()
    {
        $payments = Payment::with('tenant.room')->latest()->get();
        return view('payments.index', compact('payments'));
    }

    // Tampilkan formulir tambah pembayaran
    public function create()
    {
        $tenants = Tenant::where('status', 'active')->get();
        return view('payments.create', compact('tenants'));
    }

    // Simpan data pembayaran baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tenant_id'      => 'required|exists:tenants,id',
            'month_paid'     => 'required|string',
            'amount'         => 'required|numeric',
            'payment_date'   => 'required|date',
            'payment_method' => 'required|in:transfer,cash',
            'proof_image'    => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('proof_image')) {
            $validated['proof_image'] = $request->file('proof_image')->store('proofs', 'public');
        }

        $validated['status'] = 'paid';

        Payment::create($validated);

        return redirect()->route('payments.index')->with('success', 'Pembayaran berhasil dicatat!');
    }
}
