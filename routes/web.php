<?php

use App\Http\Controllers\dashboard;
use App\Http\Controllers\palette;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/dash',[dashboard::class,'index'])->name('palette.dash');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/palette-generator',[palette::class,'index'])->name('palatte.page');
    Route::post('/palette-generator',[palette::class,'save'])->name('palatte.page');
});

Route::middleware('auth')->get('/api/user', function () {
    return response()->json([
        'id' => Auth::user()->id,
        'name' => Auth::user()->name,
        'email' => Auth::user()->email
    ]);
});

require __DIR__.'/auth.php';
