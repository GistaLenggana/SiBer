<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    // Menyesuaikan nama tabel (karena bukan 'kategoris')
    protected $table = 'kategori';

    // Kolom yang bisa diisi secara massal
    protected $fillable = [
        'nama_kategori',
    ];

    public $timestamps = true;

    public function pengaduan()
{
    return $this->hasMany(Pengaduan::class);
}

}
