<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\StripeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');

Route::post('/make-payment', [StripeController::class, 'makePayment'])->name('make.payment');
Route::get('/success', [StripeController::class, 'success'])->name('success');
