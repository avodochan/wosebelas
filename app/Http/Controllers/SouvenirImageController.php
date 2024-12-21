<?php

namespace App\Http\Controllers;

use App\Models\Souvenir;
use App\Models\SouvenirImage;
use App\Models\SouvenirItemImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SouvenirImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $souvenirimg = SouvenirImage::with('images')->get();
        return view('admin.cruditem.itemsouvenir', compact( 'souvenirimg'));
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
         // dd ($request);
         $request->validate([
            'nama_souvenir' => 'required|string|max:255',
            'kategori_souvenir' => 'required',
        ]);
        
        if ($request->hasFile('thumbnail_souvenir')) {
            $thsouvenir = $request->file('thumbnail_souvenir')->store('souvenir_thumbnails', 'public'); 
        }
        
        $souvenirimg = SouvenirImage::create([
            'nama_souvenir' => $request->nama_souvenir,
            'kategori_souvenir' => $request->kategori_souvenir,
            'thumbnail_souvenir' => $thsouvenir ?? null, 
            
        ]);
    
        if ($request->hasFile('foto_souvenir')) {
            $files = $request->file('foto_souvenir');
            foreach ($files as $file) {
                $fotoPath = $file->store('souvenir_images', 'public');
    
                SouvenirItemImage::create([
                    'souvenir_item_id' => $souvenirimg->id_souvenirImage, 
                    'foto_souvenir' => $fotoPath,
                ]);
            }
        }

        return redirect('admin/itemsouvenir')->with('success', 'Item berhasil ditambahkan');
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
    public function edit($id)
    {
        $selectedSouvenirImg = Souvenir::with('images')->findOrFail($id);
        $souvenirimg = SouvenirImage::all();
        return view('admin.cruditem.itemsouvenir', compact('souvenirimg', 'selectedSouvenirImg'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $souvenirimg = SouvenirImage::findOrFail($id);

        $souvenirimg->update([
            'nama_souvenir' => $request->nama_souvenir,
            'kategori_souvenir' => $request->kategori_souvenir,
        ]);

        if ($request->hasFile('thumbnail_souvenir')) 
        {
            $thumbnailPath = $request->file('thumbnail_souvenir')->store('souvenir_thumbnails', 'public');
            $souvenirimg->update(['thumbnail_souvenir' => $thumbnailPath]);
        }

        if ($request->hasFile('foto_souvenir')) 
        {
            foreach ($request->file('foto_souvenir') as $file) {
                $fotoPath = $file->store('souvenir_images', 'public');
                SouvenirItemImage::create([
                    'souvenir_item_id' => $souvenirimg->id_souvenirImage, 
                    'foto_souvenir' => $fotoPath,
                ]);
            }
        }

        if ($request->has('delete_foto_souvenir')) 
        {
            foreach ($request->delete_foto_souvenir as $imageId) {
                $image = SouvenirItemImage::find($imageId);
                if ($image) {
                    Storage::disk('public')->delete($image->foto_souvenir);
                    $image->delete();
                }
            }
        }

        return redirect()->back()->with('success', 'souvenir berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
    }
    
   

}
