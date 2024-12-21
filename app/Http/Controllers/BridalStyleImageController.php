<?php

namespace App\Http\Controllers;
use App\Models\BridalStyleImage;
use App\Models\ItemBridalStyle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class BridalStyleImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bridalStyleImg = BridalStyleImage::with('images')->get();
        return view('admin.cruditem.itembridalstyle', compact('bridalStyleImg'));
    } 
    
    public function create()
    {
        return view('bridal_style_images.create');
    }

    public function store(Request $request)
    {
        // dd ($request);
        $request->validate([
            'nama_pakaian' => 'required|string|max:255',
        ]);
        
        if ($request->hasFile('thumbnail_bridalstyle')) {
            $thitembridalstyle = $request->file('thumbnail_bridalstyle')->store('bridalstyle_thumbnails', 'public'); 
        }
        
        $bridalStyleImg = BridalStyleImage::create([
            'nama_pakaian' => $request->nama_pakaian,
            'thumbnail_bridalstyle' => $thitembridalstyle ?? null, 
            
        ]);
    
        if ($request->hasFile('foto_paket')) {
            $files = $request->file('foto_paket');
            foreach ($files as $file) {
                $fotoPath = $file->store('bridalstyle_images', 'public');
    
                ItemBridalStyle::create([
                    'bridalstyle_item_id' => $bridalStyleImg->id_bridalStyleImage, 
                    'foto_paket' => $fotoPath,
                ]);
            }
        }
        

        return redirect('admin/itembridalstyle')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(BridalStyleImage $bridalStyleImage)
    {
        return view('admin.cruditem.databridalstyle', compact('bridalStyleImg')); 
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.cruditem.editbridalstyle', compact('bridalStyleImage'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BridalStyleImage $bridalStyleImage, $id)
    {
        $bridalStyleImg = BridalStyleImage::findOrFail($id);

        $bridalStyleImg->update([
            'nama_pakaian' => $request->nama_pakaian,
        ]);

        if ($request->hasFile('thumbnail_bridalstyle')) 
        {
            $thumbnailPath = $request->file('thumbnail_bridalstyle')->store('bridalstyle_thumbnails', 'public'); 
            $bridalStyleImg->update(['thumbnail_bridalstyle' => $thumbnailPath]);
        }

        if ($request->hasFile('foto_paket')) 
        {
            foreach ($request->file('foto_paket') as $file) {
                $fotoPath = $file->store('bridalStyleImg_images', 'public');
                ItemBridalStyle::create([
                    'bridalstyle_item_id' => $id,
                    'foto_paket' => $fotoPath,
                ]);
            }
        }

        if ($request->has('delete_foto_paket')) 
        {
            foreach ($request->delete_foto_paket as $imageId) {
                $image = ItemBridalStyle::find($imageId);
                if ($image) {
                    Storage::disk('public')->delete($image->foto_paket);
                    $image->delete();
                }
            }
        }

        return redirect('admin/itembridalstyle')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
