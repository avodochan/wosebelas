<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;


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

        return redirect()->route('booking.index')->with('success', 'Dekorasi berhasil ditambahkan ke keranjang.');
    }
    
    public function addHiburan(Request $request)
    {
        $grandTotal = $request->input('grand_total');
        $id = $request->input('selected_hiburan');
        $hiburan = \App\Models\Hiburan::find($id);

        if (!$hiburan) {
            return redirect()->back()->with('error', 'Hiburan tidak ditemukan.');
        }

        $cart = session()->get('cart', []);

        $cart['hiburan'] = [
            'id_hiburan' => $hiburan->id_hiburan,
            'nama' => $hiburan->nama_paket_hiburan,
            'harga' => $hiburan->harga_sewa_hiburan,
            'thumbnail' => $hiburan->thumbnail_hiburan,
        ];

        session()->put('cart', $cart);

        return redirect()->route('booking.index')->with('success', 'Hiburan berhasil ditambahkan ke keranjang.');
    }
    
    public function addGedung(Request $request)
    {
        $grandTotal = $request->input('grand_total');
        $id = $request->input('selected_gedung');
        $gedung = \App\Models\Gedung::find($id);

        if (!$gedung) {
            return redirect()->back()->with('error', 'Gedung tidak ditemukan.');
        }

        $cart = session()->get('cart', []);

        $cart['gedung'] = [
            'id_gedung' => $gedung->id_gedung,
            'nama' => $gedung->nama_gedung,
            'harga' => $gedung->harga_sewa_gedung,
            'thumbnail' => $gedung->thumbnail_gedung,
        ];

        session()->put('cart', $cart);

        return redirect()->route('booking.index')->with('success', 'Gedung berhasil ditambahkan ke keranjang.');
    }
    
    public function addSouvenir(Request $request)
    {
        $grandTotal = $request->input('grand_total');
        $id = $request->input('selected_souvenir');
        $souvenir = \App\Models\Souvenir::find($id);

        if (!$souvenir) {
            return redirect()->back()->with('error', 'Souvenir tidak ditemukan.');
        }

        $cart = session()->get('cart', []);

        $cart['souvenir'] = [
            'id_souvenir' => $souvenir->id_souvenir,
            'nama' => $souvenir->nama_paket_souvenir,
            'harga' => $souvenir->harga_paket_souvenir,
            'thumbnail' => $souvenir->thumbnail_souvenir,
        ];

        session()->put('cart', $cart);

        return redirect()->route('booking.index')->with('success', 'Souvenir berhasil ditambahkan ke keranjang.');
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

        return redirect()->route('booking.index')->with('success', 'Undangan berhasil ditambahkan ke keranjang.');
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

        return redirect()->route('booking.index')->with('success', 'Dokumentasi berhasil ditambahkan ke keranjang.');
    }
    
    public function addKatering(Request $request)
    {
        $id = $request->input('selected_maincourse');
        $cart = session()->get('cart', []);
        
        $cart['main_course'] = [
            'id_main_course' => $id,
        ];
        
        session()->put('cart', $cart);
        return redirect()->route('booking.index')->with('success', 'Katering berhasil ditambahkan ke keranjang.');
    }

    public function addBridalStyle(Request $request)
    {
        $id = $request->input('selected_bridal_styles');
        $cart = session()->get('cart', []);
        
        $cart['bridal_style'] = [
            'id_bridal_style' => $id,
        ];
        
        session()->put('cart', $cart);
        return redirect()->route('booking.index')->with('success', 'MUA berhasil ditambahkan ke keranjang.');   
    }
    
    public function addSouvernir(Request $request)
    {
        $id = $request->input('selected_souvernir');
        $cart = session()->get('cart', []);
        
        $cart['souvernir'] = [
            'id_souvernir' => $id,
        ];
        
        session()->put('cart', $cart);
        return redirect()->route('booking.index')->with('success', 'Souvernir berhasil ditambahkan ke keranjang.');      
    }

    public function showCart()
    {
        $cart = session()->get('cart', []);
        return view('client.keranjang', compact('cart'));
    }
    
    public function updateCart(Request $request)
    {
        $cart = session()->get('cart', []);
    
        if (isset($cart['undangan'])) {
            $cart['undangan']['bahan_undangan'] = $request->input('bahan_undangan');
            $cart['undangan']['kuantitas'] = $request->input('kuantitas');
            $cart['undangan']['harga'] = $this->calculateHarga($cart['undangan']);
        }
    
        session()->put('cart', $cart);
        return redirect()->route('keranjang.index')->with('success', 'Keranjang berhasil diperbarui.');
    }
    
    private function calculateHarga($item)
    {
        $hargaTambahan = 0;
        switch ($item['bahan_undangan']) {
            case "aster200gr": $hargaTambahan = 200; break;
            case "amplopaster": $hargaTambahan = 1000; break;
            case "bchardcover": $hargaTambahan = 2000; break;
            case "amplopjasmine": $hargaTambahan = 7200; break;
        }
        return $item['harga_base'] + $hargaTambahan;
    }
    
    
    public function checkout(Request $request)
    {
        $customer = Customer::where('user_id', Auth::id())->first();

        if (!$customer) {
            return redirect('/datadiri')->with('error', 'Harap lengkapi data diri terlebih dahulu.');
        }

        $cart = session()->get('cart', []);
        $selectedItems = $request->input('selected_items', []);
        $grandTotal = $request->input('grand_total', 0);

        $itemsForCheckout = array_filter($cart, function ($key) use ($selectedItems) {
            return in_array($key, $selectedItems);
        }, ARRAY_FILTER_USE_KEY);

        return view('client.checkout', compact('customer', 'itemsForCheckout', 'grandTotal'));
    }
    

}
