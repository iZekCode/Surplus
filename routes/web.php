<?php

use App\Http\Controllers\DonorController;
use App\Http\Controllers\ReceiverController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Donor
Route::prefix('donor')->middleware('donor')->group(function () {
    Route::get('/dashboard', [DonorController::class, 'index'])->name('donor.dashboard');
    Route::get('/food/create', [DonorController::class, 'create'])->name('donor.food.create');
    Route::post('/food', [DonorController::class, 'store'])->name('donor.food.store');
    Route::get('/food/{foodItem}/edit', [DonorController::class, 'edit'])->name('donor.food.edit');
    Route::put('/food/{foodItem}', [DonorController::class, 'update'])->name('donor.food.update');
    Route::delete('/food/{foodItem}', [DonorController::class, 'destroy'])->name('donor.food.destroy');
    Route::patch('/food/{foodItem}/cancel', [DonorController::class, 'cancel'])->name('donor.food.cancel');
    Route::get('/requests', [DonorController::class, 'requests'])->name('donor.requests.index');
    Route::patch('/requests/{claim}/approve', [DonorController::class, 'approve'])->name('donor.requests.approve');
    Route::patch('/requests/{claim}/reject', [DonorController::class, 'reject'])->name('donor.requests.reject');
    Route::get('/donor/profile', [DonorController::class, 'profile'])->name('donor.profile');
    Route::get('/profile/edit', [DonorController::class, 'editProfile'])->name('donor.profile.edit');
    Route::put('/profile', [DonorController::class, 'updateProfile'])->name('donor.profile.update');
});

Route::prefix('receiver')->middleware('receiver')->group(function () {
    Route::get('/dashboard', [ReceiverController::class, 'index'])->name('receiver.dashboard');
    Route::get('/food/{foodItem}', [ReceiverController::class, 'show'])->name('receiver.food.show');
    Route::get('/profile', [ReceiverController::class, 'profile'])->name('receiver.profile');
});

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/session/create', [AuthController::class, 'createSession']);
Route::get('/session/read', [AuthController::class, 'readSession']);
Route::get('/session/delete', [AuthController::class, 'destroySession']);