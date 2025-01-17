<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::controller(CategoryController::class)
    ->prefix('/category')
    ->middleware('auth')
    ->name('category.')
    ->group(function(){
    Route::get('index', 'index')->name('index');
    Route::get('create', 'create')->name('create');
    Route::post('create', 'store')->name('store');
    Route::get('show', 'show')->name('show');
    Route::get('edit/{id}', 'edit')->name('edit');
    Route::patch('edit/{id}', 'update')->name('update');
    Route::delete('delete/{id}', 'destroy')->name('delete');
});

Route::controller(ProductController::class)
    ->prefix('/product')
    ->middleware('auth')
    ->name('product.')
    ->group(function(){
    Route::get('/', 'products')->name('products');
    Route::get('index', 'index')->name('index');
    Route::get('create', 'create')->name('create');
    Route::post('create', 'store')->name('store');
    Route::get('show', 'show')->name('show');
    Route::get('edit/{id}', 'edit')->name('edit');
    Route::patch('edit/{id}', 'update')->name('update');
    Route::delete('delete/{id}', 'destroy')->name('delete');
});


require __DIR__.'/auth.php';
