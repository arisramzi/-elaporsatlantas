<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    // Satpam menerima request dan daftar role yang dibolehkan (pisahkan pakai koma)
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        $user = Auth::user();

        // Cek apakah role user ada di daftar yang dibolehkan?
        // Logika array intersection
        if (in_array($user->role, $roles)) {
            return $next($request); // Silakan lewat
        }

        // Kalau role tidak cocok, tendang keluar/tampilkan error 403
        abort(403, 'ANDA TIDAK PUNYA AKSES KE HALAMAN INI!');
    }
}