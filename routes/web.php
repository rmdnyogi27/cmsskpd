<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BasicController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\User;
use App\Http\Controllers\Admin\BasicController as AdminBasicController;
use App\Http\Controllers\User\BasicController as UserBasicController;
use App\Http\Controllers\IdentitasWebsiteController;
use App\Http\Controllers\VidioController;
use App\Http\Controllers\BennerController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\InteraksiController;

// --------------------------------------------------------------------------
// WEB ROUTES
// --------------------------------------------------------------------------

Route::get('/', function () {
    return view('welcome');
});

// =========================================================
// AUTHENTICATION ROUTES
// =========================================================
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// =========================================================
// SMART REDIRECT HUB (setelah login)
// =========================================================
Route::get('/home', function () {
    if (!Auth::check()) {
        return redirect('/login');
    }

    switch (Auth::user()->role) {
        case 'admin':
            return redirect()->route('admin.dashboard');
        case 'user':
            return redirect()->route('user.dashboard');
        default:
            return redirect()->route('blank');
    }
})->name('home');

// =========================================================
// DASHBOARD USER
// =========================================================
Route::middleware(['auth', 'role:user'])->prefix('user')->group(function () {
    Route::get('/dashboard', fn() => view('user.dashboard'))->name('user.dashboard');

    // CRUD khusus user
    Route::get('/basic', [UserBasicController::class, 'index'])->name('user.basic.index');
    Route::get('/basic/create', [UserBasicController::class, 'create'])->name('user.basic.create');
    Route::post('/basic', [UserBasicController::class, 'store'])->name('user.basic.store');
});

// =========================================================
// DASHBOARD ADMIN
// =========================================================
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    // Dashboard utama
    Route::get('/dashboard', function () {
        $widget = ['users' => User::count()];
        return view('admin.dashboard', compact('widget'));
    })->name('admin.dashboard');

    // CRUD khusus admin
    Route::get('/basic', [AdminBasicController::class, 'index'])->name('admin.basic.index');
    Route::get('/basic/create', [AdminBasicController::class, 'create'])->name('admin.basic.create');
    Route::post('/basic', [AdminBasicController::class, 'store'])->name('admin.basic.store');

    // Menu dan submenu
    Route::view('/menuutama', 'admin.menuutama')->name('menuutama');
    Route::view('/submenu1', 'admin.submenu1')->name('submenu1');
    Route::view('/submenu2', 'admin.submenu2')->name('submenu2');
    Route::view('/submenu3', 'admin.submenu3')->name('submenu3');

    //Modul berita 
    Route::view('/modulberita', 'admin.modulberita')->name('modulberita');
    Route::view('/sub1', 'admin.sub1')->name('sub1');
    Route::view('/sub2', 'admin.sub2')->name('sub2');
    Route::view('/sub3', 'admin.sub3')->name('sub3');

    // Identitas Website
    Route::get('/identitaswebsite', [IdentitasWebsiteController::class, 'edit'])->name('admin.identitas.edit');
    Route::put('/identitaswebsite', [IdentitasWebsiteController::class, 'update'])->name('admin.identitas.update');
});

// =========================================================
// PROFILE & STATIC PAGES
// =========================================================
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::resource('basic', BasicController::class);
});

Route::get('/about', fn() => view('about'))->name('about');
Route::get('/blank', fn() => view('blank'))->name('blank');

Route::group(['middleware' => ['auth']], function () {
    
    // Routes untuk Modul Vidio
    Route::get('/vidio', [VidioController::class, 'index'])->name('route_untuk_daftar_vidio');
    Route::get('/vidio/create', [VidioController::class, 'create'])->name('route_untuk_tambah_vidio');

    
    // Routes untuk Modul benner
    Route::get('/benner', [BennerController::class, 'index'])->name('route_untuk_daftar_benner');
    Route::get('/benner/create', [BennerController::class, 'create'])->name('route_untuk_tambah_benner');
   
        // Routes untuk Modul web
    Route::get('/web', [WebController::class, 'index'])->name('route_untuk_daftar_web');
    Route::get('/web/create', [WebController::class, 'create'])->name('route_untuk_tambah_web');

    Route::get('/interaksi', [InteraksiController::class, 'index'])->name('route_untuk_daftar_interaksi');
    Route::get('/interaksi/create', [InteraksiController::class, 'create'])->name('route_untuk_tambah_interaksi');
});
