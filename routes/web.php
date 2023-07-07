<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\JenisSampahController;
use App\Http\Controllers\PenimbanganController;
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

Route::get('/login', function () {
    return view('authentication.login.index');
});

Route::get('/dashboard', function () {
    return view('dashboard.main-dashboard.index');
})->middleware('auth');

Route::post('/login', [AuthenticationController::class, 'authenticate'])->middleware('guest')->name('login');
Route::post('/logout', [AuthenticationController::class, 'logout'])->middleware('auth');
Route::resource('/dashboard/jenis-sampah', JenisSampahController::class)->middleware('auth');

Route::get('/dashboard/penimbangan', [PenimbanganController::class, 'index'])->middleware('auth');
Route::get('/dashboard/penimbangan/penarikan', [PenimbanganController::class, 'penarikan'])->middleware('auth')->name('penimbangan.penarikan');