<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileMateri extends Model
{
    use HasFactory;
    protected $table = 'file-materi';

    protected $fillable = [
        'file_materi',
        'deskripsi',
        'created_at'
    ];
}
