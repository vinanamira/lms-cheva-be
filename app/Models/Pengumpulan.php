<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengumpulan extends Model
{
    use HasFactory;
    protected $table = 'pengumpulan';

    protected $fillable = [
        'tugas_id',
        'user_pengumpulan_id',
        'nilai_tugas',
        'created_at',
        'updated_at'
    ];
}
