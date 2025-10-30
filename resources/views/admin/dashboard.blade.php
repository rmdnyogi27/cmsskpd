@extends('layouts.admin')

@section('main-content')

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{ __('Dashboard Admin') }}</h1>

{{-- Alert Success --}}
@if (session('success'))
<div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hiddeFn="true">&times;</span>
    </button>
</div>
@endif

{{-- Alert Status --}}
@if (session('status'))
<div class="alert alert-success border-left-success" role="alert">
    {{ session('status') }}
</div>
@endif

{{-- Bootstrap & Icons --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

<div class="container-fluid">

    {{-- ===== Informasi Akun ===== --}}
    <div class="row">
        <!-- Card: Nama Pengguna -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div>
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Nama Pengguna</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ Auth::user()->name }}</div>
                    </div>
                    <i class="fas fa-user fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>

        <!-- Card: Email -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div>
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Email</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ Auth::user()->email }}</div>
                    </div>
                    <i class="fas fa-envelope fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>

        <!-- Card: Status Akun -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div>
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Status Akun</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Aktif</div>
                    </div>
                    <i class="fas fa-check-circle fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>

        <!-- Card: Role -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div>
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Role</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ ucfirst(Auth::user()->role) }}</div>
                    </div>
                    <i class="fas fa-user-tag fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>

    {{-- ===== Ringkasan Utama ===== --}}
    <h1 class="h2 mb-4 fw-light text-secondary">Ringkasan Utama</h1>

    <div class="row g-4 mb-5">
        <!-- Total Pengguna -->
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="card shadow-sm border-0 rounded-4 p-3 bg-white">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-people-fill h1 me-3 text-primary"></i>
                        <div>
                            <p class="text-uppercase text-muted mb-1 small fw-bold">Total Pengguna</p>
                            <h4 class="mb-0 fw-bold">{{ number_format( $widget['users'])}}</h4>
                        </div>
                    </div>
                    <small class="text-success"><i class="bi bi-arrow-up me-1"></i> +12% dari bulan lalu</small>
                </div>
            </div>
        </div>

        <!-- Postingan Aktif -->
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="card shadow-sm border-0 rounded-4 p-3 bg-white">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-file-earmark-text-fill h1 me-3 text-info"></i>
                        <div>
                            <p class="text-uppercase text-muted mb-1 small fw-bold">Postingan Aktif</p>
                            <h4 class="mb-0 fw-bold">1.234</h4>
                        </div>
                    </div>
                    <small class="text-danger"><i class="bi bi-arrow-down me-1"></i> -3% dari bulan lalu</small>
                </div>
            </div>
        </div>

        <!-- Kunjungan Hari Ini -->
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="card shadow-sm border-0 rounded-4 p-3 bg-white">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-graph-up-arrow h1 me-3 text-success"></i>
                        <div>
                            <p class="text-uppercase text-muted mb-1 small fw-bold">Kunjungan Hari Ini</p>
                            <h4 class="mb-0 fw-bold">45.2K</h4>
                        </div>
                    </div>
                    <small class="text-success"><i class="bi bi-arrow-up me-1"></i> +1.5K dari kemarin</small>
                </div>
            </div>
        </div>

        <!-- Pesan Belum Dibaca -->
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="card shadow-sm border-0 rounded-4 p-3 bg-white">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-bell-fill h1 me-3 text-warning"></i>
                        <div>
                            <p class="text-uppercase text-muted mb-1 small fw-bold">Pesan Belum Dibaca</p>
                            <h4 class="mb-0 fw-bold">12</h4>
                        </div>
                    </div>
                    <small class="text-muted">Segera ditindaklanjuti</small>
                </div>
            </div>
        </div>
    </div>

    {{-- ===== Grafik dan Aktivitas ===== --}}
    <div class="row g-4">
        <!-- Grafik Tren -->
        <div class="col-lg-8">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-header bg-white border-bottom p-4">
                    <h5 class="mb-0 fw-semibold text-dark">Tren Kunjungan Bulanan</h5>
                </div>
                <div class="card-body p-4">
                    <div class="d-flex justify-content-center align-items-center rounded" style="height: 300px; background-color: #f8f9fa;">
                        <p class="text-muted">Placeholder Grafik Line (Chart.js)</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Aktivitas Terbaru -->
        <div class="col-lg-4">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-header bg-white border-bottom p-4">
                    <h5 class="mb-0 fw-semibold text-dark">Aktivitas Pengguna Terbaru</h5>
                </div>
                <div class="card-body p-4">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <div><i class="bi bi-person-plus text-success me-2"></i> User baru mendaftar</div>
                            <span class="badge bg-success-subtle text-success">5m lalu</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <div><i class="bi bi-chat-left-text text-info me-2"></i> Komentar baru di "Post X"</div>
                            <span class="badge bg-info-subtle text-info">1j lalu</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <div><i class="bi bi-file-earmark-plus text-primary me-2"></i> Postingan baru di-publish</div>
                            <span class="badge bg-primary-subtle text-primary">3j lalu</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <div><i class="bi bi-clock-history text-muted me-2"></i> Pengaturan diubah</div>
                            <span class="badge bg-secondary-subtle text-secondary">Kemarin</span>
                        </li>
                    </ul>
                    <a href="#" class="btn btn-sm btn-outline-primary mt-3 w-100">Lihat Semua Log</a>
                </div>
            </div>
        </div>
    </div>

    {{-- ===== Postingan Populer ===== --}}
    <h2 class="h3 mt-5 mb-4 fw-light text-secondary">Postingan dengan Traffic Tertinggi</h2>

    <div class="card shadow-sm border-0 rounded-4 mb-5">
        <div class="card-body p-4">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Judul Postingan</th>
                            <th>Kategori</th>
                            <th>Penulis</th>
                            <th>Views (Bulan Ini)</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>5 Tren Desain Web Terbaru Tahun 2025</td>
                            <td><span class="badge bg-info">Teknologi</span></td>
                            <td>Faisal R.</td>
                            <td>15.200</td>
                            <td><a href="#" class="btn btn-sm btn-outline-secondary"><i class="bi bi-pencil"></i></a></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Panduan Lengkap SEO untuk Pemula</td>
                            <td><span class="badge bg-success">SEO</span></td>
                            <td>Aisyah P.</td>
                            <td>14.100</td>
                            <td><a href="#" class="btn btn-sm btn-outline-secondary"><i class="bi bi-pencil"></i></a></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Memilih Hosting Terbaik di Indonesia</td>
                            <td><span class="badge bg-warning text-dark">Review</span></td>
                            <td>Bambang S.</td>
                            <td>10.500</td>
                            <td><a href="#" class="btn btn-sm btn-outline-secondary"><i class="bi bi-pencil"></i></a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

{{-- Bootstrap JS --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Optional: Toggle sidebar for mobile view
    const sidebarEl = document.getElementById('sidebarMenu');
    const sidebarToggle = document.querySelector('.navbar-toggler');

    if (sidebarToggle) {
        sidebarToggle.addEventListener('click', () => {
            sidebarEl.classList.toggle('show');
        });
    }
</script>

@endsection