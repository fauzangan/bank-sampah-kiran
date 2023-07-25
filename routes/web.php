<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\BukuRekeningController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\ForgetPasswordController;
use App\Http\Controllers\JenisSampahController;
use App\Http\Controllers\PenarikanController;
use App\Http\Controllers\PenimbanganController;
use App\Http\Controllers\HistoriController;
use App\Http\Controllers\InvetoriSampahController;
use App\Http\Controllers\NasabahMenuController;
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


Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthenticationController::class, 'index'])->name('login');
    Route::post('/login', [AuthenticationController::class, 'authenticate'])->name('user.authenticate');
    Route::get('/register', [UserController::class, 'createNasabah'])->name('user.nasabah.register');
    Route::post('/register', [UserController::class, 'storeNasabah'])->name('user.nasabah.store');
    Route::get('/forgot-password', [ForgetPasswordController::class, 'index'])->name('password.request');
    Route::post('/forgot-password', [ForgetPasswordController::class, 'store'])->name('password.email');
    Route::get('/reset-password/{token}', [ForgetPasswordController::class, 'createNewPassword'])->name('password.reset');
    Route::post('/reset-password', [ForgetPasswordController::class, 'updatePassword'])->name('password.update');
});

Route::middleware('auth')->group(function () {

    Route::middleware('administrator')->group(function () {
        Route::resource('/dashboard/jenis-sampah', JenisSampahController::class);
        Route::get('/dashboard/penimbangan', [PenimbanganController::class, 'index']);
        Route::get('/dashboard/penimbangan/penarikan', [PenimbanganController::class, 'penarikan'])->name('penimbangan.penarikan');
        Route::get('/dashboard/penimbangan/penyetoran', [PenimbanganController::class, 'penyetoran'])->name('penimbangan.penyetoran');
        Route::post('/dashboard/penimbangan/penarikan', [PenimbanganController::class, 'storePenarikan'])->name('penimbangan.penarikan.store');
        Route::post('/dashboard/penimbangan/penyetoran', [PenimbanganController::class, 'storePenyetoran'])->name('penimbangan.penyetoran.store');
        Route::get('/dashboard/histori/penarikan', [PenarikanController::class, 'index'])->name('histori.penarikan');
        Route::get('/dashboard/histori/penyetoran', [PenyetoranController::class, 'index'])->name('histori.penyetoran');
        Route::get('/dashboard/inventori', [InvetoriSampahController::class, 'index'])->name('inventori.sampah');
        Route::get('/dashboard/pengguna/nasabah', [UserController::class, 'indexNasabah'])->name('user.nasabah.index');
        Route::put('/dashboard/pengguna/nasabah/{user}', [UserController::class, 'updateStatus']);
        Route::get('/dashboard/pengguna/petugas', [UserController::class, 'indexPetugas'])->name('user.petugas.index');
        Route::get('/dashboard/pengguna/administrator', [UserController::class, 'indexAdministrator'])->name('user.administrator.index');
        Route::get('/dashboard/buku-rekening', [BukuRekeningController::class, 'index'])->name('buku-rekening.index');
        Route::get('/dashboard/buku-rekening/{bukurekening}', [BukuRekeningController::class, 'detailFaktur']);
        Route::get('/dashboard/penarikan-saldo', [BukuRekeningController::class, 'indexFaktur'])->name('buku-rekening.faktur.index');
        Route::put('/dashboard/penarikan-saldo/{faktur}/status', [BukuRekeningController::class, 'updateStatusFaktur']);
    });

    Route::middleware('petugas')->group(function () {
    });

    Route::middleware('nasabah')->group(function () {
        Route::get('/dashboard/nasabah/buku-rekening', [NasabahMenuController::class, 'indexRekening'])->name('nasabah.buku-rekening');
        Route::get('/dashboard/nasabah/penimbangan', [NasabahMenuController::class, 'indexPenimbangan'])->name('nasabah.penimbangan.index');
        Route::post('/dashboard/nasabah/buku-rekening', [NasabahMenuController::class, 'requestPenarikanSaldo'])->name('nasabah.buku-rekening.penarikan');
    });

    Route::post('/logout', [AuthenticationController::class, 'logout']);
    Route::get('/dashboard/detail-akun', [UserController::class, 'detailUser'])->name('user.detail-user');
    Route::put('/dashboard/detail-akun', [UserController::class, 'updateUser'])->name('user.detail-user.store');
    Route::get('/dashboard/ubah-password', [ChangePasswordController::class, 'index'])->name('user.change-password');
    Route::post('/dashboard/ubah-password', [ChangePasswordController::class, 'changePassword'])->name('user.change-password.store');
});

Route::get('/dashboard', function () {
    return view('dashboard.main-dashboard.index');
})->middleware('auth');
