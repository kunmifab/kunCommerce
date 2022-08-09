<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


Route::get('product', [ProductController::class, 'index'])->name('product.index');
Route::get('product/create', [ProductController::class, 'create'])->name('product.create');
Route::post('product', [ProductController::class, 'store'])->name('product.store');
Route::get('product/{slug}', [ProductController::class, 'show'])->name('product.show');
Route::get('product/edit/{slug}', [ProductController::class, 'edit'])->name('product.edit');
Route::patch('product/{id}', [ProductController::class, 'update'])->name('product.update');
Route::delete('product/{id}', [ProductController::class, 'destroy'])->name('product.delete');
Route::get('product/{slug}/customer-details', [ProductController::class, 'customer_create'])->name('product.customer-details');
Route::get('product/{slug}/payment', [ProductController::class, 'customer_payment'])->name('product.customer-payment');
Route::patch('product/{id}', [ProductController::class, 'customer_update'])->name('product.customer-update');
