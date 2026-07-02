<?php

use App\Http\Controllers\ManageProfilesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfileRegistrationController;
use App\Http\Controllers\ProfilesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/profiles', [ProfilesController::class, 'index'])->name('profiles.index');
    Route::post('/profiles/print', [ProfilesController::class, 'print'])->name('profiles.print');

    Route::get('/manage-profiles', [ManageProfilesController::class, 'index'])->name('manage-profiles.index');
    Route::post('/manage-profiles', [ManageProfilesController::class, 'store'])->name('manage-profiles.store');
    Route::put('/manage-profiles/{profile}', [ManageProfilesController::class, 'update'])->name('manage-profiles.update');
    Route::delete('/manage-profiles/{profile}', [ManageProfilesController::class, 'destroy'])->name('manage-profiles.destroy');
});

Route::get('/register-profile', [ProfileRegistrationController::class, 'create'])->name('profile-register.create');
Route::post('/register-profile', [ProfileRegistrationController::class, 'store'])->name('profile-register.store');

Route::get('/profile-register/payment/{id}', [ProfileRegistrationController::class, 'payment'])
    ->name('profile-register.payment');

Route::post('/profile-register/payment/{id}', [ProfileRegistrationController::class, 'uploadPayment'])
    ->name('profile-register.upload-payment');

Route::get('/profile-register/success/{id}', [ProfileRegistrationController::class, 'success'])
    ->name('profile-register.success');

require __DIR__.'/auth.php';
