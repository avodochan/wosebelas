<?php

namespace App\Http\Controllers;

use App\Models\Dokumentasi;
use App\Models\DokumentasiImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DokumentasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dokumentasi = Dokumentasi::with('images')->get();
        return view('admin.cruditem.datadokumentasi', compact('dokumentasi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.cruditem.datadokumentasi');
    }

    /**
     * Store a newly created resource in storage.
     */
    
    public function store(Request $request)
    { 
        $request->validate([
            'nama_paket_dokumentasi' => 'required|string|max:255',
            'jenis_dokumentasi' => 'required|string|max:255',
            'deskripsi_dokumentasi' => 'required|string|max:255',
            'harga_dokumentasi' => 'required|numeric',
        ]);

        if ($request->hasFile('thumbnail_dokumentasi')) {
            $thdokumentasi = $request->file('thumbnail_dokumentasi')->store('dokumentasi_thumbnails', 'public'); 
        }
    
        $dokumentasi = Dokumentasi::create([
            'nama_paket_dokumentasi' => $request->nama_paket_dokumentasi,
            'jenis_dokumentasi' => $request->jenis_dokumentasi,
            'deskripsi_dokumentasi' => $request->deskripsi_dokumentasi,
            'harga_dokumentasi' => $request->harga_dokumentasi,
            'thumbnail_dokumentasi' => $thdokumentasi ?? null, 
        ]);
    
        if ($request->hasFile('foto_dokumentasi')) {
            $files = $request->file('foto_dokumentasi');
            foreach ($files as $file) {
                $fotoDokumentasiPath = $file->store('dokumentasi_images', 'public');
    
                DokumentasiImage::create([
                    'dokumentasi_id' => $dokumentasi->id_dokumentasi, 
                    'foto_dokumentasi' => $fotoDokumentasiPath,
                ]);
            }
        }

        return redirect('admin/datadokumentasi')->with('success', 'Item berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Dokumentasi $dokumentasi)
    {
        return view('admin.cruditem.datadokumentasi', compact('dokumentasi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $selectedDokumentasi = Dokumentasi::with('images')->findOrFail($id);
        $dokumentasi = Dokumentasi::all();
        return view('admin.cruditem.datadokumentasi', compact('dokumentasi', 'selectedDokumentasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $dokumentasi = Dokumentasi::findOrFail($id);

        $dokumentasi->update([
            'nama_paket_dokumentasi' => $request->nama_paket_dokumentasi,
            'deskripsi_dokumentasi' => $request->deskripsi_dokumentasi,
            'harga_dokumentasi' => $request->harga_dokumentasi
        ]);

        if ($request->hasFile('thumbnail_dokumentasi')) 
        {
            $thumbnailPath = $request->file('thumbnail_dokumentasi')->store('dokumentasi_thumbnails', 'public');
            $dokumentasi->update(['thumbnail_dokumentasi' => $thumbnailPath]);
        }

        if ($request->hasFile('foto_dokumentasi')) 
        {
            foreach ($request->file('foto_dokumentasi') as $file) {
                $fotoPath = $file->store('dokumentasi_images', 'public');
                dokumentasiImage::create([
                    'dokumentasi_id' => $dokumentasi->id_dokumentasi,
                    'foto_dokumentasi' => $fotoPath,
                ]);
            }
        }

        if ($request->has('delete_foto_dokumentasi')) 
        {
            foreach ($request->delete_foto_dokumentasi as $imageId) {
                $image = dokumentasiImage::find($imageId);
                if ($image) {
                    Storage::disk('public')->delete($image->foto_dokumentasi);
                    $image->delete();
                }
            }
        }

        return redirect()->back()->with('success', 'dokumentasi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dokumentasi $dokumentasi)
    {
        //
    }
}
