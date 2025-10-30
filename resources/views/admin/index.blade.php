@extends('layouts.admin') {{-- Sesuaikan dengan nama layout Anda, asumsi menggunakan layout admin --}}

@section('main-content')
    <h1 class="h3 mb-4 text-gray-800">Modul Vidio - Daftar Vidio</h1>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Vidio</h6>
                </div>
                <div class="card-body">
                    <a href="{{ route('route_untuk_tambah_vidio') }}" class="btn btn-primary mb-3">Tambah Vidio Baru</a>

                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Judul Vidio</th>
                                    <th>Uploader</th>
                                    <th>Tanggal Upload</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($videos as $video)
                                <tr>
                                    <td>{{ $video->id }}</td>
                                    <td>{{ $video->judul }}</td>
                                    <td>{{ $video->uploader }}</td>
                                    <td>{{ $video->tanggal }}</td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-info">Edit</a>
                                        <a href="#" class="btn btn-sm btn-danger">Hapus</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection