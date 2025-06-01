<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    use HasFactory;

    protected $primaryKey = 'ruangan_id';

    protected $fillable = [

        'gedung_id',
        'nama_ruangan',
        'kapasitas',
        'deskripsi',
        'tersedia',
    ];


    public function gedung()
    {
        return $this->belongsTo(Gedung::class, 'gedung_id');
    }

    public function peminjamans()
    {
        return $this->hasMany(Peminjaman::class, 'ruangan_id');
    }
}
