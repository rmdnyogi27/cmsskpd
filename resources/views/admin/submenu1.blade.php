@extends('layouts.admin')

@section('main-content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Identitas Website</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('admin.identitas.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="nama_website">Nama Website</label>
                    <input type="text" name="nama_website" id="nama_website" class="form-control" 
                           value="{{ old('nama_website', $identitas->nama_website ?? '') }}">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control"
                           value="{{ old('email', $identitas->email ?? '') }}">
                </div>

                <div class="form-group">
                    <label for="domain">Domain</label>
                    <input type="text" name="domain" id="domain" class="form-control"
                           value="{{ old('domain', $identitas->domain ?? '') }}">
                </div>

                <div class="form-group">
                    <label for="sosial_network">Sosial Network</label>
                    <input type="text" name="sosial_network" id="sosial_network" class="form-control"
                           value="{{ old('sosial_network', $identitas->sosial_network ?? '') }}">
                </div>

                <div class="form-group">
                    <label for="no_telpon">No Telpon</label>
                    <input type="text" name="no_telpon" id="no_telpon" class="form-control"
                           value="{{ old('no_telpon', $identitas->no_telpon ?? '') }}">
                </div>

                <div class="form-group">
                    <label for="meta_deskripsi">Meta Deskripsi</label>
                    <textarea name="meta_deskripsi" id="meta_deskripsi" class="form-control" rows="2">{{ old('meta_deskripsi', $identitas->meta_deskripsi ?? '') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="meta_keyword">Meta Keyword</label>
                    <input type="text" name="meta_keyword" id="meta_keyword" class="form-control"
                           value="{{ old('meta_keyword', $identitas->meta_keyword ?? '') }}">
                </div>

                <div class="form-group">
                    <label for="google_maps">Google Maps</label>
                    <textarea name="google_maps" id="google_maps" class="form-control" rows="3">{{ old('google_maps', $identitas->google_maps ?? '') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="favicon">Favicon</label>
                    <input type="file" name="favicon" id="favicon" class="form-control-file">
                    @if(isset($identitas->favicon))
                        <div class="mt-2">
                            <p>Favicon Aktif Saat ini:</p>
                            <img src="{{ asset('storage/'.$identitas->favicon) }}" alt="favicon" width="30">
                        </div>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
