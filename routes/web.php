<?php

use App\Http\Controllers\courseController;
use App\Http\Controllers\materiController;
use Illuminate\Support\Facades\Route;


Route::prefix('admin')->group(function () {
    Route::get('/', [courseController::class, 'index'])->name('admin.home');
    Route::get('/view', [courseController::class, 'view'])->name('admin.view');
    Route::get('/create', [courseController::class, 'create'])->name('admin.create');
    Route::post('/store', [courseController::class, 'store'])->name('admin.store');
    Route::get('/edit/{id}', [courseController::class, 'edit'])->name('admin.edit');
    Route::put('/update/{id}', [courseController::class, 'update'])->name('admin.update');
    Route::post('/delete/{id}', [courseController::class, 'destroy'])->name('admin.destroy');

    Route::prefix('materi')->group(function () {
        Route::get('/view', [materiController::class, 'view'])->name('materi.view');
        Route::get('/create', [materiController::class, 'create'])->name('materi.create');
        Route::post('/store', [materiController::class, 'store'])->name('materi.store');
        Route::get('/edit/{id}', [materiController::class, 'edit'])->name('materi.edit');
        Route::put('/update/{id}', [materiController::class, 'update'])->name('materi.update');
        Route::post('/delete/{id}', [materiController::class, 'destroy'])->name('materi.destroy');
    });
});
