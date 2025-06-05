<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengaduanController;

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

use App\Http\Controllers\TahunAjaranController;

Route::prefix('tahun-ajaran')->middleware('auth')->group(function () {
    Route::get('/', [TahunAjaranController::class, 'index'])->name('tahun-ajaran.index');
    Route::get('/create', [TahunAjaranController::class, 'create'])->name('tahun-ajaran.create');
    Route::post('/', [TahunAjaranController::class, 'store'])->name('tahun-ajaran.store');
    Route::get('/{id}', [TahunAjaranController::class, 'show'])->name('tahun-ajaran.show');
    Route::get('/{id}/edit', [TahunAjaranController::class, 'edit'])->name('tahun-ajaran.edit');
    Route::put('/{id}', [TahunAjaranController::class, 'update'])->name('tahun-ajaran.update');
    Route::delete('/{id}', [TahunAjaranController::class, 'destroy'])->name('tahun-ajaran.destroy');
});


