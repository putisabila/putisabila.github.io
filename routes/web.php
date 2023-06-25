<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WaliController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\UserMiddleware;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelanggaranController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// home
Route::get('/', function () {
    return view('home', [
        "title" => "Home"
    ]);
});


// about
Route::get('/about', function () {
    return view('about', [
        "title" => "About"
    ]);
});


// pelanggaran
Route::get('pelanggaran', [PelanggaranController::class,'index'])->name('pelanggaran.index');
Route::get('createpelanggaran', [PelanggaranController::class,'create'])->name('pelanggaran.create')->middleware('admin');
Route::post('createpelanggaran', [PelanggaranController::class,'store'])->name('pelanggaran.store')->middleware('admin');
Route::get('deletepelanggaran/{id}', [PelanggaranController::class, 'destroy'])->name('pelanggaran.destroy')->middleware('admin');
Route::get('editpelanggaran/{id}', [PelanggaranController::class,'edit'])->name('pelanggaran.edit')->middleware('admin');
Route::post('editpelanggaran/{id}', [PelanggaranController::class,'update'])->name('pelanggaran.update')->middleware('admin');
Route::get('pelanggaran/search', [PelanggaranController::class, 'search'])->name('pelanggaran.search');


// siswa
Route::get('siswa', [SiswaController::class, 'index'])->name('siswa.index');
Route::get('createsiswa', [SiswaController::class, 'create'])->name('siswa.create')->middleware('admin');
Route::post('createsiswa', [SiswaController::class, 'store'])->name('siswa.store')->middleware('admin');
Route::get('deletesiswa/{id}', [SiswaController::class, 'destroy'])->name('siswa.destroy')->middleware('admin');
Route::get('editsiswa/{id}', [SiswaController::class,'edit'])->name('siswa.edit')->middleware('admin');
Route::post('editsiswa/{id}', [SiswaController::class,'update'])->name('siswa.update')->middleware('admin');
Route::get('siswa/search', [SiswaController::class, 'search'])->name('siswa.search');


// wali
Route::get('wali', [WaliController::class, 'index'])->name('wali.index');
Route::get('createwali', [WaliController::class, 'create'])->name('wali.create')->middleware('admin');
Route::post('createwali', [WaliController::class, 'store'])->name('wali.store')->middleware('admin');
Route::get('deletewali/{id}', [WaliController::class, 'destroy'])->name('wali.destroy')->middleware('admin');
Route::get('editwali/{id}', [WaliController::class,'edit'])->name('wali.edit')->middleware('admin');
Route::post('editwali/{id}', [WaliController::class,'update'])->name('wali.update')->middleware('admin');
Route::get('wali/search', [WaliController::class, 'search'])->name('wali.search');


// login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);


// register
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);


// dashboard
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
});

