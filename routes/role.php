<?php

use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;


Route::get('role', [RoleController::class, 'index'])->name('role.index');
Route::get('role/create', [RoleController::class, 'create'])->name('role.create');
Route::post('role', [RoleController::class, 'store'])->name('role.store');
