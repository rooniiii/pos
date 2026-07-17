<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SalesController;


Route::resource('categories', CategoryController::class);
Route::resource('products', ProductController::class);
Route::resource('sales', SalesController::class);
Route::resource('customers', CustomerController::class);


Route::get('/sales/{id}/invoice', [SalesController::class, 'invoice'])
    ->name('sales.invoice');
Route::get('/sales/{id}/pdf', [SalesController::class, 'pdf'])
    ->name('sales.pdf');
Route::get('/sales/{id}/send-email', [SalesController::class, 'sendEmail'])
    ->name('sales.sendEmail');

    