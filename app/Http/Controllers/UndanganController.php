<?php

namespace App\Http\Controllers;

use App\Models\Undangan;
use App\Models\UndanganImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class UndanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $undangan = Undangan::with('images')->get();
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
    
        if ($request->hasFile('thumbnail_undangan')) {
            $thundangan = $request->file('thumbnail_undangan')->store('undangan_thumbnails', 'public'); 
        }
    
        $undangan = Undangan::create([
            'nama_undangan' => $request->nama_undangan,
            'bahan_undangan' => $request->bahan_undangan,
            'deskripsi_undangan' => $request->deskripsi_undangan,
            'harga_undangan' => $request->harga_undangan,
            'thumbnail_undangan' => $thundangan ?? null, 
        ]);
    
        if ($request->hasFile('foto_undangan')) {
            $files = $request->file('foto_undangan');
            foreach ($files as $file) {
                $fotoUndanganPath = $file->store('undangan_images', 'public');
    
                UndanganImage::create([
                    'undangan_id' => $undangan->id_undangan, 
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
    public function edit($id)
    {
        $selectedUndangan = Undangan::with('images')->findOrFail($id);
        $undangan = Undangan::all();
        return view('admin.cruditem.dataundangan', compact('undangan', 'selectedUndangan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $undangan = Undangan::findOrFail($id);

        $undangan->update([
            'nama_undangan' => $request->nama_undangan,
            'bahan_undangan' => $request->bahan_undangan,
            'deskripsi_undangan' => $request->deskripsi_undangan,
            'harga_undangan' => $request->harga_undangan,
        ]);

        if ($request->hasFile('thumbnail_undangan')) 
        {
            $thumbnailPath = $request->file('thumbnail_undangan')->store('undangan_thumbnails', 'public');
            $undangan->update(['thumbnail_undangan' => $thumbnailPath]);
        }

        if ($request->hasFile('foto_undangan')) 
        {
            foreach ($request->file('foto_undangan') as $file) {
                $fotoPath = $file->store('undangan_images', 'public');
                UndanganImage::create([
                    'undangan_id' => $undangan->id_undangan,
                    'foto_undangan' => $fotoPath,
                ]);
            }
        }

        if ($request->has('delete_foto_undangan')) 
        {
            foreach ($request->delete_foto_undangan as $imageId) {
                $image = UndanganImage::find($imageId);
                if ($image) {
                    Storage::disk('public')->delete($image->foto_undangan);
                    $image->delete();
                }
            }
        }

        return redirect()->back()->with('success', 'undangan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Undangan $undangan)
    {
        //
    }
    
}
