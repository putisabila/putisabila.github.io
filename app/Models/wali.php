<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class wali extends Model
{
    use HasFactory;

    protected $fillable = [
        'namaSiswa', 'kelasSiswa', 'namaWali', 'alamatWali', 'noHpWali'
    ];
}
