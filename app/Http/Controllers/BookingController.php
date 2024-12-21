<?php

namespace App\Http\Controllers;
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
use App\Models\PesananGedung;
use App\Models\ItemMainCourse;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
        
        return view('client.booking', compact(
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
    
    public function showdekorasi()
    {
        $dekorasis = Dekorasi::all(); 
        $dekorasiss = DekorasiImage::all();
        return view('client.bookingdekorasi', ['dekorasis' => $dekorasis], ['dekorasiss' => $dekorasiss]);
    }
    
    public function showgedung()
    {
        $gedungs = Gedung::all(); 
        $gedungss = GedungImage::all();
        return view('client.detail.detailgedung', ['gedungs' => $gedungs], ['gedungss' => $gedungss]);
    }
    
    public function getAvailableGedung($tanggal)
    {
        $bookedGedungIds = PesananGedung::whereHas('pemesanan', function($query) use ($tanggal) {
            $query->where('tanggal_acara', $tanggal);
        })->pluck('id_gedung')->toArray();

        $availableGedung = Gedung::whereNotIn('id_gedung', $bookedGedungIds)->get();

        return $availableGedung;
    }

    public function showAvailableGedung(Request $request)
    {
        $tanggal = $request->input('tanggal');
        $availableGedung = $this->getAvailableGedung($tanggal);
    
        return view('booking.available_gedung', compact('availableGedung'));
    }

    
    public function showkatering()
    {
        
        $maincourses = Maincourse::all(); 
        $dishes = Dishes::all();
        $itemmaincourses = ItemMainCourse::all(); 
        
        return view('client.bookingkatering', ['maincourses' => $maincourses], ['dishes' => $dishes], ['itemmaincourses' => $itemmaincourses]);        
    }

    
    public function showhiburan()
    {
        $hiburans = Hiburan::all(); 
        $hiburanss = HiburanImage::all();
        return view('client.bookinghiburan', ['hiburans' => $hiburans], ['hiburanss' => $hiburanss]);
    }
    
    public function showdokumentasi()
    {
        $dokumentasis = Dokumentasi::all(); 
        $dokumentasiss = DokumentasiImage::all();
        return view('client.bookingdokumentasi', ['dokumentasis' => $dokumentasis], ['dokumentasiss' => $dokumentasiss]);
    }
    
    public function showundangan()
    {
        $undangans = Undangan::all(); 
        $undanganss = UndanganImage::all();
        return view('client.bookingundangan', ['undangans' => $undangans], ['undanganss' => $undanganss]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function show(Booking $booking, Gedung $gedung)
    {
        return view('client.index', compact('gedungs'));
    }
    
    public function showDataPemesan(Request $request)
    {
        // Ambil dekorasi yang dipilih
        $selected_dekorasi = $request->input('selected_dekorasi');

        // Kirim dekorasi terpilih ke halaman berikutnya
        return view('dataPemesan', compact('selected_dekorasi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        //
    }
    
    public function filter(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'tanggal_acara' => 'required|date',
            'kapasitas' => 'required|integer|min:1'
        ]);

        $tanggal_acara = $request->input('tanggal_acara');
        $kapasitas = $request->input('kapasitas');

        $gedungs = Gedung::where('kapasitas', '>=', $kapasitas)
                        ->whereDoesntHave('bookings', function ($query) use ($tanggal_acara) {
                            $query->where('tanggal_acara', $tanggal_acara);
                        })
                        ->get();

        return view('client.booking_results', compact('gedungs'));
    }
    
    public function detailundangan($id)
    {
        $undangans = Undangan::findOrFail($id);
        return view('client.detail.detailundangan', compact('undangans'));
    }
    
    public function detailmaincourse($id)
    {
        $maincourses = Maincourse::findOrFail($id);
        $dishes = Dishes::all();
        $itemmaincourses = ItemMainCourse::all(); 
        $karbohidrat = ItemMaincourse::where('kategori_item_maincourse', 'karbohidrat')->get();
        $laukPauk = ItemMaincourse::where('kategori_item_maincourse', 'lauk pauk')->get();
        $tumisan = ItemMaincourse::where('kategori_item_maincourse', 'tumisan')->get();
        $acar = ItemMaincourse::where('kategori_item_maincourse', 'acar')->get();
        $dishes = Dishes::all();
        
        return view('client.detail.detailmaincourse', compact('maincourses',
         'dishes', 
         'itemmaincourses',
        'karbohidrat', 
        'laukPauk', 
        'tumisan', 
        'acar', 
        'dishes'));
    }

}
