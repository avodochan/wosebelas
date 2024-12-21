<?php

namespace App\Http\Controllers;

use App\Models\Gedung;
use App\Models\GedungImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GedungController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gedung = Gedung::with('images')->get();
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
    
        if ($request->hasFile('thumbnail_gedung')) {
            $thgedung = $request->file('thumbnail_gedung')->store('gedung_thumbnails', 'public'); 
        }
    
        $gedung = Gedung::create([
            'nama_gedung' => $request->nama_gedung,
            'tipe_gedung' =>$request->tipe_gedung,
            'alamat_gedung' => $request->alamat_gedung,
            'kapasitas_gedung' => $request->kapasitas_gedung,
            'harga_sewa_gedung' => $request->harga_sewa_gedung,
            'status_gedung' => $request->status_gedung,
            'tanggal_acara' => $request->tanggal_acara,
            'deskripsi_gedung' => $request->deskripsi_gedung,
            'thumbnail_gedung' => $thgedung ?? null,
        ]);
    
        if ($request->hasFile('foto_gedung')) {
            $files = $request->file('foto_gedung');
            foreach ($files as $file) {
                $fotoGedungPath = $file->store('gedung_images', 'public');
    
                GedungImage::create([
                    'gedung_id' => $gedung->id_gedung, 
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
    public function edit($id)
    {
        $selectedGedung = Gedung::with('images')->findOrFail($id);
        $gedung = Gedung::all();
        return view('admin.cruditem.datagedung', compact('gedung', 'selectedGedung'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $gedung = Gedung::findOrFail($id);

        $gedung->update([
            'nama_gedung' => $request->nama_gedung,
            'tipe_gedung' =>$request->tipe_gedung,
            'alamat_gedung' => $request->alamat_gedung,
            'kapasitas_gedung' => $request->kapasitas_gedung,
            'harga_sewa_gedung' => $request->harga_sewa_gedung,
            'status_gedung' => $request->status_gedung,
            'tanggal_acara' => $request->tanggal_acara,
            'deskripsi_gedung' => $request->deskripsi_gedung,
        ]);

        if ($request->hasFile('thumbnail_gedung')) 
        {
            $thumbnailPath = $request->file('thumbnail_gedung')->store('gedung_thumbnails', 'public');
            $gedung->update(['thumbnail_gedung' => $thumbnailPath]);
        }

        if ($request->hasFile('foto_gedung')) 
        {
            foreach ($request->file('foto_gedung') as $file) {
                $fotoPath = $file->store('gedung_images', 'public');
                GedungImage::create([
                    'gedung_id' => $gedung->id_gedung,
                    'foto_gedung' => $fotoPath,
                ]);
            }
        }

        if ($request->has('delete_foto_gedung')) 
        {
            foreach ($request->delete_foto_gedung as $imageId) {
                $image = GedungImage::find($imageId);
                if ($image) {
                    Storage::disk('public')->delete($image->foto_gedung);
                    $image->delete();
                }
            }
        }

        return redirect()->back()->with('success', 'gedung berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gedung $gedung)
    {
        //
    }
}
