<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\PaypalController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\DiskonController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\SuccessController;
use App\Http\Controllers\CustomdesignController;
require __DIR__.'/auth.php';


//route dashboard admin dan user login
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/admin/dashboard',[HomeController::class,'index'])->
middleware(['auth','admin']);
Route::get('/dashboard',[HomeController::class,'index'])->
middleware(['auth', 'verified', 'user'])->name('dashboard');
Route::get('/onkir/{id}', [CheckoutController::class, 'getOnkir']);

//route landing page
Route::get('/',[HomeController::class,'home']);
Route::get('/home',[HomeController::class,'home']);
Route::get('/shop',[ShopController::class,'index'])->name('shop');
Route::middleware(['auth'])->group(function() {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::get('/cart/{id}/remove', [CartController::class, 'destroy'])->name('cart.destroy');
    Route::post('/cart/store', [CartController::class, 'store'])->name('cart.store');
    Route::post('/cart/custom', [CartController::class, 'custom'])->name('cart.custom');
    Route::put('/cart', [CartController::class, 'update'])->name('cart.update');
    Route::get('/checkout',[CheckoutController::class,'index'])->name('checkout');
    Route::get('/customdesign',[CustomdesignController::class,'index'])->name('customdesign');
});

//route pembayaran paypal
Route::post('paypal', [PaypalController::class, 'paypal'])->name('paypal');
Route::get('success', [PaypalController::class, 'success'])->name('success');
Route::get('cancel', [PaypalController::class, 'cancel'])->name('cancel');
Route::get('tampilan_berhasil',[SuccessController::class,'index'])->name('tampilan_berhasil');

//route halaman dashboard
Route::get('/slider-list', [SliderController::class, 'dataTableLogic'])->
middleware(['auth','admin']);
Route::post('/slider/Store', [SliderController::class, 'store']);
Route::get('/slider/Edit/{id}/', [SliderController::class, 'edit']);
Route::get('/slider/Delete/{id}', [SliderController::class, 'destroy']);
Route::get('/promo-list', [DiskonController::class, 'dataTableLogic'])->
middleware(['auth','admin']);
Route::get('/catalog', [CatalogController::class, 'dataTableLogic'])->
middleware(['auth','admin']);
Route::get('/transaksi', [TransaksiController::class, 'dataTableLogic'])->
middleware(['auth','admin']);
Route::get('/product/show/{id}/', [ShopController::class, 'show'])->name('product.show');
Route::get('/{categorySlug}',[ShopController::class,'category'])->name('product.category');


