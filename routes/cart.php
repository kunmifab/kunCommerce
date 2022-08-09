<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;


Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart', [CartController::class, 'store'])->name('cart.store');
Route::delete('/cart{id}', [CartController::class, 'destroy'])->name('cart.destroy');
// Route::get('/empty', [CartController::class, 'destroy'])->name('cart.destroy');


