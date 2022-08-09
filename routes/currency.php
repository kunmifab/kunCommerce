<?php

use App\Http\Controllers\CurrencyController;
use Illuminate\Support\Facades\Route;


Route::get('currency', [CurrencyController::class, 'index'])->name('currency.index');
Route::get('currency/create', [CurrencyController::class, 'create'])->name('currency.create');
Route::post('currency', [CurrencyController::class, 'store'])->name('currency.store');
Route::get('currency/{slug}', [CurrencyController::class, 'show'])->name('currency.show');
Route::get('currency/edit/{slug}', [CurrencyController::class, 'edit'])->name('currency.edit');
Route::patch('currency/{id}', [CurrencyController::class, 'update'])->name('currency.update');
Route::delete('currency/{id}', [CurrencyController::class, 'destroy'])->name('currency.delete');
