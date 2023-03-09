<?php

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

Route::namespace('App\Http\Controllers\Main')->group(function () {
    Route::get('/', IndexController::class)->name('main.index');
});

Route::namespace('App\Http\Controllers\Admin')->prefix('admin')->group(function () {
    Route::namespace('Main')->group(function () {
        Route::get('/', IndexController::class)->name('admin.main.index');
    });

    Route::namespace('Category')->prefix('categories')->group(function () {
        Route::get('/', IndexController::class)->name('admin.category.index');
        Route::get('/create', CreateController::class)->name('admin.category.create');
    });
});

Auth::routes();
