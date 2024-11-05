<?php

namespace App\Http\Controllers;

use App\Models\PendingOrder;
use Illuminate\Http\Request;

class PendingOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pemesanan.pendingorder');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PendingOrder $pendingOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PendingOrder $pendingOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PendingOrder $pendingOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PendingOrder $pendingOrder)
    {
        //
    }
}
