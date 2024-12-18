<?php
use App\Http\Controllers\DashboardController;

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TableController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserController;

// Halaman utama
Route::get('/', function () {
    return view('frontend.index');
});

Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Table
    Route::get('/table', [TableController::class, 'index'])->name('table.index');
    Route::post('/save-timer', [TableController::class, 'store']);

    // Profile
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Payment
    Route::resource('payment', PaymentController::class);
    Route::get('payment/create', [PaymentController::class, 'create'])->name('payment.create');
    Route::get('payment/edit/{id}', [PaymentController::class, 'edit'])->name('payments.edit');
    Route::put('payment/update/{id}', [PaymentController::class, 'update'])->name('payments.update');
    Route::delete('payment/destroy/{id}', [PaymentController::class, 'destroy'])->name('payments.destroy');

    // Users
    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/create', [UserController::class, 'create'])->name('create');
        Route::post('/', [UserController::class, 'store'])->name('store');
        Route::get('/{user}/edit', [UserController::class, 'edit'])->name('edit');
        Route::put('/{user}', [UserController::class, 'update'])->name('update');
        Route::delete('/{user}', [UserController::class, 'destroy'])->name('destroy');
    });
});




// Menyertakan rute untuk autentikasi (login, register, dll.)
require __DIR__.'/auth.php';
