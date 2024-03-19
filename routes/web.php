<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Wishlist\ShowWishListController;
use App\Http\Controllers\Wishlist\WishlistIndexController;
use App\Http\Controllers\Wishlists\CreateNewWishlistController;
use App\Http\Controllers\Wishlists\MarkItemPurchasedController;
use App\Http\Controllers\Wishlists\NewWishlistFormController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/', WishlistIndexController::class)->name('wishlist.index');
    Route::get('/wishlist/new', NewWishlistFormController::class);
    Route::post('/wishlist/new', CreateNewWishlistController::class)->name('wishlist.create');
    Route::get('/wishlist/{wishlist}', ShowWishlistController::class)->name('wishlist.show');

    Route::post('/items/{item}/purchase', MarkItemPurchasedController::class)->name('purchases.create');
});

require __DIR__.'/auth.php';
