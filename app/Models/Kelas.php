<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'kelas';

    protected $fillable = [
        'nama_kelas',
        'mata_pelajaran',
        'kode_kelas',
        'deskripsi',
        'kapasitas',
        'status',
    ];
}