<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    use HasFactory;
    protected $table = 'tugas';

    protected $fillable = [
        'nama_tugas',
        'deskripsi_tugas',
        'deadline_tugas',
        'created_at',
        'updated_at',
        'overdue'
    ];
}
