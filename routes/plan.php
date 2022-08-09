<?php

use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\PlanController;
use Illuminate\Support\Facades\Route;


Route::get('/plans', [PlanController::class, 'index'])->middleware(['auth'])->name('plans.index');
Route::get('/plan/{plan}', [PlanController::class, 'show'])->name('plans.show');
Route::post('/subscription', [SubscriptionController::class, 'create'])->name('subscription.create');



