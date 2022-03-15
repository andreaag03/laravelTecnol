<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;

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

Route::get('/', function () {
    return view('welcome');
});

//Categories
Route::get('/categories', [CategoryController::class, 'index'])->name('category.index');
Route::get('/createcategories',[CategoryController::class, 'create'])->name('category.create');
Route::post('/storecategories',[CategoryController::class, 'store'])->name('category.store');
Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('category.show');
Route::get('/editcategories/{id}',[CategoryController::class, 'edit'])->name('category.edit');
Route::put('/updatecategories/{id}', [CategoryController::class, 'update'])->name('category.update');
Route::delete('/categories',[CategoryController::class, 'delete'])->name('category.delete');

//Products
Route::get('/createproducts',[ProductController::class, 'create'])->name('product.create');
Route::post('/storeproducts',[ProductController::class, 'store'])->name('product.store');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('product.show');
Route::get('/editproducts/{id}',[ProductController::class, 'edit'])->name('product.edit');
Route::put('/updateproducts/{id}',[ProductController::class, 'update'])->name('product.update');
Route::delete('/products',[ProductController::class, 'delete'])->name('product.delete');

//Reviews
Route::post('/reviews',[ReviewController::class, 'store'])->name('review.create');
Route::delete('/reviews',[ReviewController::class, 'delete'])->name('review.delete');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
