<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TahunAjaran extends Model
{
    use HasFactory;

    protected $table = 'tahun_ajaran'; // nama tabel

    protected $fillable = [
        'tahun',
        'is_aktif',
    ];

    public $timestamps = true;
}
