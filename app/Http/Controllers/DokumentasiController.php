<?php

namespace App\Http\Controllers;

use App\Models\Dokumentasi;
use App\Models\DokumentasiImage;
use Illuminate\Http\Request;

class DokumentasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dokumentasi = Dokumentasi::all();
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
    
        // Proses penyimpanan file thumbnail
        if ($request->hasFile('thumbnail_dokumentasi')) {
            $thdokumentasi = $request->file('thumbnail_dokumentasi')->store('dokumentasi_thumbnails', 'public'); // Simpan di folder storage/app/public/dekorasi_thumbnails
        }
    
        // Buat data dekorasi terlebih dahulu agar dapat menggunakan id_dekorasi-nya
        $dokumentasi = Dokumentasi::create([
            'nama_paket_dokumentasi' => $request->nama_paket_dokumentasi,
            'jenis_dokumentasi' => $request->jenis_dokumentasi,
            'deskripsi_dokumentasi' => $request->deskripsi_dokumentasi,
            'harga_dokumentasi' => $request->harga_dokumentasi,
            'thumbnail_dokumentasi' => $thdokumentasi ?? null, // Simpan path file thumbnail
        ]);
    
        // Proses penyimpanan file foto_dekorasi jika ada
        if ($request->hasFile('foto_dokumentasi')) {
            $files = $request->file('foto_dokumentasi');
            foreach ($files as $file) {
                // Simpan masing-masing file foto_dekorasi ke direktori
                $fotoDokumentasiPath = $file->store('dokumentasi_images', 'public');
    
                // Simpan path foto_dekorasi ke database dalam tabel dekorasi_images
                DokumentasiImage::create([
                    'dokumentasi_id' => $dokumentasi->id_dokumentasi, // Gunakan id_dekorasi dari data yang baru dibuat
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
    public function edit(Dokumentasi $dokumentasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dokumentasi $dokumentasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dokumentasi $dokumentasi)
    {
        //
    }
}
