<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StatistikKependudukanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/profil', [HomeController::class, 'profil'])->name('profil');
Route::get('/pemerintahan', [HomeController::class, 'pemerintahan'])->name('pemerintahan');
Route::get('/potensi', [HomeController::class, 'potensi'])->name('potensi');
Route::get('/berita', [HomeController::class, 'berita'])->name('berita');
Route::get('/galeri', [HomeController::class, 'galeri'])->name('galeri');
Route::get('/kontak', [HomeController::class, 'kontak'])->name('kontak');

Route::resource(
    'statistik-kependudukan',
    StatistikKependudukanController::class
);