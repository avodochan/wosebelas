<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TestimoniController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $order = Order::where('user_id', Auth::id())->latest()->first();
        $testimoni = Testimoni::all();
        return view ('client.testimoni.index', compact('user', 'testimoni','order'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $order = Order::where('user_id', Auth::id())->latest()->first();

        if (!$order) {
            return redirect()->back()->with('error', 'Tidak ada pemesanan yang ditemukan.');
        }

        return view('client.testimoni.create', compact('order'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_pemesanan' => 'required|exists:orders,id_pemesanan',
            'id_customer' => 'required|exists:customers,id_customer',
            'nama' => 'required|string|max:255',
            'rating' => 'required|integer|between:1,5',
            'testimoni' => 'required|string',
        ]);

        Testimoni::create($validated);

        return redirect()->back()->with('success', 'Testimoni berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Testimoni $testimoni)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Testimoni $testimoni)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Testimoni $testimoni)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimoni $testimoni)
    {
        //
    }
}
