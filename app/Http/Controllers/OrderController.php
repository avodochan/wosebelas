<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function store(Request $request)
{
    // Validasi data form
    $validated = $request->validate([
        'nama' => 'required|string|max:255',
        'email' => 'required|email',
        'no_telepon' => 'required|string|max:20',
        'nik' => 'required|string|max:16',
        'gender' => 'required|string',
        'alamat' => 'required|string',
        'tanggal_acara' => 'required|date',
    ]);

    // Hitung total biaya berdasarkan item yang dipesan
    $items = session()->get('items'); // Ambil data item dari session atau sumber lain
    $grandTotal = 0;

    if (isset($items['dekorasi'])) {
        $grandTotal += $items['dekorasi']['harga'];
    }

    if (isset($items['dokumentasi'])) {
        $grandTotal += $items['dokumentasi']['harga'] * $items['dokumentasi']['kuantitas'];
    }

    if (isset($items['undangan'])) {
        $grandTotal += $items['undangan']['harga'] * $items['undangan']['kuantitas'];
    }

    // Buat entri di tabel orders
    $order = Order::create([
        'user_id' => Auth::id(), // Ambil user ID yang sedang login
        'status' => 'pending',   // Status default
        'tanggal_acara' => $request->tanggal_acara,
        'total_biaya' => $grandTotal, // Simpan total biaya yang telah dihitung
    ]);

    // Setelah berhasil, redirect dengan pesan sukses
    return redirect()->back()->with('success', 'Order berhasil dibuat!');
}


    public function updateStatus(Request $request, $id)
    {
        $order = Order::find($id);
        if (!$order) {
            return redirect()->back()->withErrors('Pesanan tidak ditemukan');
        }

        $status = $request->input('status_pemesanan');
        $order->status_pemesanan = $status;
        $order->save();

        // Kirim notifikasi ke user
        if ($status === 'ongoing') {
            // Kirim notifikasi pesanan diterima
            // Implementasikan notifikasi sesuai kebutuhan
        } elseif ($status === 'declined') {
            // Kirim notifikasi pesanan ditolak
        }

        return redirect()->route('dashboard')->with('success', 'Status pesanan diperbarui');
    }
}
