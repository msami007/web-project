<?php

use App\Http\Controllers\dashboard;
use App\Http\Controllers\signin;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});
Route::get('/signin',[signin::class,'index'])->name('sign.in');
Route::get('/signup',[signin::class,'signup'])->name('sign.up');
Route::get('/dashboard',[dashboard::class,'index'])->name('dashboard');
