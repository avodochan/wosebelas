<?php

namespace App\Http\Controllers;
use App\Models\BridalStyleImage;
use Illuminate\Http\Request;

class BridalStyleImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bridalStyleImages = BridalStyleImage::all();
        return view('admin.cruditem.databridalstyle', compact('bridalStyleImages'));
    } 
    
    public function create()
    {
        return view('bridal_style_images.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pakaian' => 'required|string|max:255',
            'foto_paket.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        
        $tnbridalstyle = [];
        if($request->hasFile('thumbnail_bridalstyle')){
            foreach($request->file('thumbnail_bridalstyle') as $foto){
                $paths = $foto->store('thumbnail_bridal_style_images', 'public');
                $tnbridalstyle[] = $paths;
            }
        }

        $foto_paths = [];
        if($request->hasFile('foto_paket')){
            foreach($request->file('foto_paket') as $foto){
                $path = $foto->store('bridal_style_images', 'public');
                $foto_paths[] = $path;
            }
        }

        BridalStyleImage::create([
            'nama_pakaian' => $request->nama_pakaian,
            'thumbnail_bridalstyle' => json_encode($tnbridalstyle),
            'foto_paket' => json_encode($foto_paths),
        ]);
        

        return redirect('admin/databridalstyle')->with('success', 'Data berhasil disimpan');
    }



    /**
     * Display the specified resource.
     */
    public function show(BridalStyleImage $bridalStyleImage)
    {
        return view('admin.cruditem.databridalstyle', compact('bridalStyleImage')); 
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
    public function update(Request $request, BridalStyleImage $bridalStyleImage)
    {
        $request->validate([
            'nama_pakaian' => 'required|string|max:255',
            'foto_pakaian' => 'required',
        ]);

        $bridalStyleImage->update([
            'nama_pakaian' => $request->nama_pakaian,
            'foto_pakaian' => $request->foto_pakaian,
        ]);

        return redirect('admin/databridalstyle')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
