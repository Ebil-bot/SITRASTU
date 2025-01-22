<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
});

// Rute untuk guest
Route::middleware(['guest'])->group(function(){
    
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);

    Route::get('/register', [RegisterController::class, 'RegisterForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
});

// middleware admin
Route::middleware(['auth', 'role:admin'])->group(function(){

    Route::get('/admin/laporan/tracer-study', [LaporanController::class, 'download_pdf'])->name('laporan.download');
    Route::get('/admin/laporan/view/tracer-study', [LaporanController::class, 'view_pdf']);
    Route::get('/admin/laporan/profil', [LaporanController::class, 'laporan_profil_alumni'])->name('laporan.profil');

    Route::get('/admin/auth', [UserController::class, 'TabelAkun'])->name('admin.user-akun');;
    Route::get('/admin/auth/edit/{id}', [UserController::class, 'edit'])->name('update');
    Route::post('/admin/auth/edit/{id}', [UserController::class, 'edit_aksi'])->name('users.update');
    Route::delete('/admin/auth/hapus/{id}', [UserController::class, 'hapus'])->name('user.hapus');

    Route::get('/profil/alumni', [ProfilController::class, 'profilIndex'])->name('profil.index');
    Route::get('/profil/alumni/tambah', [ProfilController::class, 'profil_tambah']);
    Route::post('/profil/alumni/tambah', [ProfilController::class, 'profil_tambah_aksi']);
    Route::get('/profil/alumni/edit/{id}', [ProfilController::class, 'profil_edit']);
    Route::post('/profil/alumni/edit/{id}', [ProfilController::class, 'profil_edit_aksi']);
    Route::delete('/profil/alumni/hapus/{id}', [ProfilController::class, 'profil_hapus']);

// Rute untuk alumni
Route::get('/admin/alumni', [AdminController::class, 'AdminAlumni']);
Route::post('/admin/alumni/tambah', [AdminController::class, 'tambah_aksiAlumni']);
Route::get('/admin/alumni/tambah', [AdminController::class, 'tambahAlumni']);
Route::get('/admin/alumni/edit/{id}', [AdminController::class, 'editAlumni']);
Route::post('/admin/alumni/edit/{id}', [AdminController::class, 'edit_aksiAlumni']);
Route::delete('/admin/alumni/hapus/{id}', [AdminController::class, 'hapusAlumni']);

// Rute untuk prodi
Route::get('/admin/prodi', [ProdiController::class, 'index'])->name('prodi.index');
Route::get('/admin/prodi/tambah', [ProdiController::class, 'tambah']);
Route::post('/admin/prodi/tambah', [ProdiController::class, 'tambah_aksi']);
Route::get('/admin/prodi/edit/{id}', [ProdiController::class, 'edit']);
Route::post('/admin/prodi/edit/{id}', [ProdiController::class, 'edit_aksi']);
Route::delete('/admin/prodi/hapus/{id}', [ProdiController::class, 'hapus']);
});


// middleware alumni
Route::middleware(['auth', 'role:alumni'])->group(function(){

Route::get('/alumni/profil', [ProfilController::class, 'profilIndex'])->name('alumni.profil');
Route::get('/alumni/profil/edit/{id}', [ProfilController::class, 'profil_edit']);
Route::post('/alumni/profil/edit/{id}', [ProfilController::class, 'profil_edit_aksi']);

// Rute untuk alumni
Route::get('/alumni', [AlumniController::class, 'getAlumniData'])->name('alumni.alumni');
Route::get('/alumni/tambah', [AlumniController::class, 'tambah'])->name('alumni.tambah');
Route::post('/alumni/tambah', [AlumniController::class, 'tambah_aksi'])->name('alumni.tambah_aksi');
Route::get('/alumni/edit/{id}', [AlumniController::class, 'edit'])->name('alumni.edit');
Route::post('/alumni/edit/{id}', [AlumniController::class, 'edit_aksi'])->name('alumni.edit_aksi');
Route::delete('/alumni/hapus/{id}', [AlumniController::class, 'hapus'])->name('alumni.hapus');
});


Route::middleware(['auth'])->group(function(){
    Route::get('/logout', [LoginController::class, 'logout']);
    Route::get('/logout/register', [LoginController::class, 'LogoutRegister']);

});


