<?php

namespace App\Http\Controllers;

use App\Models\Hiburan;
use App\Models\HiburanImage;
use Illuminate\Http\Request;

class HiburanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hiburan = Hiburan::all();
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
        $hiburan = Hiburan::create([
            'nama_paket_hiburan' => $request->nama_paket_hiburan,
            'deskripsi_hiburan' => $request->deskripsi_hiburan,
            'harga_sewa_hiburan' => $request->harga_sewa_hiburan,
        ]);

        if ($request->hasFile('thumbnail_hiburan')) {
            $files = $request->file('thumbnail_hiburan');
            foreach ($files as $image) {
                $tnhiburan = $image->storeAs('thumbnail_hiburan _images', 'public');
                HiburanImage::create([
                    'hiburan_id' => $hiburan->id_hiburan,
                    'thumbnail_hiburan' => $tnhiburan
                ]);
            }
        }
        
        if ($request->hasFile('foto_hiburan')) {
            $files = $request->file('foto_hiburan');
            foreach ($files as $image) {
                $fhiburan = $image->storeAs('hiburan _images', 'public');
                HiburanImage::create([
                    'hiburan_id' => $hiburan->id_hiburan,
                    'foto_hiburan' => $fhiburan
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
    public function edit(Hiburan $hiburan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hiburan $hiburan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hiburan $hiburan)
    {
        //
    }
}
