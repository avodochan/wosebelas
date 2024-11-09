<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class KeranjangController extends Controller
{

    public function addDekorasi(Request $request)
    {
        $grandTotal = $request->input('grand_total');
        $id = $request->input('selected_dekorasi');
        $dekorasi = \App\Models\Dekorasi::find($id);

        if (!$dekorasi) {
            return redirect()->back()->with('error', 'Dekorasi tidak ditemukan.');
        }

        $cart = session()->get('cart', []);

        $cart['dekorasi'] = [
            'id_dekorasi' => $dekorasi->id_dekorasi,
            'nama' => $dekorasi->nama_dekorasi,
            'harga' => $dekorasi->harga_dekorasi,
            'thumbnail' => $dekorasi->thumbnail_dekorasi,
        ];
        session()->put('cart', $cart);

        return redirect()->route('dekorasi.show')->with('success', 'Dekorasi berhasil ditambahkan ke keranjang.');
    }

    public function addUndangan(Request $request)
    {
        $id = $request->input('selected_undangan');
        $bahan_undangan = $request->input('bahan_undangan');
        $kuantitas = $request->input('kuantitas');

        $undangan = \App\Models\Undangan::find($id);

        if (!$undangan) {
            return redirect()->back()->with('error', 'Undangan tidak ditemukan.');
        }

        $cart = session()->get('cart', []);

        $cart['undangan'] = [
            'id_undangan' => $undangan->id_undangan,
            'nama' => $undangan->nama_undangan,
            'harga' => $undangan->harga_undangan,
            'thumbnail' => $undangan->thumbnail_undangan,
            'bahan_undangan' => $bahan_undangan,
            'kuantitas' => $kuantitas,
        ];

        session()->put('cart', $cart);

        return redirect()->route('undangan.show')->with('success', 'Undangan berhasil ditambahkan ke keranjang.');
    }
    
    public function addDokumentasi(Request $request)
    {
        $grandTotal = $request->input('grand_total');
        $id = $request->input('selected_dokumentasi');
        $dokumentasi = \App\Models\Dokumentasi::find($id);

        if (!$dokumentasi) {
            return redirect()->back()->with('error', 'Dokumentasi tidak ditemukan.');
        }

        $cart = session()->get('cart', []);

        $cart['dokumentasi'] = [
            'id_dokumentasi' => $dokumentasi->id_dokumentasi,
            'nama' => $dokumentasi->nama_paket_dokumentasi,
            'jenis' => $dokumentasi->jenis_dokumentasi,
            'harga' => $dokumentasi->harga_dokumentasi,
            'thumbnail' => $dokumentasi->thumbnail_dokumentasi,
        ];
        session()->put('cart', $cart);

        return redirect()->route('dokumentasi.show')->with('success', 'Dokumentasi berhasil ditambahkan ke keranjang.');
    }


    public function showCart()
    {
        $cart = session()->get('cart', []);
        return view('client.keranjang', compact('cart'));
    }
    
    public function updateCart(Request $request)
    {
        $selectedItems = $request->input('selected_items', []);

        $cart = session()->get('cart', []);
        foreach (['dekorasi', 'dokumentasi', 'undangan'] as $item) {
            if (!in_array($item, $selectedItems)) {
                unset($cart[$item]);
            }
        }
        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Keranjang berhasil diperbarui.');
    }
    
    public function checkout(Request $request)
    {
        $grandTotal = $request->input('grand_total');
        $selectedItems = $request->input('selected_items', []);
        $cart = session()->get('cart', []);
        $customer = session()->get('customer');

        $itemsForCheckout = [];
        
        if (in_array('dekorasi', $selectedItems)) {
            $itemsForCheckout['dekorasi'] = $cart['dekorasi'];
        }
        
        if (in_array('undangan', $selectedItems)) {
            $itemsForCheckout['undangan'] = $cart['undangan'];
        }

        return view('client.checkout', [
            'items' => $itemsForCheckout,
            'grandTotal' => $grandTotal,
            'customer' => $customer,
        ]);
    }




}
