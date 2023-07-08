<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;
    protected $table = 'file';

    protected $fillable = [
        'pengumpulan_id',
        'materi_id',
        'kategori_anggota',
        'file_pengumpulan',
        'kategori_mentor',
        'file_materi',
        'deskripsi',
        'created_at',
        'updated_at'
    ];
}
