<?php


namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Testimoni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjekKamiController extends Controller
{
    public function index ()
    {
        $user = Auth::user();
        $order = Order::where('user_id', Auth::id())->latest()->first();
        $testimoni = Testimoni::all();       
        return view('client.projekkami.index', compact('user', 'order', 'testimoni') );
    }
}
