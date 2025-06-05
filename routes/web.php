<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\TahunAjaranController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\RombelController;
use App\Http\Controllers\RiwayatKelasController;

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('pengaduan')->middleware('auth')->group(function () {
    Route::get('/', [PengaduanController::class, 'index'])->name('pengaduan.index');
    Route::get('/create', [PengaduanController::class, 'create'])->name('pengaduan.create');
    Route::post('/', [PengaduanController::class, 'store'])->name('pengaduan.store');
    Route::get('/{id}', [PengaduanController::class, 'show'])->name('pengaduan.show');
    Route::get('/{id}/edit', [PengaduanController::class, 'edit'])->name('pengaduan.edit');
    Route::put('/{id}', [PengaduanController::class, 'update'])->name('pengaduan.update');
    Route::delete('/{id}', [PengaduanController::class, 'destroy'])->name('pengaduan.destroy');
});



Route::prefix('tahun-ajaran')->middleware('auth')->group(function () {
    Route::get('/', [TahunAjaranController::class, 'index'])->name('tahun-ajaran.index');
    Route::get('/create', [TahunAjaranController::class, 'create'])->name('tahun-ajaran.create');
    Route::post('/', [TahunAjaranController::class, 'store'])->name('tahun-ajaran.store');
    Route::get('/{id}', [TahunAjaranController::class, 'show'])->name('tahun-ajaran.show');
    Route::get('/{id}/edit', [TahunAjaranController::class, 'edit'])->name('tahun-ajaran.edit');
    Route::put('/{id}', [TahunAjaranController::class, 'update'])->name('tahun-ajaran.update');
    Route::delete('/{id}', [TahunAjaranController::class, 'destroy'])->name('tahun-ajaran.destroy');
});


Route::prefix('kategori')->middleware('auth')->group(function () {
    Route::get('/', [KategoriController::class, 'index'])->name('kategori.index');
    Route::get('/create', [KategoriController::class, 'create'])->name('kategori.create');
    Route::post('/', [KategoriController::class, 'store'])->name('kategori.store');
    Route::get('/{id}', [KategoriController::class, 'show'])->name('kategori.show');
    Route::get('/{id}/edit', [KategoriController::class, 'edit'])->name('kategori.edit');
    Route::put('/{id}', [KategoriController::class, 'update'])->name('kategori.update');
    Route::delete('/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');
});



Route::prefix('rombel')->middleware('auth')->group(function () {
    Route::get('/', [RombelController::class, 'index'])->name('rombel.index');
    Route::get('/create', [RombelController::class, 'create'])->name('rombel.create');
    Route::post('/', [RombelController::class, 'store'])->name('rombel.store');
    Route::get('/{id}', [RombelController::class, 'show'])->name('rombel.show');
    Route::get('/{id}/edit', [RombelController::class, 'edit'])->name('rombel.edit');
    Route::put('/{id}', [RombelController::class, 'update'])->name('rombel.update');
    Route::delete('/{id}', [RombelController::class, 'destroy'])->name('rombel.destroy');
});


Route::prefix('riwayat')->middleware('auth')->group(function () {
    Route::get('/', [RiwayatKelasController::class, 'index'])->name('riwayat.index');
    Route::get('/create', [RiwayatKelasController::class, 'create'])->name('riwayat.create');
    Route::post('/', [RiwayatKelasController::class, 'store'])->name('riwayat.store');
    Route::get('/{id}', [RiwayatKelasController::class, 'show'])->name('riwayat.show');
    Route::get('/{id}/edit', [RiwayatKelasController::class, 'edit'])->name('riwayat.edit');
    Route::put('/{id}', [RiwayatKelasController::class, 'update'])->name('riwayat.update');
    Route::delete('/{id}', [RiwayatKelasController::class, 'destroy'])->name('riwayat.destroy');
});

use App\Http\Controllers\AuthController;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


