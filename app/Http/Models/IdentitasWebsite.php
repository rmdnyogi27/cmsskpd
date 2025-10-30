<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IdentitasWebsite extends Model
{
    use HasFactory;

    protected $table = 'identitas_websites';

    protected $fillable = [
        'nama_website',
        'email',
        'domain',
        'sosial_network',
        'no_telpon',
        'meta_deskripsi',
        'meta_keyword',
        'google_maps',
        'favicon',
    ];
}
