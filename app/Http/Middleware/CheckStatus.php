<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckStatus
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        // Jika user adalah Admin, loloskan saja (Admin selalu aktif)
        if ($user->role === 'admin') {
            return $next($request);
        }

        // Cek data peserta
        if ($user->peserta) {
            // Jika status PENDING -> Arahkan ke halaman tunggu
            if ($user->peserta->status === 'pending') {
                return redirect()->route('menunggu.persetujuan');
            }

            // Jika status DITOLAK
            if ($user->peserta->status === 'ditolak') {
                abort(403, 'Maaf, pengajuan magang Anda ditolak. Hubungi Admin.');
            }
        }

        return $next($request);
    }
}
