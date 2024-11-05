<?php

namespace App\Http\Controllers;

use App\Models\Undangan;
use App\Models\UndanganImage;
use Illuminate\Http\Request;

class UndanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $undangan = Undangan::all();
        return view('admin.cruditem.dataundangan', compact('undangan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.cruditem.dataundangan');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'nama_undangan' =>'required|max:255',
            'bahan_undangan' =>'required|max:255',
            'deskripsi_undangan' =>'required|max:255',
            'harga_undangan' =>'required|numeric',
            
        ]);
    
        // Proses penyimpanan file thumbnail
        if ($request->hasFile('thumbnail_undangan')) {
            $thundangan = $request->file('thumbnail_undangan')->store('undangan_thumbnails', 'public'); // Simpan di folder storage/app/public/dekorasi_thumbnails
        }
    
        // Buat data dekorasi terlebih dahulu agar dapat menggunakan id_dekorasi-nya
        $undangan = Undangan::create([
            'nama_undangan' => $request->nama_undangan,
            'bahan_undangan' => $request->bahan_undangan,
            'deskripsi_undangan' => $request->deskripsi_undangan,
            'harga_undangan' => $request->harga_undangan,
            'thumbnail_undangan' => $thundangan ?? null, // Simpan path file thumbnail
        ]);
    
        // Proses penyimpanan file foto_dekorasi jika ada
        if ($request->hasFile('foto_undangan')) {
            $files = $request->file('foto_undangan');
            foreach ($files as $file) {
                // Simpan masing-masing file foto_dekorasi ke direktori
                $fotoUndanganPath = $file->store('undangan_images', 'public');
    
                // Simpan path foto_dekorasi ke database dalam tabel dekorasi_images
                UndanganImage::create([
                    'undangan_id' => $undangan->id_undangan, // Gunakan id_dekorasi dari data yang baru dibuat
                    'foto_undangan' => $fotoUndanganPath,
                ]);
            }
        }

        return redirect('admin/dataundangan')->with('success', 'Item berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Undangan $undangan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Undangan $undangan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Undangan $undangan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Undangan $undangan)
    {
        //
    }
    
}
