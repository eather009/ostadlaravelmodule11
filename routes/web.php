<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SalesController;
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

Route::get('/', [HomeController::class, 'index']);

Route::get('/dashboard', [HomeController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/products', [ProductsController::class, 'index'])->name('products.index');

    Route::get('/product/add', [ProductsController::class, 'store'])->name('products.create');
    Route::post('/product/add', [ProductsController::class, 'store']);
    Route::get('/product/{id}/edit', [ProductsController::class, 'update'])->name('products.view');
    Route::post('/product/{id}/edit', [ProductsController::class, 'update']);
    Route::get('/product/{id}/delete', [ProductsController::class, 'delete'])->name('products.delete');

    Route::get('/sales',[SalesController::class, 'index'])->name('sales.index');
    Route::get('/sales/new',[SalesController::class, 'store'])->name('sales.create');
    Route::post('/sales/new',[SalesController::class, 'store']);
});

require __DIR__.'/auth.php';
