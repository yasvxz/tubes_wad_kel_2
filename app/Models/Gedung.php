<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gedung extends Model
{
    use HasFactory;

    protected $primaryKey = 'gedung_id';
    protected $table = 'gedungs';

    protected $fillable = [
        'nama_gedung',
        'lokasi',
        'deskripsi',
        'kapasitas_total'
    ];

    // Relationship with Ruangan
    public function ruangans()
    {
        return $this->hasMany(Ruangan::class, 'gedung_id');
    }
} 