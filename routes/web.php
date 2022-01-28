<?php

use App\Http\Controllers\AdminKeuanganController;
use App\Http\Controllers\AjuanKrsController;
use App\Http\Controllers\BayarPendaftaranController;
use App\Http\Controllers\Cekdatapddikti;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\changepwdController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ImportDatatoUserController;
use App\Http\Controllers\KhsController;
use App\Http\Controllers\KrsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OpenKurikulumController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\WaliController;
use App\Http\Livewire\AjuanKrs;
use App\Imports\Imports\bulkSP;
use App\Models\OpenKurikulum;
use App\Models\PembayaranPendaftaran;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

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

Route::get('/', function () {
    return view('index', [
        'title' => 'Home'
    ]);
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::get('/profile', [ProfileController::class, 'index'])->middleware('auth');
Route::get('/wali', [WaliController::class, 'index'])->middleware('auth');
Route::get('/khs', [KhsController::class, 'index'])->name('khs')->middleware('auth');
Route::get('/cetak-khs/{data}', [KhsController::class, 'cetakKHS'])->middleware('auth');
Route::post('/khs', [KhsController::class, 'index'])->middleware('auth');
Route::get('/krs', [KrsController::class, 'index'])->middleware('auth');
Route::get('/ajuan-krs', [AjuanKrsController::class, 'index'])->middleware('auth');
Route::get('/admin-keu', [AdminKeuanganController::class, 'index'])->middleware('auth');
Route::post('/krs', [KrsController::class, 'update'])->middleware('auth');
Route::get('/import-user', [ImportDatatoUserController::class, 'index'])->middleware('auth');
Route::get('/import-user/export-user', [ImportDatatoUserController::class, 'exportUser'])->middleware('auth');
Route::post('/import-user', [ImportDatatoUserController::class, 'import'])->middleware('auth');
Route::post('/admin-keu', [AdminKeuanganController::class, 'importStatusPembayaran'])->middleware('auth');
// Route::get('/cekkhs', [Cekdatapddikti::class, 'index'])->middleware('auth');

// Route::get('/pembayaran', [BayarPendaftaranController::class, 'index'])->middleware('auth');
Route::resource('/pembayaran', BayarPendaftaranController::class)->middleware('auth');
Route::resource('profile', ProfileController::class)->middleware('auth');
Route::resource('wali', WaliController::class)->middleware('auth');

Route::get('/changepwd', [ChangePasswordController::class, 'index'])->middleware('auth');
Route::post('/changepwd', [ChangePasswordController::class, 'changePassword'])->middleware('auth');

// Route::get('/open-periode-krs', [OpenPeriodeKRSController::class, 'index'])->middleware('auth');
Route::get('/open-periode-krs', 'App\Http\Controllers\OpenPeriodeKRSController@index')->middleware('auth');

Route::get('users', function () {
    return view('/users.index');
})->middleware('auth');
// admin Route 
// Route::resource('open-kurikulum', OpenKurikulumController::class)->middleware('auth');
