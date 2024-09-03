<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ProductController;

// Root route
Route::get('/', [HomeController::class, 'index']);

// Resource routes for Category
Route::resource('categories', CategoryController::class);

// Resource routes for Supplier
Route::resource('suppliers', SupplierController::class);

// Resource routes for Product
Route::resource('products', ProductController::class);

Route::get('/home', function () {
    return view('home');
})->name('home');
