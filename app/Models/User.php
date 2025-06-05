<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // penting untuk fitur auth
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // karena nama tabel bukan 'users', harus ditentukan
    protected $table = 'user';

    protected $fillable = [
        'nama_lengkap',
        'username',
        'nomor_wa',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public $timestamps = true;
}
