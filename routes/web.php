<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/Admin/index', [ProductController::class, 'index'])->name('Admin.index');

Route::get('/Admin/create', function () {
    return view('Admin.create');
});
Route::post('Admin/create', [ProductController::class, 'create'])->name('Admin.create');
Route::post('Admin/store', [ProductController::class, 'store'])->name('Admin.store');
Route::get('Admin/edit/{id}', [ProductController::class, 'edit'])->name('Admin.edit');
Route::post('Admin/update/{id}', [ProductController::class, 'update'])->name('Admin.update');
Route::get('Admin/delete/{id}', [ProductController::class, 'delete'])->name('Admin.delete');

//Category
Route::get('/Category/index', function () {
    return view('Category.index');
});
Route::post('Category/store', [CategoryController::class, 'store'])->name('Category.store');
Route::post('Category/create', [CategoryController::class, 'create'])->name('Category.create');
Route::get('/Category/create', function () {
    return view('Category.create');
});
Route::get('/Category/index', [CategoryController::class, 'index'])->name('Category.index');

Route::get('Category/edit/{id}', [CategoryController::class, 'edit'])->name('Category.edit');
Route::post('Category/update/{id}', [CategoryController::class, 'update'])->name('Category.update');
Route::get('Category/delete/{id}', [CategoryController::class, 'delete'])->name('Category.delete');

