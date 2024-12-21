<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Gedung;
use App\Models\GedungImages;
use App\Models\Booking;
use App\Models\BridalStyle;
use App\Models\BridalStyleImage;
use App\Models\Dekorasi;
use App\Models\DekorasiImage;
use App\Models\Dishes;
use App\Models\DishesImage;
use App\Models\Dokumentasi;
use App\Models\DokumentasiImage;
use App\Models\GedungImage;
use App\Models\Hiburan;
use App\Models\HiburanImage;
use App\Models\Maincourse;
use App\Models\MaincourseImage;
use App\Models\Souvenir;
use App\Models\SouvenirImage;
use App\Models\Undangan;
use App\Models\UndanganImage;
use App\Models\Customer;
use App\Models\Testimoni;
use App\Models\Pembayaran;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $userId = Auth::id();
        $data =  [
            'customers' => Customer::count(),
            'orders' =>Order::count(),
            'order' => Order::orderBy('created_at', 'desc')->limit(4)->get(),
            'pembayarans' => Pembayaran::sum('jumlah_pembayaran'),
            'venue' => Order::where('status', 'success')->count(),
            'testimoni' => Testimoni::all(),
        ];
        $orders = Order::where('user_id', $userId)->get();
        return view('admin.dashboard', compact('user','data'));
    }
    
    public function showuser()
    {
        $user = Auth::user();
        $bridalstyles = BridalStyle::all();
        $bridalstyless = BridalStyleImage::all();
        $dekorasis = Dekorasi::all();
        $dekorasiss = DekorasiImage::all();
        $dishess = Dishes::all();
        $dishesss = DishesImage::all();
        $dokumentasis = Dokumentasi::all();
        $dokumentasiss = DokumentasiImage::all();
        $gedungs = Gedung::all();
        $gedungss = GedungImage::all();
        $hiburans = Hiburan::all();
        $hiburanss = HiburanImage::all();
        $maincourses = Maincourse::all();
        $maincoursess = MaincourseImage::all();
        $souvenirs = Souvenir::all();
        $souvenirss = SouvenirImage::all();
        $undangans = Undangan::all();
        $undanganss = UndanganImage::all();
        
        return view('client.index', compact(
            'user',
            'bridalstyles', 
        'bridalstyless', 
                    'dekorasis', 
                    'dekorasiss',   
                    'dishess', 
                    'dishesss', 
                    'dokumentasis', 
                    'dokumentasiss', 
                    'gedungs', 
                    'gedungss', 
                    'hiburans', 
                    'hiburanss',
                    'maincourses',
                    'maincoursess',
                    'souvenirs',
                    'souvenirss', 
                    'undangans', 
                    'undanganss'
                ));
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
