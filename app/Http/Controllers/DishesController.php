<?php

namespace App\Http\Controllers;

use App\Models\Dishes;
use App\Models\DishesImage;
use Illuminate\Http\Request;

class DishesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dishes = Dishes::all();
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
    public function show(Dishes $dishes)
    {
        return view('admin.cruditem.datadishes', compact('dishes'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dishes $dishes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dishes $dishes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dishes $dishes)
    {
        //
    }
}
