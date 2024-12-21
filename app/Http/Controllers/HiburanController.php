<?php

namespace App\Http\Controllers;

use App\Models\Hiburan;
use App\Models\HiburanImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class HiburanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hiburan = Hiburan::with('images')->get();
        return view('admin.cruditem.datahiburan', compact('hiburan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.cruditem.datahiburan');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { 
        // dd ($request->fthumbnail_hiburan);
        $request->validate([
            'nama_paket_hiburan' => 'required|string|max:255',
            'deskripsi_hiburan' => 'required|string|max:255',
            'harga_sewa_hiburan' => 'required|numeric',
        ]);
        
        if ($request->hasFile('fthumbnail_hiburan')) {
            $thhiburan = $request->file('fthumbnail_hiburan')->store('hiburan_thumbnails', 'public'); 
        }
        
        $hiburan = Hiburan::create([
            'nama_paket_hiburan' => $request->nama_paket_hiburan,
            'deskripsi_hiburan' => $request->deskripsi_hiburan,
            'harga_sewa_hiburan' => $request->harga_sewa_hiburan,
            'thumbnail_hiburan' => $thhiburan ?? null, 
            
        ]);
    
        if ($request->hasFile('foto_hiburan')) {
            $files = $request->file('foto_hiburan');
            foreach ($files as $file) {
                $fotoPath = $file->store('hiburan_images', 'public');
    
                HiburanImage::create([
                    'hiburan_id' => $hiburan->id_hiburan, 
                    'foto_hiburan' => $fotoPath,
                ]);
            }
        }

        return redirect('admin/datahiburan')->with('success', 'Item berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Hiburan $hiburan)
    {
        return view('admin.cruditem.datahiburan', compact('hiburan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $selectedHiburan = Hiburan::with('images')->findOrFail($id);
        $hiburan = Hiburan::all();
        return view('admin.cruditem.datahiburan', compact('hiburan', 'selectedHiburan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $hiburan = Hiburan::findOrFail($id);

        $hiburan->update([
            'nama_paket_hiburan' => $request->nama_paket_hiburan,
            'deskripsi_hiburan' => $request->deskripsi_hiburan,
            'harga_sewa_hiburan' => $request->harga_sewa_hiburan
        ]);

        if ($request->hasFile('thumbnail_hiburan')) 
        {
            $thumbnailPath = $request->file('thumbnail_hiburan')->store('hiburan_thumbnails', 'public');
            $hiburan->update(['thumbnail_hiburan' => $thumbnailPath]);
        }

        if ($request->hasFile('foto_hiburan')) 
        {
            foreach ($request->file('foto_hiburan') as $file) {
                $fotoPath = $file->store('hiburan_images', 'public');
                hiburanImage::create([
                    'hiburan_id' => $hiburan->id_hiburan,
                    'foto_hiburan' => $fotoPath,
                ]);
            }
        }

        if ($request->has('delete_foto_hiburan')) 
        {
            foreach ($request->delete_foto_hiburan as $imageId) {
                $image = hiburanImage::find($imageId);
                if ($image) {
                    Storage::disk('public')->delete($image->foto_hiburan);
                    $image->delete();
                }
            }
        }

        return redirect()->back()->with('success', 'hiburan berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hiburan $hiburan)
    {
        //
    }
}
