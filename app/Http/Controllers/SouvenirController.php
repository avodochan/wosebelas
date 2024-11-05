<?php

namespace App\Http\Controllers;

use App\Models\Souvenir;
use App\Models\SouvenirImage;
use Illuminate\Http\Request;

class SouvenirController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $souvenir = Souvenir::all();
        $souvenirImage = SouvenirImage::all();
        return view('admin.cruditem.datasouvenir', compact('souvenir', 'souvenirImage'));
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
        $souvenir = Souvenir::create([
            'nama_paket_souvenir' => $request->nama_paket_souvenir,
            'deskripsi_paket_souvenir' => $request->deskripsi_paket_souvenir,
            'harga_paket_souvenir' => $request->harga_paket_souvenir,
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
    public function edit(Souvenir $souvenir)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Souvenir $souvenir)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Souvenir $souvenir)
    {
        //
    }
}
