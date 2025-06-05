<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rombel extends Model
{
    use HasFactory;

    protected $table = 'rombel';

    protected $fillable = [
        'tingkat_kelas',
        'jurusan',
        'banyak_kelas',
        'tahun_ajaran_id',
    ];

    public $timestamps = true;

    // Relasi: rombel milik satu tahun ajaran
    public function tahunAjaran()
    {
        return $this->belongsTo(TahunAjaran::class);
    }

    public function riwayatKelas()
    {
       return $this->hasMany(RiwayatKelas::class);
    }

}
