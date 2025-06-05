<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;

    protected $table = 'pengaduan';

    protected $fillable = [
        'user_id',
        'kategori_id',
        'judul_pengaduan',
        'nama_guru',
        'deskripsi',
        'status_pengaduan',
    ];

    public $timestamps = true;

    // Relasi ke User (pengadu)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke Kategori pengaduan
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
