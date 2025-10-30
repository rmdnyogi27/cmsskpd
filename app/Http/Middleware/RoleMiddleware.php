<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string  $role  // Parameter role yang dilewatkan dari route, contoh: 'admin' atau 'user'
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // 1. Cek apakah pengguna sudah login
        if (!Auth::check()) {
            return redirect('/login');
        }

        // 2. Cek apakah role pengguna sesuai dengan yang disyaratkan oleh route
        // Catatan: Pastikan kolom di database Anda bernama 'role' dan nilainya sama persis (case-sensitive)
        if (Auth::user()->role !== $role) {
            
            // Jika role tidak sesuai, tolak akses dan arahkan kembali ke /home
            // agar logika smart redirect (yang sudah kita buat) bisa mengarahkan lagi ke dashboard yang benar.
            return redirect('/home'); 
        }

        return $next($request);
    }
}