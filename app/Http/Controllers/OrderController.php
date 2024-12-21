<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function showPendingOrders()
    {
        $orders = Order::where('status', 'pending')->get();
        return view('admin.pemesanan.pendingorder', compact('orders'));
    }

    public function showConfirmedOrder()
    {
        $orders = Order::where('status', 'confirmed')->get();
        return view('admin.pemesanan.confirmedorder', compact('orders'));
    }

    public function showongoingorder()
    {
        $orders = Order::where('status', 'ongoing')->get();
        return view('admin.pemesanan.ongoingorder', compact('orders'));
    }
    
    public function showSuccessOrder()
    {
        $orders = Order::where('status', 'success')->get();
        return view('admin.pemesanan.successorder', compact('orders'));
    }
    
    public function showHistori()
    {
        $orders = Order::all();
        return view('admin.pemesanan.historiorder', compact('orders'));
    }
    
    public function showHistoriOrder()
    {
        $userId = Auth::id();
        $orders = Order::where('user_id', $userId)->get();
        $data = [
            'total' => Order::where('status', 'ongoing')->sum('total_biaya'),
            'histori' => Order::where ('status', 'histori')->count(),
            'ongoing' => Order::where ('status', 'ongoing')->count(),
        ];
        
        return view('client.profile.historiorder', compact('orders', 'data'));
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'event_date' => 'required|date',
            'grand_total' => 'required|numeric',
            'banyak_tamu' => 'required|numeric'
        ]);

        $order = Order::create([
            'user_id' => Auth::id(),
            'status' => 'pending',
            'tanggal_acara' => $request->input('event_date'),
            'total_biaya' => $request->input('grand_total'),
            'banyak_tamu' => $request->input('banyak_tamu'),
        ]);

        session()->forget('cart');

        return redirect()->route('home')->with('success', 'Pesanan berhasil dibuat, silakan tunggu konfirmasi dari admin. Keranjang telah dikosongkan.');
    }


    public function updateStatus($id)
    {
        $order = Order::find($id);

        if ($order->status !== 'confirmed') {
            $order->status = 'confirmed';
            $order->save();

                // $invoice = new Invoice();
                // $invoice->no_invoice = 'INV' . str_pad($order->id_pemesanan, 4, '0', STR_PAD_LEFT);
                // $invoice->user_id = $order->user_id;
                // $invoice->total_tagihan = $order->total_biaya;
                // $invoice->save();
        }

        return redirect()->back()->with('success', 'Status berhasil diperbarui.');
    }
    
    public function updateConfirm($id)
    {
        $order = Order::find($id);

        if ($order->status !== 'ongoing') {
            $order->status = 'ongoing';
            $order->save();
        }

        return redirect()->back()->with('success', 'Status berhasil diperbarui.');
    }
    
    public function updateOngoing($id)
    {
        $order = Order::find($id);

        if ($order->status !== 'success') {
            $order->status = 'success';
            $order->save();
        }

        return redirect()->back()->with('success', 'Status berhasil diperbarui.');
    }
    
    
    public function showDetail($id)
    {
        $order = Order::with('user')->findOrFail($id);
        return view('admin.pemesanan.detail', compact('order'));
    }

    public function showInvoice($id)
    {
        $order = Order::with(['user', 'items'])->findOrFail($id);
        $customer = $order->user;

        return view('client.invoice.index', compact('order', 'customer'));
    }
    
    public function uploadPayment(Request $request, $id)
{
    $request->validate([
        'bukti_pembayaran' => 'required|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    $order = Order::find($id);

    if ($order->status !== 'confirmed') {
        return redirect()->back()->with('error', 'Hanya bisa mengunggah bukti pembayaran untuk status confirmed.');
    }

    $filePath = $request->file('bukti_pembayaran')->store('bukti_pembayaran', 'public');

    $order->bukti_pembayaran = $filePath;
    $order->save();

    return redirect()->back()->with('success', 'Bukti pembayaran berhasil diunggah.');
}

    
    



    
}
