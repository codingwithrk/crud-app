<?php

use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', 'products');

Route::resource('products', ProductsController::class);

Route::get('product/export', [ProductsController::class, 'export'])->name('products.export');
Route::post('product/import', [ProductsController::class, 'import'])->name('products.import');