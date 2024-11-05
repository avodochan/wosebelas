<?php

namespace App\Http\Controllers;

use App\Models\BridalStyle;
use App\Models\BridalStyleImage;
use Illuminate\Http\Request;

class BridalStyleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bridalStyle = BridalStyle::all();
        $bridalStyleImages = BridalStyleImage::all();
        return view('admin.cruditem.databridalstyle', compact('bridalStyle', 'bridalStyleImages'));
    }

    public function create()
    {
        return view('admin.cruditem.databridalstyle');
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { 
        $bridalStyle = BridalStyle::create([
            'nama_paket_bridalstyle' => $request->nama_paket_bridalstyle,
            'deskripsi_paket' => $request->deskripsi_paket,
            'harga_paket' => $request->harga_paket,
        ]);
        
        
        return redirect('admin/databridalstyle')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(BridalStyle $bridalStyle)
    {
        return view('admin.cruditem.databridalstyle', compact('bridalStyle'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BridalStyle $bridalStyle)
    {
        return view('admin.cruditem.editbridalstyle', compact('bridalStyle'));
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BridalStyle $bridalStyle)
    {
        $request->validate([
            'nama_paket_bridalstyle' => 'required|string|max:255',
            'deskripsi_paket' => 'required',
            'harga_paket' => 'required|numeric',
        ]);

        $bridalStyle->update([
            'nama_paket_bridalstyle' => $request->nama_paket_bridalstyle,
            'deskripsi_paket' => $request->deskripsi_paket,
            'harga_paket' => $request->harga_paket,
        ]);

        return redirect('admin/databridalstyle')->with('success', 'Data berhasil disimpan');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BridalStyle $bridalStyle)
    {
        //
    }
}
