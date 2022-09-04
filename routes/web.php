<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Expr\Cast;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => 'laravel-filemanager'], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('admin')->middleware(['auth'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Products Manage
    Route::get('/product', [ProductController::class, 'index'])->name('product');
    // Products create
    Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
    // Products store
    Route::post('/product', [ProductController::class, 'store'])->name('product.store');
    // Product edit
    Route::get('/product/{slug}/edit', [ProductController::class, 'edit']);
    // Product update
    Route::patch('/product/{id}/update', [ProductController::class, 'update']);
    // Product delete
    Route::delete('/product/{id}/delete', [ProductController::class, 'destroy']);

    // categories
    Route::get('/category', [CategoryController::class, 'index'])->name('category');
    // create
    Route::post('/category', [CategoryController::class, 'store'])->name('category.create');
    // update
    Route::patch('/category/{id}/update', [CategoryController::class, 'update']);
    // delete
    Route::delete('/category/{id}/delete', [CategoryController::class, 'destroy']);
    // end categories

    // /Products Manage

});