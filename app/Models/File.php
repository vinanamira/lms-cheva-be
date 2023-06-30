<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;
    protected $table = 'file';

    protected $fillable = [
        'file',
        'created_at',
        'updated_at'
    ];
}
