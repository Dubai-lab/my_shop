<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [MainController::class, 'login_function'])
->name('login');

Route::get('/register', [MainController::class, 'register_function'])
  ->name('registeration');

Route::Post('/registelr', [MainController::class, 'store_user'])
  ->name('register_user');

  Route::get('/home', [MainController::class, 'home'])
  ->name('home');

  Route::post('/login', [MainController::class, 'signin'])
  ->name('signin');

  Route::get('/home', [MainController::class, 'home_page'])->middleware('auth')
  ->name('home_page');

  Route::get('/logout', [MainController::class, 'logout'])
  ->name('logout');

  Route::get('/product', [ProductController::class, 'product_page'])->middleware('auth')
  ->name('product_page');

  Route::post('/register_product', [ProductController::class, 'register_product'])->middleware('auth')
  ->name('register_product');

  Route::get('/delete_product/{id}', [ProductController::class, 'delete_product'])->middleware('auth')
  ->name('delete_product');

  Route::post('/sell_product/{id}', [ProductController::class, 'sell_product'])->middleware('auth')
  ->name('sell_product');

  
