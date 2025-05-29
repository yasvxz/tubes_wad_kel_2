<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $primaryKey = 'peminjaman_id'; // disesuaikan dengan nama kolom ID-mu

    protected $fillable = [
        'user_id',
        'ruangan_id',
        'tanggal',
        'jam_mulai',
        'jam_selesai',
        'keperluan',
        'status',
        'alasan_penolakan',
        'tanggal_pengajuan',
    ];

    // Relasi ke Ruangan
    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class, 'ruangan_id');
    }

    // Relasi ke User (mahasiswa)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    protected $table = 'peminjamans';

}
