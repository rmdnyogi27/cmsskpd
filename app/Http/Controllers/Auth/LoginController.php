<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider; // Digunakan sebagai fallback jika Anda mau
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home'; // <-- INI PENGATURAN UTAMA!
    

protected function authenticated($request, $user)
{
    if ($user->role === 'admin') {
        return redirect()->route('admin.dashboard')
            ->with('success', '✅ Anda berhasil login sebagai Admin!');
    } elseif ($user->role === 'user') {
        return redirect()->route('user.dashboard')
            ->with('success', '👋 Anda berhasil login sebagai User!');
    }

    return redirect()->route('home');
}



    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Pastikan tamu (guest) tidak bisa mengakses controller ini kecuali method logout.
        $this->middleware('guest')->except('logout');
    }

    
}