<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;


Route::get('category', [CategoryController::class, 'index'])->name('category.index');
Route::get('category/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('category', [CategoryController::class, 'store'])->name('category.store');
Route::get('category/{slug}', [CategoryController::class, 'show'])->name('category.show');
