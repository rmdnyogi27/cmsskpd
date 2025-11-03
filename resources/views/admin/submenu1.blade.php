@extends('layouts.admin')

@section('main-content')
<div class="container mt-4">
    <h4>Identitas Website</h4>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('identitas.update') }}" method="POST">
        @csrf

        <div class="form-group mt-2">
            <label>Nama Website</label>
            <input type="text" name="nama_website" class="form-control"
                   value="{{ old('nama_website', $identitas->nama_website ?? '') }}">
        </div>

        <div class="form-group mt-2">
            <label>Email</label>
            <input type="email" name="email" class="form-control"
                   value="{{ old('email', $identitas->email ?? '') }}">
        </div>

        <div class="form-group mt-2">
            <label>Domain</label>
            <input type="text" name="domain" class="form-control"
                   value="{{ old('domain', $identitas->domain ?? '') }}">
        </div>

        <div class="form-group mt-2">
            <label>Sosial Network</label>
            <input type="text" name="sosial_network" class="form-control"
                   value="{{ old('sosial_network', $identitas->sosial_network ?? '') }}">
        </div>

        <div class="form-group mt-2">
            <label>No. Telepon</label>
            <input type="text" name="no_telpon" class="form-control"
                   value="{{ old('no_telpon', $identitas->no_telpon ?? '') }}">
        </div>

        <div class="form-group mt-2">
            <label>Meta Deskripsi</label>
            <textarea name="meta_deskripsi" class="form-control" rows="3">{{ old('meta_deskripsi', $identitas->meta_deskripsi ?? '') }}</textarea>
        </div>

        <div class="form-group mt-2">
            <label>Meta Keyword</label>
            <input type="text" name="meta_keyword" class="form-control"
                   value="{{ old('meta_keyword', $identitas->meta_keyword ?? '') }}">
        </div>

        <div class="form-group mt-2">
            <label>Google Maps</label>
            <textarea name="google_maps" class="form-control" rows="3">{{ old('google_maps', $identitas->google_maps ?? '') }}</textarea>
        </div>

        <div class="form-group mt-2">
            <label>Favicon</label>
            <input type="text" name="favicon" class="form-control"
                   value="{{ old('favicon', $identitas->favicon ?? '') }}">
        </div>

        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
    </form>
</div>
@endsection
