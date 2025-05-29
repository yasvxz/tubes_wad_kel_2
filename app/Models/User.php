<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Nama tabel (optional jika default)
    protected $table = 'users';

    // Primary key
    protected $primaryKey = 'user_id';

    // Primary key bukan UUID
    public $incrementing = true;
    protected $keyType = 'int';

    // Aktifkan timestamps (created_at dan updated_at)
    public $timestamps = true;

    // Kolom yang bisa diisi secara massal
    protected $fillable = [
        'nama',
        'nim',
        'username_sso',
        'password',
    ];

    // Kolom yang disembunyikan saat serialisasi (misalnya saat return JSON)
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Kolom yang dikonversi ke tipe tertentu
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Relasi ke admin (jika user juga adalah admin)
    public function admin()
    {
        return $this->hasOne(Admin::class, 'user_id', 'user_id');
    }

    // Relasi ke peminjaman
    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class, 'user_id', 'user_id');
    }

    // Relasi ke feedback
    public function feedback()
    {
        return $this->hasMany(Feedback::class, 'user_id', 'user_id');
    }
}
