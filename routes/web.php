<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Halaman utama
Route::get('/', function () {
    return view('frontend.index');
});

// Halaman Dashboard (autentikasi diperlukan)
Route::middleware('auth')->get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Routing untuk halaman Table
Route::middleware('auth')->prefix('table')->name('table.')->group(function () {
    Route::get('/', [TableController::class, 'index'])->name('index');
    Route::post('/save-timer', [TableController::class, 'store'])->name('save-timer');
});

// Autentikasi dan Profil Pengguna (middleware auth)
Route::middleware('auth')->group(function () {
    // Halaman Profil Pengguna
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Resource Routing untuk Payment (termasuk semua CRUD otomatis)
Route::middleware('auth')->resource('payment', PaymentController::class);

// Custom Routes untuk Payment (Edit, Update, Delete)
Route::middleware('auth')->group(function () {
    Route::get('payment/edit/{id}', [PaymentController::class, 'edit'])->name('payments.edit');
    Route::put('payment/update/{id}', [PaymentController::class, 'update'])->name('payments.update');
    Route::delete('payment/destroy/{id}', [PaymentController::class, 'destroy'])->name('payments.destroy');
});

// Routing untuk User Management (menggunakan middleware admin jika perlu)
Route::middleware('auth')->prefix('users')->name('users.')->group(function () {
    // Menampilkan daftar pengguna
    Route::get('/', [UserController::class, 'index'])->name('index');

    // Menampilkan form untuk membuat pengguna baru
    Route::get('/create', [UserController::class, 'create'])->name('create');

    // Menyimpan pengguna baru
    Route::post('/', [UserController::class, 'store'])->name('store');

    // Menampilkan form untuk mengedit pengguna
    Route::get('/{user}/edit', [UserController::class, 'edit'])->name('edit');

    // Memperbarui data pengguna
    Route::put('/{user}', [UserController::class, 'update'])->name('update');

    // Menghapus pengguna
    Route::delete('/{user}', [UserController::class, 'destroy'])->name('destroy');
});

// Menyertakan rute untuk autentikasi (login, register, dll.)
require __DIR__.'/auth.php';
