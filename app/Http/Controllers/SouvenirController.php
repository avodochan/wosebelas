<?php

namespace App\Http\Controllers;

use App\Models\Souvenir;
use App\Models\SouvenirImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class SouvenirController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $souvenir = Souvenir::with('images')->get();
        $souvenirimg = SouvenirImage::with('images')->get();
        return view('admin.cruditem.datasouvenir', compact('souvenir', 'souvenirimg'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.cruditem.datasouvenir');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { 
        $request->validate([
            'nama_paket_souvenir' => 'required|string|max:255',
            'deskripsi_paket_souvenir' => 'required|string|max:255',
            'harga_paket_souvenir' => 'required|numeric',
        ]);
        
        if ($request->hasFile('thumbnail_souvenir')) {
            $thsouvenir = $request->file('thumbnail_souvenir')->store('souvenir_thumbnails', 'public'); 
        }
        
        $souvenir = Souvenir::create([
            'nama_paket_souvenir' => $request->nama_paket_souvenir,
            'deskripsi_paket_souvenir' => $request->deskripsi_paket_souvenir,
            'harga_paket_souvenir' => $request->harga_paket_souvenir,
            'thumbnail_souvenir' => $thsouvenir,
        ]);

        return redirect('admin/datasouvenir')->with('success', 'Item berhasil ditambahkan');
    }


    /**
     * Display the specified resource.
     */
    public function show(Souvenir $souvenir)
    {
        return view('admin.cruditem.datasouvenir', compact('souvenir'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $selectedSouvenir = Souvenir::with('images')->findOrFail($id);
        $souvenir = Souvenir::all();
        return view('admin.cruditem.datasouvenir', compact('souvenir', 'selectedsouvenir'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $souvenir = Souvenir::findOrFail($id);

        $souvenir->update([
           'nama_paket_souvenir' => $request->nama_paket_souvenir,
            'deskripsi_paket_souvenir' => $request->deskripsi_paket_souvenir,
            'harga_paket_souvenir' => $request->harga_paket_souvenir,
        ]);

        if ($request->hasFile('thumbnail_souvenir')) 
        {
            $thumbnailPath = $request->file('thumbnail_souvenir')->store('souvenir_thumbnails', 'public');
            $souvenir->update(['thumbnail_souvenir' => $thumbnailPath]);
        }

        return redirect()->back()->with('success', 'souvenir berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Souvenir $souvenir)
    {
        //
    }
}
