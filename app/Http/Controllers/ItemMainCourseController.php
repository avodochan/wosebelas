<?php

namespace App\Http\Controllers;

use App\Models\ItemMainCourse;
use App\Models\Dishes;
use Illuminate\Http\Request;

class ItemMainCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $itemmaincourse = ItemMainCourse::all();
        return view('admin.cruditem.itemmaincourse', compact('itemmaincourse'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.cruditem.itemmaincourse');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_item_maincourse' => 'required|string|max:255',
            'deskripsi_item_maincourse' => 'required|string|max:255',
            'kategori_item_maincourse' => 'required|in:karbohidrat,lauk pauk,tumisan,acar'
        ]);

        $thumbnailPath = null;
        if ($request->hasFile('thumbnail_item_maincourse')) {
            $thumbnailPath = $request->file('thumbnail_item_maincourse')->store('thumbnail_item_maincourse', 'public');
        }

        $itemmaincourse = ItemMainCourse::create([
            'nama_item_maincourse' => $request->nama_item_maincourse,
            'deskripsi_item_maincourse' => $request->deskripsi_item_maincourse,
            'kategori_item_maincourse' => $request->kategori_item_maincourse, 
            'thumbnail_item_maincourse' => $thumbnailPath,
        ]);

        return redirect()->route('itemmaincourse.index')->with('success', 'Item Main Course berhasil ditambahkan.');
    }


    /**
     * Display the specified resource.
     */
    public function show(ItemMainCourse $itemMainCourse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ItemMainCourse $itemMainCourse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ItemMainCourse $itemMainCourse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ItemMainCourse $itemMainCourse)
    {
        //
    }
    
}
