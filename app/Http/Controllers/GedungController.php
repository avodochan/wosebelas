<?php

namespace App\Http\Controllers;

use App\Models\Gedung;
use App\Models\GedungImage;
use Illuminate\Http\Request;

class GedungController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gedung = Gedung::all();
        return view('admin.cruditem.datagedung', compact('gedung'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.cruditem.datagedung');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { 
        $request->validate([
            'nama_gedung' => 'required|string|max:255',
            'tipe_gedung' => 'required|string|max:255',
            'alamat_gedung' => 'required|string|max:255',
            'kapasitas_gedung' => 'required|numeric',
            'harga_sewa_gedung' => 'required|numeric',
            'status_gedung' => 'required|string|max:255',
            'deskripsi_gedung' => 'required|string|max:255',
        ]);
    
        // Proses penyimpanan file thumbnail
        if ($request->hasFile('thumbnail_gedung')) {
            $thgedung = $request->file('thumbnail_gedung')->store('gedung_thumbnails', 'public'); // Simpan di folder storage/app/public/dekorasi_thumbnails
        }
    
        // Buat data dekorasi terlebih dahulu agar dapat menggunakan id_dekorasi-nya
        $gedung = Gedung::create([
            'nama_gedung' => $request->nama_gedung,
            'tipe_gedung' =>$request->tipe_gedung,
            'alamat_gedung' => $request->alamat_gedung,
            'kapasitas_gedung' => $request->kapasitas_gedung,
            'harga_sewa_gedung' => $request->harga_sewa_gedung,
            'status_gedung' => $request->status_gedung,
            'tanggal_acara' => $request->tanggal_acara,
            'deskripsi_gedung' => $request->deskripsi_gedung,
            'thumbnail_gedung' => $thgedung ?? null, // Simpan path file thumbnail
        ]);
    
        // Proses penyimpanan file foto_dekorasi jika ada
        if ($request->hasFile('foto_gedung')) {
            $files = $request->file('foto_gedung');
            foreach ($files as $file) {
                // Simpan masing-masing file foto_dekorasi ke direktori
                $fotoGedungPath = $file->store('gedung_images', 'public');
    
                // Simpan path foto_dekorasi ke database dalam tabel dekorasi_images
                GedungImage::create([
                    'gedung_id' => $gedung->id_gedung, // Gunakan id_dekorasi dari data yang baru dibuat
                    'foto_gedung' => $fotoGedungPath,
                ]);
            }
        }

        return redirect('admin/datagedung')->with('success', 'Item berhasil ditambahkan');
    }
    
    

    /**
     * Display the specified resource.
     */
    public function show(Gedung $gedung)
    {
        return view('admin.cruditem.datagedung', compact('gedung'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gedung $gedung)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gedung $gedung)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gedung $gedung)
    {
        //
    }
}
