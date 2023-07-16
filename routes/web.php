<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\BukuRekeningController;
use App\Http\Controllers\JenisSampahController;
use App\Http\Controllers\PenarikanController;
use App\Http\Controllers\PenimbanganController;
use App\Http\Controllers\HistoriController;
use App\Http\Controllers\InvetoriSampahController;
use App\Http\Controllers\PenyetoranController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::middleware('guest')->group(function() {
    Route::get('/login', [AuthenticationController::class, 'index'])->name('login');
    Route::post('/login', [AuthenticationController::class, 'authenticate'])->name('user.authenticate');
    Route::get('/register', [UserController::class, 'createNasabah'])->name('user.nasabah.register');
    Route::post('/register', [UserController::class, 'storeNasabah'])->name('user.nasabah.store');
});

Route::middleware('auth')->group(function() {
    Route::post('/logout', [AuthenticationController::class, 'logout']);
    Route::resource('/dashboard/jenis-sampah', JenisSampahController::class);
    Route::get('/dashboard/penimbangan', [PenimbanganController::class, 'index']);
    Route::get('/dashboard/penimbangan/penarikan', [PenimbanganController::class, 'penarikan'])->name('penimbangan.penarikan');
    Route::get('/dashboard/penimbangan/penyetoran', [PenimbanganController::class, 'penyetoran'])->name('penimbangan.penyetoran');
    Route::post('/dashboard/penimbangan/penarikan', [PenimbanganController::class, 'storePenarikan'])->name('penimbangan.penarikan.store');
    Route::post('/dashboard/penimbangan/penyetoran', [PenimbanganController::class, 'storePenyetoran'])->name('penimbangan.penyetoran.store');
    Route::get('/dashboard/histori/penarikan', [PenarikanController::class, 'index'])->name('histori.penarikan');
    Route::get('/dashboard/histori/penyetoran', [PenyetoranController::class, 'index'])->name('histori.penyetoran');
    Route::get('/dashboard/inventori', [InvetoriSampahController::class, 'index'])->name('inventori.sampah');
    Route::get('/dashboard/nasabah', [UserController::class, 'indexNasabah'])->name('user.nasabah.index');
    Route::get('/dashboard/buku-rekening', [BukuRekeningController::class, 'index'])->name('buku-rekening.index');
});

Route::get('/dashboard', function () {
    return view('dashboard.main-dashboard.index');
})->middleware('auth');


