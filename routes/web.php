<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\BukuRekeningController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\ForgetPasswordController;
use App\Http\Controllers\JenisSampahController;
use App\Http\Controllers\PenarikanController;
use App\Http\Controllers\PenimbanganController;
use App\Http\Controllers\InvetoriSampahController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\JadwalPenarikanController;
use App\Http\Controllers\JadwalPenimbanganController;
use App\Http\Controllers\LoadcellController;
use App\Http\Controllers\NasabahDashboardController;
use App\Http\Controllers\NasabahMenuController;
use App\Http\Controllers\PenyetoranController;
use App\Http\Controllers\PetugasDashboardController;
use App\Http\Controllers\PetugasMenuController;
use App\Http\Controllers\UserController;
use App\Models\JadwalPenimbangan;
use App\Models\Loadcell;
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

Route::get('/', function() {
    return redirect()->route('login');
});

Route::get('/read-loadcell', [LoadcellController::class, 'readWeight']);
Route::get('/ASqEtA1WR2yGyEjQ59jTevRMVkZzkYH1RL37XbnXCviNhxZmEeZ1cHv0vDFLkVu3C/{weight}', [LoadcellController::class, 'getLoadcellValue']);
Route::post('/test-post/{berat}', [LoadcellController::class, 'postData']);

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
        Route::get('/dashboard/admin', [AdminDashboardController::class, 'adminDashboard'])->name('dashboard.admin');
        Route::resource('/dashboard/jenis-sampah', JenisSampahController::class);
        Route::get('/dashboard/penimbangan', [PenimbanganController::class, 'index'])->name('penimbangan');
        Route::post('/dashboard/jadwal-penimbangan', [JadwalPenimbanganController::class, 'storeJadwalPenimbangan'])->name('jadwal-penimbangan.store');
        Route::put('/dashboard/jadwal-penimbangan/{id}', [JadwalPenimbanganController::class, 'updateStatusJadwal'])->name('jadwal-penimbangan.status.update');
        Route::get('/dashboard/jadwal-penimbangan/{id}/edit', [JadwalPenimbanganController::class, 'editJadwalPenimbangan'])->name('jadwal-penimbangan.edit');
        Route::put('/dashboard/jadwal-penimbangan', [JadwalPenimbanganController::class, 'updateJadwalPenimbangan'])->name('jadwal-penimbangan.update');
        Route::get('/dashboard/penimbangan/penarikan', [PenimbanganController::class, 'penarikan'])->name('penimbangan.penarikan');
        Route::get('/dashboard/penimbangan/penyetoran', [PenimbanganController::class, 'penyetoran'])->name('penimbangan.penyetoran');
        Route::post('/dashboard/penimbangan/penarikan', [PenimbanganController::class, 'storePenarikan'])->name('penimbangan.penarikan.store');
        Route::post('/dashboard/penimbangan/penyetoran', [PenimbanganController::class, 'storePenyetoran'])->name('penimbangan.penyetoran.store');
        Route::get('/dashboard/penimbangan/penarikan/{id}', [PenimbanganController::class, 'showUser']);
        Route::get('/dashboard/penimbangan/penyetoran/{id}', [PenimbanganController::class, 'showUser']);
        Route::get('/dashboard/histori/penarikan', [PenarikanController::class, 'index'])->name('histori.penarikan');
        Route::get('/dashboard/histori/penyetoran', [PenyetoranController::class, 'index'])->name('histori.penyetoran');
        Route::get('/dashboard/inventori', [InvetoriSampahController::class, 'index'])->name('inventori.sampah');
        Route::get('/dashboard/pengguna/nasabah', [UserController::class, 'indexNasabah'])->name('user.nasabah.index');
        Route::get('/dashboard/pengguna/petugas', [UserController::class, 'indexPetugas'])->name('user.petugas.index');
        Route::get('/dashboard/pengguna/administrator', [UserController::class, 'indexAdministrator'])->name('user.administrator.index');
        Route::get('/dashboard/pengguna/create-administrator', [UserController::class, 'createAdministrator'])->name('user.administrator.create');
        Route::post('/dashboard/pengguna/create-administrator', [UserController::class, 'storeAdministrator'])->name('user.administrator.store');
        Route::get('/dashboard/petugas/create-petugas', [UserController::class, 'createPetugas'])->name('user.petugas.create');
        Route::post('/dashboard/petugas/create-petugas', [UserController::class, 'storePetugas'])->name('user.petugas.store');
        Route::put('/dashboard/pengguna/{user}/status', [UserController::class, 'updateStatus']);
        Route::get('/dashboard/buku-rekening', [BukuRekeningController::class, 'index'])->name('buku-rekening.index');
        Route::get('/dashboard/buku-rekening/{bukurekening}', [BukuRekeningController::class, 'detailFaktur']);
        Route::get('/dashboard/penarikan-saldo', [BukuRekeningController::class, 'indexFaktur'])->name('buku-rekening.faktur.index');
        Route::put('/dashboard/penarikan-saldo/{faktur}/status', [BukuRekeningController::class, 'updateStatusFaktur']);
    });

    Route::middleware('isActive')->group(function(){
        Route::middleware('petugas')->group(function () {
            Route::get('/dashboard/petugas', [PetugasDashboardController::class, 'petugasDashboard'])->name('dashboard.petugas');
            Route::get('/dashboard/petugas/penimbangan', [PetugasMenuController::class, 'indexPenimbangan'])->name('dashboard.petugas.penimbangan');
            Route::get('/dashboard/petugas/jenis-sampah', [PetugasMenuController::class, 'indexJenisSampah'])->name('dashboard.petugas.jenis-sampah');
        });
    
        Route::middleware('nasabah')->group(function () {
            Route::get('/dashboard/nasabah', [NasabahDashboardController::class, 'nasabahDashboard'])->name('dashboard.nasabah');
            Route::get('/dashboard/nasabah/jenis-sampah', [NasabahMenuController::class, 'indexJenisSampah'])->name('dashboard.nasabah.jenis-sampah');
            Route::get('/dashboard/nasabah/buku-rekening', [NasabahMenuController::class, 'indexRekening'])->name('nasabah.buku-rekening');
            Route::get('/dashboard/nasabah/penimbangan', [NasabahMenuController::class, 'indexPenimbangan'])->name('nasabah.penimbangan.index');
            Route::post('/dashboard/nasabah/buku-rekening', [NasabahMenuController::class, 'requestPenarikanSaldo'])->name('nasabah.buku-rekening.penarikan');
        });
    });

    Route::post('/logout', [AuthenticationController::class, 'logout']);
    Route::get('/dashboard/detail-akun', [UserController::class, 'detailUser'])->name('user.detail-user');
    Route::put('/dashboard/detail-akun', [UserController::class, 'updateUser'])->name('user.detail-user.store');
    Route::get('/dashboard/ubah-password', [ChangePasswordController::class, 'index'])->name('user.change-password');
    Route::post('/dashboard/ubah-password', [ChangePasswordController::class, 'changePassword'])->name('user.change-password.store');
});
