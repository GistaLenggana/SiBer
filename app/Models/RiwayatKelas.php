<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatKelas extends Model
{
    use HasFactory;

    protected $table = 'riwayat_kelas';

    protected $fillable = [
        'user_id',
        'rombel_id',
    ];

    public $timestamps = true;

    // Relasi: Riwayat milik satu User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi: Riwayat milik satu Rombel
    public function rombel()
    {
        return $this->belongsTo(Rombel::class);
    }
}
