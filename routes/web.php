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
use App\Http\Controllers\SouvenirController;
use App\Http\Controllers\SouvenirImageController;
use App\Http\Controllers\UndanganController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\ItemMainCourseController;
use App\Http\Controllers\CustomerController; 
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PembayaranController; 
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProjekKamiController;
use App\Http\Controllers\TentangKamiController;
use App\Http\Controllers\KontakKamiController;
use App\Http\Controllers\HistoriOrderController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ItemBridalStyleController;
use App\Http\Controllers\TestimoniController;
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
    return redirect('/login'); 
})->name('logout');

Route::get('admin/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'admin']);

//admin profile routes
Route::get('/adminprofile', [AdminController::class, 'showProfile'])->middleware('auth');

//customer routes
Route::middleware(['auth'])->group(function () {
    Route::get('/datadiri', [CustomerController::class, 'index'])->name('customer.index');
    Route::post('/datadiri', [CustomerController::class, 'store'])->name('customer.store');
    Route::post('/datadiri/{id_customer}/update', [CustomerController::class, 'update'])->name('customer.update');

});

//projek kami routes
Route::get('/projekkami', [ProjekKamiController::class, 'index'])->name('projekkami.index');

//tentang kami routes
Route::get('/tentangkami', [TentangKamiController::class, 'index'])->name('tentangkami.index');

//kontak kami routes
Route::get('/kontakkami', [KontakKamiController::class, 'index'])->name('kontakkami.index');

//histori order routes
Route::get('/historiorder', [CustomerController::class, 'histori'])->name('historiorder.index');

//testimoni routes 
Route::get('/testimoni', [TestimoniController::class, 'index'])->name('testimoni.index');
Route::post('/add/testimoni', [TestimoniController::class, 'store'])->name('testimoni.store');

//bridalstyle routes
Route::resource('bridal-styles', BridalStyleController::class); 
    
Route::get('admin/databridalstyle', [BridalStyleController::class, 'index'])->middleware(['auth', 'admin']);
Route::post('admin/add/paketbridalstyle', [BridalStyleController::class, 'store'])->middleware(['auth', 'admin']);
Route::get('admin/databridalstyle/{bridalstyle}/edit', [BridalStyleController::class, 'edit'])->name('bridalStyle.edit');
// Route::put('admin/databridalstyle/{bridalStyle}', [BridalStyleController::class, 'update'])->name('bridalStyle.update');

Route::resource('bridal-styleImage', BridalStyleImageController::class);
Route::get('admin/itembridalstyle', [BridalStyleImageController::class, 'index'])->middleware(['auth', 'admin']);
Route::post('admin/add/itembridalstyle', [BridalStyleImageController::class, 'store'])->middleware(['auth', 'admin']);
Route::get('admin/databridalstyle/{bridalStyle}/edit', [BridalStyleImageController::class, 'edit'])->name('bridalStyleImage.edit');
Route::put('admin/databridalstyle/{bridalStyle}', [BridalStyleImageController::class, 'update'])->name('bridalStyleImage.update');

//item bridalstyle
Route::post('admin/add/item/bridalstyle', [ItemBridalStyleController::class, 'store'])->middleware(['auth', 'admin']);

//dekorasi routes
Route::resource('dekorasi', DekorasiController::class)->middleware(['auth', 'admin']);
Route::get('admin/datadekorasi', [DekorasiController::class, 'index'])->middleware(['auth', 'admin']);
Route::post('admin/add/datadekorasi', [DekorasiController::class, 'store'])->middleware(['auth', 'admin']);
Route::put('/dekorasi/{id}', [DekorasiController::class, 'update']);


//dishes routes
Route::resource('dishes', DishesController::class);
Route::get('admin/datadishes', [DishesController::class, 'index'])->middleware(['auth', 'admin']);
Route::post('admin/add/datadishes', [DishesController::class, 'store'])->middleware(['auth', 'admin']);
Route::put('/dishes/{id}', [DishesController::class, 'update']);


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
Route::get('admin/itemsouvenir', [SouvenirImageController::class, 'index'])->middleware(['auth', 'admin']);
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

//order route
Route::post('/order/store', [OrderController::class, 'store'])->name('order.store');
Route::get('/admin/pendingorder', [OrderController::class, 'showPendingOrders'])->name('admin.pendingorder');
Route::get('admin/confirmedorder', [OrderController::class, 'showConfirmedOrder'])->middleware(['auth', 'admin']);
Route::get('admin/ongoingorder', [OrderController::class, 'showongoingorder'])->middleware(['auth', 'admin']);
Route::get('admin/successorder', [OrderController::class, 'showSuccessOrder'])->middleware(['auth', 'admin']);
Route::get('admin/histori', [OrderController::class, 'showHistori'])->middleware(['auth', 'admin']);
Route::get('/historiorder', [OrderController::class, 'showhistoriorder']);
Route::get('/order/{id}/detail', [OrderController::class, 'showDetail'])->name('admin.order.detail');

//update statys
Route::put('/admin/orders/{id}/update-status', [OrderController::class, 'updateStatus'])->name('admin.orders.updateStatus');
Route::put('/admin/orders/{id}/update-confrirm', [OrderController::class, 'updateConfirm'])->name('admin.orders.updateConfirm');
Route::put('/admin/orders/{id}/update-ongoing', [OrderController::class, 'updateOngoing'])->name('admin.orders.updateOngoing');



Route::get('/invoice/{id}', [OrderController::class, 'showInvoice'])->name('client.invoice');

//pembayaran
Route::get('admin/pembayaran', [PembayaranController::class, 'index'])->middleware(['auth', 'admin']);

//invoice routes
Route::get('admin/showinvoice', [InvoiceController::class, 'index'])->middleware(['auth', 'admin']);
Route::get('admin/createinvoice', [InvoiceController::class, 'create'])->middleware(['auth', 'admin'])->name('invoice.create');

//booking route
Route::resource('/booking', BookingController::class);


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

Route::post('/keranjang/gedung', [KeranjangController::class, 'addGedung'])->name('keranjang.addGedung');
Route::post('/keranjang/dekorasi', [KeranjangController::class, 'addDekorasi'])->name('keranjang.addDekorasi');
Route::post('/keranjang/dokumentasi', [KeranjangController::class, 'addDokumentasi'])->name('keranjang.addDokumentasi');
Route::post('/keranjang/undangan', [KeranjangController::class, 'addUndangan'])->name('keranjang.addUndangan');
Route::post('/keranjang/katering', [KeranjangController::class, 'addKatering'])->name('keranjang.addKatering');
Route::post('/keranjang/hiburan', [KeranjangController::class, 'addHiburan'])->name('keranjang.addHiburan');
Route::post('/keranjang/bridal-style', [KeranjangController::class, 'addBridalStyle'])->name('keranjang.addBridalStyle');
Route::post('/keranjang/souvernir', [KeranjangController::class, 'addSouvernir'])->name('keranjang.addSouvernir');
Route::get('/keranjang', [KeranjangController::class, 'showCart'])->name('keranjang.show');
Route::post('/keranjang/update', [KeranjangController::class, 'updateCart'])->name('keranjang.update');
Route::post('/keranjang/checkout', [KeranjangController::class, 'checkout'])->name('keranjang.checkout');

// Aksi konfirmasi dan tolak
Route::get('/admin/orders/{id}/confirm', [AdminController::class, 'confirmOrder'])->name('admin.orders.confirm');
Route::get('/admin/orders/{id}/reject', [AdminController::class, 'rejectOrder'])->name('admin.orders.reject');

//order routes 
Route::post('/upload-payment/{id}', [OrderController::class, 'uploadPayment'])->name('client.uploadPayment');



require __DIR__.'/auth.php';
 