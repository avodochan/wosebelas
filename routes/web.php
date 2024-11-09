<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\BridalStyleController;
use App\Http\Controllers\BridalStyleImageController;
use App\Http\Controllers\DekorasiController;
use App\Http\Controllers\DishesController;
use App\Http\Controllers\DokumentasiController;
use App\Http\Controllers\GedungController;
use App\Http\Controllers\HiburanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MaincourseController;
use App\Http\Controllers\OngoingOrderController;
use App\Http\Controllers\PendingOrderController;
use App\Http\Controllers\SouvenirController;
use App\Http\Controllers\SouvenirImageController;
use App\Http\Controllers\UndanganController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\PilihansayaController; 
use App\Http\Controllers\ItemMainCourseController;
use App\Http\Controllers\CustomerController; 
use App\Http\Controllers\OrderController;
use App\Models\Booking;
use App\Models\PilihanSaya;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'showuser'])->name('home');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login'); // Sesuaikan dengan halaman tujuan setelah logout
})->name('logout');

Route::get('admin/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'admin']);

//customer routes
Route::resource('customer', CustomerController::class);
Route::get('/datadiri', [CustomerController::class, 'index'])->name('customer.show');
Route::get('/datadiri/{customer}', [CustomerController::class,'show']);
Route::get('/historiorder', [CustomerController::class, 'historiorder'])->name('customer.edit');


//bridalstyle routes
Route::resource('bridal-styles', BridalStyleController::class);
Route::get('admin/databridalstyle', [BridalStyleController::class, 'index'])->middleware(['auth', 'admin']);
Route::post('admin/add/paketbridalstyle', [BridalStyleController::class, 'store'])->middleware(['auth', 'admin']);
Route::get('admin/databridalstyle/{bridalstyle}/edit', [BridalStyleController::class, 'edit'])->name('bridalStyle.edit');
Route::put('admin/databridalstyle/{bridalStyle}', [BridalStyleController::class, 'update'])->name('bridalStyle.update');

Route::resource('bridal-styleImage', BridalStyleImageController::class);
Route::post('admin/add/itembridalstyle', [BridalStyleImageController::class, 'store'])->middleware(['auth', 'admin']);
Route::get('admin/idatabridalstyle/{bridalStyle}/edit', [BridalStyleImageController::class, 'edit'])->name('bridalStyleImage.edit');
Route::put('admin/idatabridalstyle/{bridalStyle}', [BridalStyleImageController::class, 'update'])->name('bridalStyleImage.update');

//dekorasi routes
Route::resource('dekorasi', DekorasiController::class)->middleware(['auth', 'admin']);
Route::get('admin/datadekorasi', [DekorasiController::class, 'index'])->middleware(['auth', 'admin']);
Route::post('admin/add/datadekorasi', [DekorasiController::class, 'store'])->middleware(['auth', 'admin']);

//dishes routes
Route::resource('dishes', DishesController::class);
Route::get('admin/datadishes', [DishesController::class, 'index'])->middleware(['auth', 'admin']);
Route::post('admin/add/datadishes', [DishesController::class, 'store'])->middleware(['auth', 'admin']);

//dokumentasi routes
Route::resource('dokumentasi', DokumentasiController::class);
Route::get('admin/datadokumentasi', [DokumentasiController::class, 'index'])->middleware(['auth', 'admin']);
Route::post('admin/add/datadokumentasi', [DokumentasiController::class, 'store'])->middleware(['auth', 'admin']);

//gedung routes
Route::resource('gedung', GedungController::class);
Route::get('admin/datagedung', [GedungController::class, 'index'])->middleware(['auth', 'admin']);
Route::post('admin/add/datagedung', [GedungController::class, 'store'])->middleware(['auth', 'admin']);

//hiburan routes
Route::resource('hiburan', HiburanController::class);
Route::get('admin/datahiburan', [HiburanController::class, 'index'])->middleware(['auth', 'admin']);
Route::post('admin/add/datahiburan', [HiburanController::class, 'store'])->middleware(['auth', 'admin']);

//maincourse routes
Route::resource('maincourse', MaincourseController::class);
Route::get('admin/datamaincourse', [MaincourseController::class, 'index'])->middleware(['auth', 'admin']);
Route::post('admin/add/datamaincourse', [MaincourseController::class, 'store'])->middleware(['auth', 'admin']);
Route::get('detail/maincourse{maincourse}', [BookingController::class, 'detailmaincourse'])->name('detail.maincourse');

//souvenir routes
Route::resource('souvenir', SouvenirController::class);
Route::get('admin/datasouvenir', [SouvenirController::class, 'index'])->middleware(['auth', 'admin']);
Route::post('admin/add/datasouvenir', [SouvenirController::class, 'store'])->middleware(['auth', 'admin']);

Route::resource('souvenirImage', SouvenirImageController::class);
Route::post('admin/add/souvenir', [SouvenirImageController::class, 'store'])->middleware(['auth', 'admin']);

//undangan routes
Route::resource('undangan', UndanganController::class);
Route::get('admin/dataundangan', [UndanganController::class, 'index'])->middleware(['auth', 'admin']);
Route::post('admin/add/dataundangan', [UndanganController::class, 'store'])->middleware(['auth', 'admin']);
Route::get('detail/undangan{undangan}', [BookingController::class, 'detailundangan'])->name('detail.undangan');

//item maincourse routes
Route::resource('itemmaincourse', ItemMainCourseController::class);
Route::get('admin/itemmaincourse', [ItemMainCourseController::class, 'index'])->middleware(['auth', 'admin']);
Route::post('admin/add/itemmaincourse', [ItemMainCourseController::class,'store'])->middleware(['auth', 'admin']);

//pending order route
Route::resource('pendingorder', PendingOrderController::class);
Route::get('admin/pendingorder', [PendingOrderController::class, 'index'])->middleware(['auth', 'admin']);

//order route
Route::post('/order/store', [OrderController::class, 'store'])->name('order.store');

//booking route
Route::resource('/booking', BookingController::class);
Route::post('admin/add/booking', [BookingController::class, 'store'])->middleware(['auth', 'admin']);
Route::get('client/booking/filter', [BookingController::class, 'filter'])->name('client.booking.filter');

//bookingdekorasi
Route::resource('/bookingdekorasi', BookingController::class, );
Route::get('/bookingdekor', [BookingController::class,'showdekorasi'])->name('dekorasi.show');
Route::get('/bookingkatering', [BookingController::class,'showkatering']);
Route::get('/bookinggedung', [BookingController::class,'showgedung'])->name('gedung.show');
Route::get('/bookinghiburan', [BookingController::class,'showhiburan'])->name('hiburan.show');
Route::get('/bookingdokumentasi', [BookingController::class,'showdokumentasi'])->name('dokumentasi.show');
Route::get('/bookingundangan', [BookingController::class,'showundangan'])->name('undangan.show');
Route::post('/data-pemesan', [BookingController::class, 'showDataPemesan'])->name('dataPemesan');
Route::get('client/bookingdekorasi/filter', [BookingController::class, 'filter'])->name('client.bookingdekorasi.filter');
Route::post('/gedung/available', [BookingController::class, 'showAvailableGedung'])->name('gedung.available');

Route::get('/pilihansaya', [DekorasiController::class, 'pemesanan'])->name('pilihansaya');

Route::post('/keranjang/dekorasi', [KeranjangController::class, 'addDekorasi'])->name('keranjang.addDekorasi');
Route::post('/keranjang/dokumentasi', [KeranjangController::class, 'addDokumentasi'])->name('keranjang.addDokumentasi');
Route::post('/keranjang/undangan', [KeranjangController::class, 'addUndangan'])->name('keranjang.addUndangan');
Route::get('/keranjang', [KeranjangController::class, 'showCart'])->name('keranjang.show');
Route::post('/keranjang/update', [KeranjangController::class, 'updateCart'])->name('keranjang.update');
Route::post('/keranjang/checkout', [KeranjangController::class, 'checkout'])->name('keranjang.checkout');

require __DIR__.'/auth.php';
 