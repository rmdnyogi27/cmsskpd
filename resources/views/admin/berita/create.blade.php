@extends('layouts.admin')

@section('main-content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Tambah Berita</h1>

    <form action="{{ route('berita.store') }}" method="POST">
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
            {{-- **PERUBAHAN 1: Ganti ID dari 'isi' menjadi 'editor'** --}}
            <textarea name="isi" id="editor" class="form-control" rows="10"></textarea> 
        </div>
        <div class="form-group">
            <label>Status</label>
            <select name="status" class="form-control" required>
                <option value="aktif">Aktif</option>
                <option value="tidak">Tidak</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('berita.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>

@push('scripts')
{{-- **PERUBAHAN 2: Pastikan menggunakan versi TinyMCE yang benar, misal 6.7.2** --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.7.2/tinymce.min.js" referrerpolicy="origin"></script> 
<script>
    // **PERUBAHAN 3: Pastikan selector menargetkan ID 'editor'**
    tinymce.init({
        selector: 'textarea#editor', 
        plugins: 'advlist autolink lists link image charmap print preview anchor',
        toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }',
        menubar: 'file edit insert view format table tools help',
        // Tambahkan konfigurasi lain sesuai kebutuhan Anda
    });
</script>
@endpush
@endsection