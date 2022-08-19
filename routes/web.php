<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ConfirmationController;
use App\Http\Controllers\EscrowController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::get('/profile/edit', function () {
    return view('edit-profile');
})->middleware(['auth'])->name('edit-profile');

Route::patch('/profile/{id}', [RegisteredUserController::class, 'profile_update'])->name('profile.update');



Route::get('/escrow', [EscrowController::class, 'index'])->middleware(['auth'])->name('escrow');
Route::patch('wallet/{id}', [WalletController::class, 'update'])->name('wallet.update');

Route::get('/transactions', [TransactionController::class, 'index'])->middleware(['auth'])->name('transactions');
Route::get('/subscription/create', [SubscriptionController::class, 'index'])->name('subscription.create');

Route::post('order-post', [SubscriptionController::class, 'orderPost'])->name('order.post');

Route::get('/thankyou', [ConfirmationController::class, 'index'])->name('confirmation.index');
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');

Route::get('review/{slug}', [ReviewController::class, 'show'])->name('review.show');
Route::post('review', [ReviewController::class, 'store'])->name('review.store');

Route::get('/search', [SearchController::class, 'search'])->name('search');

require __DIR__.'/auth.php';
require __DIR__.'/product.php';
require __DIR__.'/category.php';
require __DIR__.'/currency.php';
require __DIR__.'/role.php';
require __DIR__.'/market.php';
require __DIR__.'/plan.php';
require __DIR__.'/cart.php';
