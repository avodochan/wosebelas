<?php

namespace App\Http\Controllers;

use App\Models\Maincourse;
use App\Models\MaincourseImage;
use Illuminate\Http\Request;

class MaincourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $maincourse = Maincourse::all();
        return view('admin.cruditem.datamaincourse', compact('maincourse'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.cruditem.datamaincourse');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { 
        
        $request->validate([
            'nama_paket_maincourse' => 'required|string|max:255',
            'deskripsi_paket_maincourse' => 'required|string|max:255',
            'harga_paket_maincourse' => 'required|numeric',
        ]);
    
        // Proses penyimpanan file thumbnail
        if ($request->hasFile('thumbnail_maincourse')) {
            $tnmaincourse = $request->file('thumbnail_maincourse')->store('maincourse_thumbnails', 'public'); // Simpan di folder storage/app/public/dekorasi_thumbnails
        }
    
        // Buat data dekorasi terlebih dahulu agar dapat menggunakan id_dekorasi-nya
        $maincourse = Maincourse::create([
            'nama_paket_maincourse' => $request->nama_paket_maincourse,
            'deskripsi_paket_maincourse' => $request->deskripsi_paket_maincourse,
            'harga_paket_maincourse' => $request->harga_paket_maincourse,
            'thumbnail_maincourse' => $tnmaincourse ?? null, // Simpan path file thumbnail
        ]);
    
        // Proses penyimpanan file foto_dekorasi jika ada
        if ($request->hasFile('foto_maincourse')) {
            $files = $request->file('foto_maincourse');
            foreach ($files as $file) {
                // Simpan masing-masing file foto_dekorasi ke direktori
                $fotoMaincoursePath = $file->store('maincourse_images', 'public');
    
                // Simpan path foto_dekorasi ke database dalam tabel dekorasi_images
                MaincourseImage::create([
                    'maincourse_id' => $maincourse->id_maincourse, // Gunakan id_dekorasi dari data yang baru dibuat
                    'foto_maincourse' => $fotoMaincoursePath,
                ]);
            }
        }

        return redirect('admin/datamaincourse')->with('success', 'Item berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Maincourse $maincourse)
    {
        return view('admin.cruditem.datamaincourse', compact('maincourse'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Maincourse $maincourse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Maincourse $maincourse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Maincourse $maincourse)
    {
        //
    }
}
