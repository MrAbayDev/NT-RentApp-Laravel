<?php

use App\Http\Controllers\AdController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AppController::class, 'home'])->name('home');

Route::resource('ads', AdController::class);

Route::get('/search', [AdController::class, 'search']);

Route::resource('branches', BranchController::class);
Route::post('/ads/{id}/bookmark', [\App\Http\Controllers\UserController::class, 'toggleBookmark'])->name('ads.bookmark');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
