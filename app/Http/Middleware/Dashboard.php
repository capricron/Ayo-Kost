<?php

namespace App\Http\Middleware;

use Closure;

class Dashboard
{
    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->user()->role == "pemilik") {
            return $next($request);
        }

        // Jika pengguna belum terotentikasi atau bukan pemilik, dapatkan respons yang sesuai.
        // Contohnya, mengarahkan ke halaman login atau memberikan pesan error.
        if ($request->expectsJson()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        } else {
            return redirect('/login');
        }
    }
}

?>
