<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Laravel SB Admin 2">
    <meta name="author" content="Alejandro RH">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>INDRAMAYU REANG</title>

    @if (session('success'))
    <script>
        Swal.fire({
            toast: true,
            position: 'top',
            icon: 'success',
            title: '{{ session('success') }}',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            background: '#e6fff2',
            color: '#155724',
            customClass: { popup: 'shadow-lg rounded-lg' }
        });
    </script>
    @endif

    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700,800" rel="stylesheet">
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('img/favicon.png') }}" rel="icon" type="image/png">
    @stack('css')

    <style>
        /* Sidebar custom styling */
        .sidebar {
            background: linear-gradient(180deg, #4e73df 10%, #224abe 100%);
        }
        .sidebar .nav-item .nav-link {
            padding: 10px 20px;
            font-weight: 500;
            transition: all 0.2s ease-in-out;
        }
        .sidebar .nav-item .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.15);
            border-radius: 0.35rem;
        }
        .sidebar .collapse-inner a {
            font-size: 0.88rem;
            transition: 0.2s;
        }
        .sidebar .collapse-inner a:hover {
            background-color: #f8f9fc;
            color: #224abe !important;
            font-weight: 600;
        }

        /* Topbar styling */
        .topbar {
            border-bottom: 1px solid #e3e6f0;
        }
        .topbar .navbar-nav .nav-item .nav-link {
            color: #5a5c69;
        }
        .img-profile {
            width: 40px;
            height: 40px;
            background-color: #4e73df;
            color: white;
            text-align: center;
            line-height: 40px;
            font-size: 1.2rem;
        }

        /* Footer */
        footer.sticky-footer {
            border-top: 1px solid #e3e6f0;
            padding: 1rem 0;
        }

        /* Better collapse header */
        .collapse-header {
            font-size: 0.8rem;
            color: #858796;
            text-transform: uppercase;
            font-weight: 700;
            margin-top: 5px;
        }
    </style>
</head>

<body id="page-top">
<div id="wrapper">

   <!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center py-3" href="{{ route('home') }}">
        <div class="sidebar-brand-icon">
            <img src="{{ asset('img/logo.png') }}" alt="Logo" style="max-width:130px; height:auto; object-fit:contain;">
        </div>
    </a>

    <hr class="sidebar-divider my-0">

    <li class="nav-item {{ Nav::isRoute('home') }}">
        <a class="nav-link" href="{{ route('home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <hr class="sidebar-divider">
    <div class="sidebar-heading text-white-50 small">Settings</div>

    @if(Auth::user()->role == 'admin')
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMainMenu" aria-expanded="false">
            <i class="fas fa-fw fa-bars"></i>
            <span>Menu Utama</span>
        </a>
        <div id="collapseMainMenu" class="collapse" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded shadow-sm">
                <h6 class="collapse-header">Pilih Menu:</h6>
                <a class="collapse-item" href="{{ route('submenu1') }}">Identifikasi Website</a>
                <a class="collapse-item" href="{{ route('submenu2') }}">Menu Website</a>
                <a class="collapse-item" href="{{ route('submenu3') }}">Halaman Baru</a>
            </div>
        </div>
    </li>
    @endif

    {{-- Modul dihapus dari sini --}}

    <li class="nav-item {{ Nav::isRoute('berita.tambah') }}">
    <a class="nav-link" href="{{ route('berita.tambah') }}">
        <i class="fas fa-fw fa-newspaper"></i>
        <span>Tambah Berita</span>
    </a>
</li>


    <li class="nav-item {{ Nav::isRoute('basic.index') }}">
        <a class="nav-link" href="{{ route('basic.index') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Pengguna</span>
        </a>
    </li>

    <li class="nav-item {{ Nav::isRoute('profile') }}">
        <a class="nav-link" href="{{ route('profile') }}">
            <i class="fas fa-fw fa-user"></i>
            <span>Profil</span>
        </a>
    </li>

    <li class="nav-item {{ Nav::isRoute('about') }}">
        <a class="nav-link" href="{{ route('about') }}">
            <i class="fas fa-fw fa-info-circle"></i>
            <span>Tentang</span>
        </a>
    </li>

    <li class="nav-item {{ Nav::isRoute('blank') }}">
        <a class="nav-link" href="{{ route('blank') }}">
            <i class="fas fa-fw fa-book"></i>
            <span>Blank Page</span>
        </a>
    </li>

    <hr class="sidebar-divider d-none d-md-block">
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<!-- End Sidebar -->


            <div class="container-fluid">
                @stack('notif')
                @yield('main-content')
            </div>
        </div>

        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center text-gray-600 small">
                    <span>© INDRAMAYU 2025 | DISKOMINFO INDRAMAYU</span>
                </div>
            </div>
        </footer>
    </div>
</div>

<a class="scroll-to-top rounded" href="#page-top"><i class="fas fa-angle-up"></i></a>

<!-- Logout Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Apakah Yakin Untuk Keluar?</h5>
                <button class="close" type="button" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">Klik "Keluar" di bawah jika Anda siap untuk mengakhiri sesi Anda saat ini.</div>
            <div class="modal-footer">
                <button class="btn btn-light" type="button" data-dismiss="modal">Kembali</button>
                <a class="btn btn-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Keluar</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
<script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
@stack('js')
</body>
</html>