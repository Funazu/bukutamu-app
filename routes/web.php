<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuTamuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TamuController;
use App\Http\Controllers\TamuUndanganController;
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
Route::get('/home', function() {
    return redirect()->route('dashboard');
});

Route::get('/auth/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::get('/auth/register', [AuthController::class, 'register'])->middleware('guest');

Route::post('/auth/register', [AuthController::class, 'registerPost']);
Route::post('/auth/login', [AuthController::class, 'loginPost']);
Route::post('/auth/logout', [AuthController::class, 'logout'])->middleware('auth');
Route::get('/auth/logout', [AuthController::class, 'logout'])->middleware('auth');

// Home
Route::get('/', [TamuController::class, 'index']);
Route::post('/tamu/create', [TamuController::class, 'bukuTamuPost']);
Route::get('/tamu/create/success/{BukuTamu:uniqid}', [TamuController::class, 'qrcode']);
Route::get('/tamu/{BukuTamu:uniqid}', [TamuController::class, 'tamu']);


Route::put('/auth/account/changepassword/{user:id}', [AuthController::class, 'changepassword'])->middleware('auth');

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
Route::get('/profile', [DashboardController::class, 'profile'])->name('profile')->middleware('auth');

// Buku Tamu
Route::get('/dashboard/bukutamu', [BukuTamuController::class, 'index'])->name('bukuTamu')->middleware('auth');
Route::post('/dashboard/bukutamu/create', [BukuTamuController::class, 'bukuTamuPost'])->middleware('auth');
Route::put('/dashboard/bukutamu/edit/{BukuTamu:id}', [BukuTamuController::class, 'bukuTamuEdit'])->middleware('auth');
Route::post('/dashboard/bukutamu/delete/{BukuTamu:id}', [BukuTamuController::class, 'bukuTamuDelete'])->middleware('auth');

// Tamu Undangan
Route::get('/dashboard/tamu-undangan', [TamuUndanganController::class, 'index'])->name('tamuUndangan')->middleware('auth');
Route::post('/dashboard/tamu-undangan/create', [TamuUndanganController::class, 'tamuUndanganPost'])->middleware('auth');
Route::put('/dashboard/tamu-undangan/edit/{TamuUndangan:id}', [TamuUndanganController::class, 'tamuUndanganEdit'])->middleware('auth');
Route::post('/dashboard/tamu-undangan/delete/{TamuUndangan:id}', [TamuUndanganController::class, 'tamuUndanganDelete'])->middleware('auth');

Route::get('/tamu-undangan/{TamuUndangan:uniqid}', [TamuUndanganController::class, 'scanQrCode']);

Route::get('/dashboard/tamu-undangan/scan', [TamuUndanganController::class, 'scanBarcode'])->name('scanBarcode')->middleware('auth');
Route::put('/dashboard/tamu-undangan/scan', [TamuUndanganController::class, 'scanBarcodePost'])->middleware('auth');