<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;

class HomeController extends Controller
{
    public function index()
    {
        // $orders = Order::with('items')->get();
        return view('admin.dashboard');
    }
    
    public function showuser()
    {
        return view('client.index');
    }
    
    
    
    public function databridalstyle()
    {
        // return view('admin.cruditem.databridalstyle');
    }
    
    public function datadekorasi()
    {
        return view('admin.cruditem.datadekorasi');
    }
    
    public function datadishes()
    {
        return view('admin.cruditem.datadishes');
    }
    
    public function datadokumentasi()
    {
        return view('admin.cruditem.datadokumentasi');
    }
    
    public function datagedung()
    {
        return view('admin.cruditem.datagedung');
    }
    
    public function datahiburan()
    {
        return view('admin.cruditem.datahiburan');
    }
    
    public function datamaincourse()
    {
        return view('admin.cruditem.datamaincourse');
    }
    
    public function datasouvenir()
    {
        return view('admin.cruditem.datasouvenir');
    }
    public function dataundangan()
    {
        return view('admin.cruditem.dataundangan');
    }
    
    public function cruditem()
    {
        return view('admin.cruditem');
    }
    
    public function showhome()
    {
        return view('client.index');
    }
}
