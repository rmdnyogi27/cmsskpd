<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Identitas extends Model
{
    protected $table = 'identitas'; // nama tabel di database kamu
    protected $fillable = [
        'nama_website',
        'email',
        'domain',
        'sosial_network',
        'no_telpon',
        'meta_deskripsi',
        'meta_keyword',
        'google_maps',
        'favicon'
    ];
}
