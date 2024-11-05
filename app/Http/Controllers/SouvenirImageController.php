<?php

namespace App\Http\Controllers;

use App\Models\Souvenir;
use App\Models\SouvenirImage;
use Illuminate\Http\Request;

class SouvenirImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('souvenir_images.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data yang diterima dari form
        $request->validate([
            'nama_souvenir' => 'required|string|max:255',
            'kategori_souvenir' => 'required|string', // Validasi kategori
            'thumbnail_souvenir' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi file thumbnail
            'foto_souvenir' => 'required|array', // Pastikan foto souvenir adalah array
            'foto_souvenir.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048' // Validasi setiap file dalam array
        ]);

        // Buat data souvenir (di tabel induk)
        $souvenir = Souvenir::create([
            'nama_souvenir' => $request->nama_souvenir,
            'kategori_souvenir' => $request->kategori_souvenir,
            // Tidak menyimpan thumbnail di tabel induk, karena akan masuk ke tabel anak
        ]);

        // Simpan thumbnail_souvenir ke dalam tabel anak (souvenir_images)
        if ($request->hasFile('thumbnail_souvenir')) {
            $thumbnailPath = $request->file('thumbnail_souvenir')->store('souvenir_thumbnails', 'public');
            
            // Simpan thumbnail sebagai entri di tabel souvenir_images
            SouvenirImage::create([
                'souvenir_id' => $souvenir->id, // Gunakan ID souvenir dari tabel induk
                'thumbnail_souvenir' => $thumbnailPath, // Simpan path file thumbnail
                'foto_souvenir' => null, // Thumbnail tidak memiliki foto
            ]);
        }

        // Simpan setiap file foto_souvenir ke dalam tabel anak (souvenir_images)
        if ($request->hasFile('foto_souvenir')) {
            $files = $request->file('foto_souvenir');
            foreach ($files as $file) {
                $fotoSouvenirPath = $file->store('souvenir_images', 'public');
                
                // Simpan foto souvenir sebagai entri di tabel souvenir_images
                SouvenirImage::create([
                    'souvenir_id' => $souvenir->id, // Gunakan ID souvenir dari tabel induk
                    'thumbnail_souvenir' => null, // Tidak ada thumbnail untuk foto
                    'foto_souvenir' => $fotoSouvenirPath, // Simpan path file foto
                ]);
            }
        }

        return redirect()->back()->with('success', 'Souvenir berhasil ditambahkan');
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
    }
    
   

}
