<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customer = Customer::where('user_id', Auth::id())->first();
        return view('client.profile.datapribadi', compact('customer'));
    }

    
    public function showhistori()
    {
        return view ('client.profile.historiorder');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('client.profile.datapribadi'); 
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email',
            'no_telepon' => 'required|string|max:20',
            'nik' => 'required|string|max:16',
            'gender' => 'required|string',
            'alamat' => 'required|string',
        ]);

        $customer = Customer::create([
            'user_id' => Auth::id(),
            'nama' => $request->input('nama'),
            'email' => $request->input('email'),
            'no_telepon' => $request->input('no_telepon'),
            'nik' => $request->input('nik'),
            'gender' => $request->input('gender'),
            'alamat' => $request->input('alamat'),
        ]);

        return redirect('/datadiri')->with('success', 'Data diri berhasil disimpan!');
    }

    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email,' . $id . ',id_customer',
            'no_telepon' => 'required|string|max:20',
            'nik' => 'required|string|max:16',
            'gender' => 'required|string',
            'alamat' => 'required|string',
        ]);

        $customer = Customer::find($id);

        if (!$customer) {
            return redirect('/datadiri')->with('error', 'Data tidak ditemukan.');
        }

        $customer->update($request->only(['nama', 'email', 'no_telepon', 'nik', 'gender', 'alamat']));

        return redirect('/datadiri')->with('success', 'Data diri berhasil diperbarui!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    
    public function histori()
    {
        $orders = Order::where('user_id', Auth::user()->id)->get();
        return view('client.profile.historiorder', compact('orders'));
    }

}
