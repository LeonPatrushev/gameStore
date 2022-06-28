<?php

use App\Http\Controllers\FavoriteProductController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/',[MainController::class, 'index'])->name('index');
Route::get('/account',[MainController::class,'account'])->name('account');

Route::get('/products',[ProductController::class, 'index'])->name('products.index');
Route::get('/products/{id}',[ProductController::class, 'show'])->name('products.show');
Route::post('/products/select',[ProductController::class,'select'])->name('products.select');
Route::post('/products/update',[ProductController::class,'update'])->name('products.update');
Route::post('/products/create',[ProductController::class,'store'])->name('products.store');
Route::delete('/products/delete',[ProductController::class,'delete'])->name('products.delete');

Route::post('/favorite_product/create',[FavoriteProductController::class,'store'])->name('favorite_product.store');
Route::patch('/favorite_product/update',[FavoriteProductController::class,'update'])->name('favorite_product.update');
Route::delete('/favorite_product/delete',[FavoriteProductController::class,'delete'])->name('favorite_product.delete');