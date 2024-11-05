<?php

namespace App\Http\Controllers;

use App\Models\Dekorasi;
use App\Models\DekorasiImage;
use Illuminate\Http\Request;

class DekorasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dekor = Dekorasi::all();
        return view('admin.cruditem.datadekorasi', compact('dekor'));
    }

    public function create()
    {
        return view('admin.cruditem.datadekorasi');
    }
    
    
    
    public function store(Request $request)
    {
        
        // Validasi input termasuk gambar thumbnail dan foto dekorasi
        $request->validate([
            'nama_dekorasi' => 'required|string|max:255',
            'thumbnail_dekorasi' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi file gambar thumbnail
            'foto_dekorasi.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048' // Validasi file gambar untuk foto dekorasi
        ]);

        if ($request->hasFile('thumbnail_dekorasi')) {
            $thumbnailPath = $request->file('thumbnail_dekorasi')->store('dekorasi_thumbnails', 'public'); // Simpan di folder storage/app/public/dekorasi_thumbnails
        }
        
        $dekorasi = Dekorasi::create([
            'nama_dekorasi' => $request->nama_dekorasi,
            'deskripsi_dekorasi' => $request->deskripsi_dekorasi,
            'harga_dekorasi' => $request->harga_dekorasi,
            'thumbnail_dekorasi' => $thumbnailPath ?? null,
        ]);

        if ($request->hasFile('foto_dekorasi')) {
            $files = $request->file('foto_dekorasi');
            foreach ($files as $file) {
                $fotoDekorasiPath = $file->store('dekorasi_images', 'public');
                DekorasiImage::create([
                    'dekorasi_id' => $dekorasi->id_dekorasi, 
                    'foto_dekorasi' => $fotoDekorasiPath,
                ]);
            }
        }

        // Redirect ke halaman admin dengan pesan sukses
        return redirect('admin/datadekorasi')->with('success', 'Item berhasil ditambahkan');
    }

    public function storebooking(Request $request)
    {
        // Validasi
        $validated = $request->validate([
            'selected_dekorasi' => 'required|exists:dekorasis,id_dekorasi',
        ]);

        try {
            // Ambil data dekorasi lengkap
            $dekorasi = Dekorasi::findOrFail($request->selected_dekorasi);
            
            // Simpan ke session
            session(['selected_dekorasi' => $dekorasi]);
            
            return redirect()->route('pilihansaya')->with('success', 'Dekorasi berhasil dipilih');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memilih dekorasi');
        }
    }

    public function pemesanan()
    {
        // Cek apakah ada data di session
        if (!session()->has('selected_dekorasi')) {
            return redirect()->route('bookingdekorasi.index')->with('error', 'Silahkan pilih dekorasi terlebih dahulu');
        }

        $selected_dekorasi = session('selected_dekorasi');
        return view('client.pilihansaya', compact('selected_dekorasi'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Dekorasi $dekorasi)
    {
        return view('admin.cruditem.datadekorasi', compact('dekorasi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dekorasi $dekorasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dekorasi $dekorasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dekorasi $dekorasi)
    {
        //
    }
}
