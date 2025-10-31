@extends('layouts.admin')

@section('main-content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Tambah Berita</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('berita.simpan') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label>Judul Berita</label>
                    <input type="text" name="judul" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Keyword</label>
                    <input type="text" name="keyword" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Kategori</label>
                    <input type="text" name="kategori" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Isi Berita</label>
                    <textarea name="isi" id="editor" class="form-control" rows="8"></textarea>
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control" required>
                        <option value="aktif">Aktif</option>
                        <option value="tidak">Tidak Aktif</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection

@push('js')
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector: '#editor',
        height: 300,
        menubar: false,
        plugins: 'link image code lists',
        toolbar: 'undo redo | formatselect | bold italic underline | bullist numlist | link image | code',
        content_style: 'body { font-family:Nunito,sans-serif; font-size:14px }'
    });
</script>
@endpush
