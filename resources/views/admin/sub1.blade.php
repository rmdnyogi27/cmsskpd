@extends('layouts.admin')

@section('main-content')

<div class="container py-7">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12">
            <div class="card shadow-lg border-0 rounded-3">
                <div class="card-header bg-primary text-white p-4">
                    <h4 class="mb-0">Pengaturan Identitas Website</h4>
                    <p class="mb-0 opacity-75">Kelola informasi dasar dan SEO website Anda.</p>
                </div>
                <div class="card-body p-4 p-md-5">
                    <form>
                        <fieldset class="mb-4 pb-4 border-bottom">
                            <legend class="h5 text-primary mb-3">Informasi Utama</legend>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="namaWebsite" class="form-label">Nama Website</label>
                                    <input type="text" class="form-control" id="namaWebsite" placeholder="Contoh: Perusahaan Kreatif A" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="domainWebsite" class="form-label">Domain Website</label>
                                    <input type="url" class="form-control" id="domainWebsite" placeholder="Contoh: https://www.websiteanda.com" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="emailWebsite" class="form-label">Email Kontak</label>
                                    <input type="email" class="form-control" id="emailWebsite" placeholder="kontak@websiteanda.com" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="telponWebsite" class="form-label">Nomor Telepon</label>
                                    <input type="tel" class="form-control" id="telponWebsite" placeholder="+62 8xx xxxx xxxx">
                                </div>
                            </div>
                        </fieldset>

                        <fieldset class="mb-4 pb-4 border-bottom">
                            <legend class="h5 text-primary mb-3">Pengaturan SEO (Meta Data)</legend>
                            <div class="mb-3">
                                <label for="metaDeskripsi" class="form-label">Meta Deskripsi (Max 160 Karakter)</label>
                                <textarea class="form-control" id="metaDeskripsi" rows="3" placeholder="Deskripsi singkat yang relevan untuk mesin pencari..."></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="metaKeyword" class="form-label">Meta Keyword (Dipisahkan koma)</label>
                                <input type="text" class="form-control" id="metaKeyword" placeholder="keyword1, keyword2, bisnis, layanan">
                            </div>
                        </fieldset>
                        
                        <fieldset class="mb-4 pb-4">
                            <legend class="h5 text-primary mb-3">Sosial Media & Lokasi</legend>
                            
                            <div class="mb-3">
                                <label for="sosialNetwork" class="form-label">Link Sosial Media Utama (Misal: Instagram/Facebook)</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-link-45deg"></i></span>
                                    <input type="url" class="form-control" id="sosialNetwork" placeholder="https://instagram.com/akunanda">
                                </div>
                                <div class="form-text">Anda bisa menambahkan lebih banyak di pengaturan terpisah, ini untuk link utama.</div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="googleMaps" class="form-label">Kode Embed Google Maps (Iframe)</label>
                                <textarea class="form-control" id="googleMaps" rows="5" placeholder="Tempelkan kode <iframe> dari Google Maps di sini..."></textarea>
                            </div>

                            <div class="mb-3">
                                <p class="form-label">Pratinjau Lokasi (Jika Kode Embed Valid):</p>
                                <div class="ratio ratio-16x9 border rounded" style="background-color: #e9ecef;">
                                    <div class="d-flex justify-content-center align-items-center text-muted">
                                        [Pratinjau Peta Muncul di Sini]
                                    </div>
                                </div>
                            </div>
                        </fieldset>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end pt-3">
                            <button type="reset" class="btn btn-outline-secondary">Reset Formulir</button>
                            <button type="submit" class="btn btn-primary btn-lg">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
@endsection
