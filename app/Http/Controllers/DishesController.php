<?php

namespace App\Http\Controllers;

use App\Models\Dishes;
use App\Models\DishesImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DishesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dishes = Dishes::with('images')->get();
        return view('admin.cruditem.datadishes', compact('dishes'));
    }

    public function create()
    {
        return view('admin.cruditem.datadishes');
    }
    
    public function store(Request $request)
    { 
        $request->validate([
            'nama_dishes' => 'required|string|max:255',
            'deskripsi_dishes' => 'required|string|max:255',
        ]);
    
        if ($request->hasFile('thumbnail_dishes')) {
            $thdishes = $request->file('thumbnail_dishes')->store('dishes_thumbnails', 'public'); 
        }
    
        $dishes = Dishes::create([
            'nama_dishes' => $request->nama_dishes,
            'deskripsi_dishes' => $request->deskripsi_dishes,
            'thumbnail_dishes' => $thdishes ?? null, 
        ]);
    
        if ($request->hasFile('foto_dishes')) {
            $files = $request->file('foto_dishes');
            foreach ($files as $file) {
                $fotoDishesPath = $file->store('dishes_images', 'public');

                DishesImage::create([
                    'dishes_id' => $dishes->id_dishes, 
                    'foto_dishes' => $fotoDishesPath,
                ]);
            }
        }

        return redirect('admin/datadishes')->with('success', 'Item berhasil ditambahkan');
    }
    
    

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $dish = Dishes::with('images')->findOrFail($id);
        return response()->json($dish);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $selectedDish = Dishes::with('images')->findOrFail($id);
        $dishes = Dishes::all();
        return view('admin.cruditem.datadishes', compact('dishes', 'selectedDish'));
    }

    public function update(Request $request, $id)
    {
        $dish = Dishes::findOrFail($id);

        $dish->update([
            'nama_dishes' => $request->nama_dishes,
            'deskripsi_dishes' => $request->deskripsi_dishes,
        ]);

        if ($request->hasFile('thumbnail_dishes')) 
        {
            $thumbnailPath = $request->file('thumbnail_dishes')->store('dishes_thumbnails', 'public');
            $dish->update(['thumbnail_dishes' => $thumbnailPath]);
        }

        if ($request->hasFile('foto_dishes')) 
        {
            foreach ($request->file('foto_dishes') as $file) {
                $fotoPath = $file->store('dishes_images', 'public');
                DishesImage::create([
                    'dishes_id' => $dish->id_dishes,
                    'foto_dishes' => $fotoPath,
                ]);
            }
        }

        if ($request->has('delete_foto_dishes')) 
        {
            foreach ($request->delete_foto_dishes as $imageId) {
                $image = DishesImage::find($imageId);
                if ($image) {
                    Storage::disk('public')->delete($image->foto_dishes);
                    $image->delete();
                }
            }
        }

        return redirect()->back()->with('success', 'Dishes berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dishes $dishes)
    {
        //
    }
}
