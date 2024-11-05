<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth; // Pastikan facade Auth diimpor dengan benar
use Illuminate\Support\Facades\Session;

class PersistCart
{
    public function handle($request, Closure $next)
    {
        // Cek jika user belum login, simpan keranjang ke session sementara
        if (!Auth::check()) { // Gunakan Auth::check() untuk memeriksa apakah user login
            Session::put('pre_login_cart', Session::get('cart', []));
        }

        return $next($request);
    }

    public function terminate($request, $response)
    {
        // Jika user baru saja login, pulihkan keranjang dari session sementara
        if (Auth::check() && Session::has('pre_login_cart')) {
            Session::put('cart', Session::get('pre_login_cart'));
            Session::forget('pre_login_cart'); // Hapus session sementara setelah digunakan
        }
    }
}
