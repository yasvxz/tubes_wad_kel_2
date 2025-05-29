<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'judul',
        'keluhan',
        'attachment',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function peminjaman() {
        return $this->belongsTo(Peminjaman::class);
    }
}