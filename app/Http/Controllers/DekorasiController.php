<?php

namespace App\Http\Controllers;

use App\Models\Dekorasi;
use App\Models\DekorasiImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DekorasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dekorasi = Dekorasi::with('images')->get();
        return view('admin.cruditem.datadekorasi', compact('dekorasi'));
    }

    public function create()
    {
        return view('admin.cruditem.datadekorasi');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'nama_dekorasi' => 'required|string|max:255',
            'thumbnail_dekorasi' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', 
            'foto_dekorasi.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048' 
        ]);

        if ($request->hasFile('thumbnail_dekorasi')) {
            $thumbnailPath = $request->file('thumbnail_dekorasi')->store('dekorasi_thumbnails', 'public'); 
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
    public function show($id)
    {
        $dekorasi = Dekorasi::with('images')->findOrFail($id);
        return response()->json($dekorasi);
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $selectedDekorasi = Dekorasi::with('images')->findOrFail($id);
        $dekorasi = Dekorasi::all();
        return view('admin.cruditem.datadekorasi', compact('dekorasi', 'selectedDekorasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $dekorasi = Dekorasi::findOrFail($id);

        $dekorasi->update([
            'nama_dekorasi' => $request->nama_dekorasi,
            'deskripsi_dekorasi' => $request->deskripsi_dekorasi,
            'harga_dekorasi' => $request->harga_dekorasi
        ]);

        if ($request->hasFile('thumbnail_dekorasi')) 
        {
            $thumbnailPath = $request->file('thumbnail_dekorasi')->store('dekorasi_thumbnails', 'public');
            $dekorasi->update(['thumbnail_dekorasi' => $thumbnailPath]);
        }

        if ($request->hasFile('foto_dekorasi')) 
        {
            foreach ($request->file('foto_dekorasi') as $file) {
                $fotoPath = $file->store('dekorasi_images', 'public');
                dekorasiImage::create([
                    'dekorasi_id' => $dekorasi->id_dekorasi,
                    'foto_dekorasi' => $fotoPath,
                ]);
            }
        }

        if ($request->has('delete_foto_dekorasi')) 
        {
            foreach ($request->delete_foto_dekorasi as $imageId) {
                $image = dekorasiImage::find($imageId);
                if ($image) {
                    Storage::disk('public')->delete($image->foto_dekorasi);
                    $image->delete();
                }
            }
        }

        return redirect()->back()->with('success', 'dekorasi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dekorasi $dekorasi)
    {
        //
    }
}
