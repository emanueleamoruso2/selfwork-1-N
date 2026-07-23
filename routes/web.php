<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;

Route::get('/', [PublicController::class,'home'])->name('home');



// Product controller
Route::get('/product/create',[ProductController::class,'create'])->name('product.create')->middleware('auth');
Route::post('/product/store',[ProductController::class,'store'])->name('product.store')->middleware('auth');
Route::get('/product/index',[ProductController::class,'index'])->name('product.index');

// ArticleController
Route::get('/article/create',[ArticleController::class,'create'])->name('article.create')->middleware('auth');
Route::post('/article/store',[ArticleController::class,'store'])->name('article.store')->middleware('auth');

Route::get('/article/index',[ArticleController::class,'index'])->name('article.index');
Route::get('/article/show/{article}',[ArticleController::class,'show'])->name('article.show');

Route::get('/article/edit/{article}',[ArticleController::class,'edit'])->name('article.edit')->middleware('auth');
// questo metodo put funzione alla base come il metodo post
Route::put('/article/update/{article}',[ArticleController::class,'update'])->name('article.update')->middleware('auth');

Route::delete('article/destroy/{article}',[ArticleController::class,'destroy'])->name('article.destroy')->middleware('auth');
